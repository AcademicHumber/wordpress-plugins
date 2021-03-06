<?php
/*
Plugin Name: Custom Search Filter
Description: Widget personalizado para la barra lateral, con este widget se pueden buscar productos por categoria y etiqueta.
Version: 1.3
Author: Adrian Humberto Fernandez Toranzo
Author URI: https://www.linkedin.com/in/adrian-fernandez-bb33191b1/
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
    wp_register_script( 'csf_script', plugins_url( 'includes/js/select_change.js', __FILE__ ), '', 1, 'all' );
    wp_enqueue_script('csf_script'); 
 }
 add_action('wp_enqueue_scripts', 'sf_load_script');


?>