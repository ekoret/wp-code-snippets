<?php
/**Description:
 * Makes main image on single product page not lazy load
 */

function remove_lazy_load($attr, $attachment, $size){

if(is_product()){
  if(strpos($attr['class'], 'wp-post-image') !== false){
    $attr['loading'] = "eager";
  }
}

return $attr;

}
add_filter("wp_get_attachment_image_attributes", 'remove_lazy_load', 10, 3);