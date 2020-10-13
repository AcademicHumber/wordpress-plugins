<?php
/*
Plugin Name: Custom Search Filter
Description: Widget personalizado para la barra lateral, con este widget se pueden buscar productos por categoria y etiqueta.
Version: 1.0
Author: Adrian Humberto Fernandez Toranzo
Author mail: ahft_2000@hotmail.com
*/
include_once(plugin_dir_path( __FILE__ ).'/includes/functions.php');

/**
 * Función que instancia el Widget
 */
function search_filter_create_widget(){
    include_once(plugin_dir_path( __FILE__ ).'/widget.php');
    register_widget('SearchFilterWidget');
}
add_action('widgets_init','search_filter_create_widget');

/**
 * Add CSS
 */

function sf_load_stylesheets(){

    wp_register_style('custom_sf_stylesheet', plugins_url( 'includes/css/sf_styles.css', __FILE__ ), '', 1, 'all');
    wp_enqueue_style('custom_sf_stylesheet');

}
add_action('wp_enqueue_scripts', 'sf_load_stylesheets');

/**
 * Add JS
 */

 function sf_load_script(){
    include_once(plugin_dir_path( __FILE__ ).'/includes/js/select_change.js.php');   
 }
 add_action('wp_footer', 'sf_load_script');


?>