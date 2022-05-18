<?php

/**Description:
 * This function is used to display the current template. It will only show for administrators.
 */
function show_template()
{

    $user = wp_get_current_user();
    $allowed_roles = array('administrator');

    if (array_intersect($allowed_roles, $user->roles)) {
        global $template;
        echo basename($template);
    }
}
add_action('wp_head', 'show_template');
