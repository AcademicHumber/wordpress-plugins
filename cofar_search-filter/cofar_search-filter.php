<?php
/*
Plugin Name: Custom Search Filter
Description: Widget personalizado para la barra lateral de COFAR, con este widget se pueden buscar productos por acción terapéutica y molécula, configurado para obtener todas las categorias hijo de Acción terapéutica (slug: 206) y todas las etiquetas que representan a las moléculas.
Version: 1.4
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


?>