<?php

/**Description:
 * This is a function that adds a role to a customer on order complete if they've spent a minimum amount.
 * 
 * In this example, we are getting the user id from the order object. We then check if the customer has spent more than 2500
 * in the lifetime. If they have, we can then add the new role.
 */

function add_bulk_role_to_customer($order_id)
{
  $order_obj = wc_get_order($order_id); //the order id that gets passed when the hook is fired
  $user_id = $order_obj->get_user_id();

  $user = get_user_by('id', $user_id);
  $customer = new WC_Customer($user_id);

  if ($customer->get_total_spent() >= 2500) {
    $user->add_role('um_bulk');   //specify the role id here
  }
}
add_action('woocommerce_order_status_completed', 'add_bulk_role_to_customer', 10, 1);

/**References:
 * https://woocommerce.github.io/code-reference/hooks/hooks.html
 * https://woocommerce.github.io/code-reference/namespaces/default.html
 * https://stackoverflow.com/questions/44770912/woocommerce-change-user-role-on-purchase
 */
