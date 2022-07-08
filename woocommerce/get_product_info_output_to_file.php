<?php

/**Description:
 * This function demonstrates how to get WooCommerce product information and then output it to a text file within the child theme.
 * 
 * In this example, we are getting all products that were created after April 8, 2022.
 */

add_action('init', 'output_product_info_to_file');
function output_product_info_to_file(){

    //https://github.com/woocommerce/woocommerce/wiki/wc_get_products-and-WC_Product_Query
  $args  = array(
    'date_created' => '>=2022-04-08',
    'limit' => -1,
  );

  $products = wc_get_products( $args );
  
  //the path to the output file
  $path = get_stylesheet_directory() . '/output-product-info.txt';

  //opening the output file to write to
  $output = fopen($path, "w") or die("Unable to open file");

  foreach ($products as $product){
    $name = $product->get_name();
    $date_created = date_format($product->get_date_created(), "m/d/Y H:i:s");
    $stock_status = $product-> get_stock_status();

    //pipes added here because data is usually added into excel. This way we can use the pipe as a delimiter
    $text = "$name  |   $stock_status   |  $date_created\n";

    //writing the data to the file
    fwrite($output, $text);

  }

  //closing the file
  fclose($output);
}
