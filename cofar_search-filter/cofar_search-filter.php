<?php
/*
Plugin Name: Custom Search Filter
Description: Widget personalizado para la barra lateral de COFAR, con este widget se pueden buscar productos por acción terapéutica y molécula, configurado para obtener todas las categorias hijo de Acción terapéutica (slug: 206) y todas las etiquetas que representan a las moléculas.
Version: 1.6.2
Author: Adrian Humberto Fernandez Toranzo
Author URI: https://www.linkedin.com/in/adrian-fernandez-bb33191b1/
License: GNU GPL
*/
include_once(plugin_dir_path( __FILE__ ).'/includes/functions.php');

/**
 * Función que instancia el Widget
 */
function create_cofar_search_filter(){
    include_once(plugin_dir_path( __FILE__ ).'/widget.php');
    register_widget('SearchFilterCofar');
}
add_action('widgets_init','create_cofar_search_filter');

/**
 * Add CSS
 */

function csf_load_stylesheets(){

    wp_register_style('cofar_sf_stylesheet', plugins_url( 'includes/css/sf_styles.css', __FILE__ ), '', 1, 'all');
    wp_enqueue_style('cofar_sf_stylesheet');

}
add_action('wp_enqueue_scripts', 'csf_load_stylesheets');

/**
 * Add jS
 */

function csf_load_script(){

    wp_register_script('cofar_sf_script', plugins_url( 'includes/js/select_change.js', __FILE__ ), '', 1, 'all');
    wp_enqueue_script('cofar_sf_script');

}
add_action('wp_enqueue_scripts', 'csf_load_script');


?>