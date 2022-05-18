<?php

/**Description:
 * This function is used to filter the woocommerce shop prices and change the way they're displayed.
 * 
 * In this example, the shop sells products in bundles. We want to display the prices as so: $20.00 x 10 Units.
 * There is a meta on the product that tells us how many units the product is sold in ($group_by_meta).
 * 
 * If there is no meta found/set, we can ignore the filter and display it normally.
 * From there we just get the price of the product, type cast to a float as it gets returned as a string, format the decimals, and re-create the html.
 */

function filter_woocommerce_get_price_html($price, $instance)
{
    $key = "group_of_quantity";

    //get the group by quantity meta
    // https://woocommerce.github.io/code-reference/classes/WC-Product.html#method_get_meta
    $group_by_meta = $instance->get_meta($key, true, "view");

    if (!$group_by_meta) {
        return $price;
    }

    //parse the price as a float
    $price_num = (float) $instance->get_price();

    $formatted_price = number_format($price_num, 2, '.', '');

    //new price html
    $new_price_html = "<span class='price'><span class='woocommerce-Price-amount amount'><bdi><span class='woocommerce-Price-currencySymbol'>$</span>" . $formatted_price . " x " . $group_by_meta . " Units</bdi></span></span>";

    // return $price_html;
    return $new_price_html;
};
add_filter('woocommerce_get_price_html', 'filter_woocommerce_get_price_html', 10, 2);

/**References:
 * https://woocommerce.github.io/code-reference/classes/WC-Product.html#method_get_meta
 */
