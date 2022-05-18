<?php

/**Description:
 * This function removes tax for the order depending on the shipping method selected.
 * 
 * In this example, we want to make customers tax exempt if they select the local delivery method.
 * We check if the shipping method selected is local pickup by the id, if it is selected AND the customer is currently not tax exempt, make the customer tax exempt.
 * And if the chosen shipping method is NOT local pickup AND the customer is tax exempt, we will set them as not tax exempt.
 */

add_action('woocommerce_before_calculate_totals', 'set_customer_tax_exempt');
function set_customer_tax_exempt($cart)
{
    if (is_admin() && !defined('DOING_AJAX'))
        return;

    $chosen_shipping = WC()->session->get('chosen_shipping_methods');


    $vat_exempt = WC()->customer->is_vat_exempt();

    if ($chosen_shipping[0] === "local_pickup:7" && !$vat_exempt) {
        WC()->customer->set_is_vat_exempt(true); // Set customer tax exempt
    } else if ($chosen_shipping[0] !== "local_pickup:7" && $vat_exempt) {
        WC()->customer->set_is_vat_exempt(false); // Remove customer tax exempt
    }
}

/**Description:
 * This function is needed to set the customer back to NOT tax exempt so their next order isnt automatically tax exempt.
 */
add_action('woocommerce_thankyou', 'remove_customer_tax_exempt');
function remove_customer_tax_exempt($order_id)
{
    if (WC()->customer->is_vat_exempt()) {
        WC()->customer->set_is_vat_exempt(false);
    }
}
