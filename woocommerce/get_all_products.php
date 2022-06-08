<?php

/**Description:
 * This function is used to retrieve products using the wc_get_products() function provided by WooCommerce
 * 
 * In this example, we're just retrieving all products.
 * 
 * Different args will provide different sets of data.
 * You can find the args available here: https://github.com/woocommerce/woocommerce/wiki/wc_get_products-and-WC_Product_Query#parameters
 */

function get_all_wc_products()
{
    $args = array(
        "limit" => -1
    );
    $products = wc_get_products($args);

    foreach ($products as $product) {
        //... do stuff with products here
        //example: display product names
        // $product->name;
    }
};
add_action('wp_footer', 'get_all_wc_products');

/**References:
 * https://woocommerce.github.io/code-reference/namespaces/default.html#function_wc_get_products
 * https://github.com/woocommerce/woocommerce/wiki/wc_get_products-and-WC_Product_Query
 */
