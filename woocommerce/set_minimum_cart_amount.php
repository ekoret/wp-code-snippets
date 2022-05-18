<?php

/**Description:
 * Adds a minimum cart amount to be able to place an order.
 * 
 * If the customer does not meet the minimum, an error notice will display on both cart and checkout pages.
 * In this example, the cart is set to a minimum order amount of 500.
 */

add_action('woocommerce_checkout_process', 'set_wc_minimum_order_amount');
add_action('woocommerce_before_cart', 'set_wc_minimum_order_amount');
function set_wc_minimum_order_amount()
{

    $minimum = 500;
    $discount_cart = WC()->cart->discount_cart;

    if ((WC()->cart->subtotal - $discount_cart) < $minimum) {
        if (is_cart()) {
            wc_print_notice(
                sprintf(
                    'You must have an order with a minimum of %s to place your order, your current order total is %s.',
                    wc_price($minimum),
                    wc_price(WC()->cart->subtotal - $discount_cart)
                ),
                'error'
            );
        } else {
            wc_add_notice(
                sprintf(
                    'You must have an order with a minimum of %s to place your order, your current order total is %s.',
                    wc_price($minimum),
                    wc_price(WC()
                        ->cart->subtotal - $discount_cart)
                ),
                'error'
            );
        }
    }
}
