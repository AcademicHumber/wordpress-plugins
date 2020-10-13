<?php
/*
Plugin Name: Custom Widget Monopol
Description: Widget personalizado para la barra lateral de monopol con las lineas y subfamilias.
Version: 2.1
Author: Adrian Humberto Fernandez Toranzo
Author mail: ahft_2000@hotmail.com
*/

require_once __DIR__ . '/includes/settings.php';



/**
 * Función que instancia el Widget
 */
function monopol_create_widget(){
    include_once(plugin_dir_path( __FILE__ ).'/widget.php');
    register_widget('MonopolWidget');
}
add_action('widgets_init','monopol_create_widget');

/**
 * Add CSS
 */

function wm_load_stylesheets(){

    wp_register_style('custom_wm_stylesheet', plugins_url( 'includes/css/wm_styles.css', __FILE__ ), '', 1, 'all');
    wp_enqueue_style('custom_wm_stylesheet');

}
add_action('wp_enqueue_scripts', 'wm_load_stylesheets');

?>