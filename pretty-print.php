<?php

/**Description:
 * Pretty prints arrays into hook. Best used in wp_footer or wp_header. Make sure to also check if user has admin role to ensure only admins can view.
 */

function pretty_print($data)
{

    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
add_action('wp_head', 'pretty_print');  //Change HOOK_HERE to wherever you want to display the results