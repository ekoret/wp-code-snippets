<?php

/**Description:
 * This is a function adds support for post type in the editor
 * 
 * 
 * In this example, we are targetieng the 'affcoups_vendor' post type and adding support for the editor. You can change this to any other post type.
 * To view all registered post types, view display-post-types.php
 */

function add_vendors_supports()
{
	//https://developer.wordpress.org/reference/functions/add_post_type_support/
	add_post_type_support('affcoups_vendor', array(
		'support' => 'editor'
	));
}
//CPT's are normally registered on the init hook so we'll use that as well.
add_action('init', 'add_vendors_supports');
