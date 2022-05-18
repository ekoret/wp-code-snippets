<?php

/**Description:
 * Checks if the current user is admin
 */

function check_user_roles()
{
    $user = wp_get_current_user();
    $allowed_roles = array('administrator');

    if (array_intersect($allowed_roles, $user->roles)) {
        return true;
    } else {
        return false;
    }
}
