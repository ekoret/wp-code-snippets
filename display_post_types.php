<?php

/**Description:
 * This function displays all the current post types available.
 */
function display_post_types()
{

    //https://developer.wordpress.org/reference/functions/get_post_types/
    $post_types = get_post_types();

    //Loop through the array or post type names or objects
    foreach ($post_types  as $post_type) {

        echo '<p>' . $post_type . '</p>';
    }
}
add_action('HOOK_HERE', 'display_post_types');  //Change HOOK_HERE to wherever you want to display the results

//Reference: https://wordpress.stackexchange.com/questions/167461/get-list-of-registered-custom-post-types
