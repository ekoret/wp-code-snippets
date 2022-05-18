<?php
/**Description:
 * This loop will loop through every post after using get_posts.
 * When looping through the array, it will also loop through each
 * single post, and output in a readable form the key => value pairs.
 */

function get_key_value_pairs(){

    /**You can use get_posts with an array of arguments
     * to search for posts.
     */
    $vendors = get_posts(array(
        'post_type' => 'POST_TYPE_HERE',
        'numberposts' => 3
    ));

    foreach($vendors as $vendor){
        foreach($vendor as $key => $value){
            echo $key . " => " . $value . " <br>";
        }
        echo "<br>END POST<br><br>";
    }
}
add_action('HOOK_HERE', 'get_key_value_pairs');  //Change HOOK_HERE to wherever you want to display the results

/**References:
 * To get arguments for get_posts - https://developer.wordpress.org/reference/classes/wp_query/parse_query/
 */