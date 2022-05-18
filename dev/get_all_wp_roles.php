<?php

/**Description:
 * Returns all available roles in WP
 */
function get_all_wp_roles()
{
    global $wp_roles;

    $roles = $wp_roles->roles;

    return $roles;
}
