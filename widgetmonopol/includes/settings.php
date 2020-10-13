<?php
/**
 * Funciones para añadir administración del widget
 */

add_action( 'admin_menu', 'wm_add_menu_page' );


function wm_add_menu_page() {
    add_menu_page(
        'Configuración Widget Monopol',  // Page title
        'Opciones del widget Monopol',   // Menu title
        'manage_options',                // Capability
        'wm-settings',                   // Menu slug
        'wm_display_settings_page'       // Callable
    );

    add_action( 'admin_init', 'wm_register_settings' );
}


function wm_display_settings_page() {   

    require_once __DIR__ . '/template/settings-page.php';
}

function wm_register_settings() {

    register_setting(
        'wm_settings_group',   // Settings group name
        'categories_field',    // Option name
        'sanitize_text_field'  // Arguments or sanitize funcion
    );

    add_settings_section( 
        'wm-sidebar-options',
        'Opciones de la barra lateral', 
        'wm_sidebar_options', 
        'wm-settings'
    );
    add_settings_field(
         'categories',
         'Categorías a mostrar:',
         'wm_categories_names',
         'wm-settings',
         'wm-sidebar-options'        
    );

}

function wm_sidebar_options(){ 
    $all_categories = wm_get_categories_data();

    echo '<hr><h3>Escriba, separados por guión (-) y en el orden que desee, las categorías que se mostrarán en el widget lateral </h3>';
    echo '<p><b>Categorías disponibles: </b>';

    $categories_string = '';

    foreach ($all_categories as $category){
    
        $categories_string .= $category['name'] . ', ';
    }
    
    $categories_string = trim($categories_string, ', ');

    echo ''.$categories_string.'</p>';
    
}

function wm_categories_names(){

    echo '<input type="text" name="categories_field" value="" size="100"/>'; 
    echo '<br>Para evitar errores, revisar minuciosamente mayúsculas y tildes de las categorías<hr>';

    $actual = trim(esc_attr(get_option('categories_field')));
    echo '<h4>Configuración actual: '.$actual.'</h4>';
  }

  function wm_get_categories_data(){

    $categories_data;  

    $taxonomy     = 'product_cat';
    $orderby      = 'name';  
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
    $title        = '';  
    $empty        = 0;
  
    $args = array(
           'taxonomy'     => $taxonomy,
           'orderby'      => $orderby,
           'show_count'   => $show_count,
           'pad_counts'   => $pad_counts,
           'hierarchical' => $hierarchical,
           'title_li'     => $title,
           'hide_empty'   => $empty
    );
   $all_categories = get_categories( $args );

   foreach ($all_categories as $category){       

       if($category->category_parent == 0) {
        $category_id = $category->term_id;

        $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
        $sub_cats = get_categories( $args2 );

        $categories_data[$category -> name] = ['name' => $category -> name, 'slug' => $category -> slug, 'sub-categories' => []];
        if($sub_cats) {
            foreach($sub_cats as $sub_category) {
                $categories_data[$category -> name]['sub-categories'][$sub_category -> name] = ['name' => $sub_category -> name, "slug" => $sub_category -> slug];
            }   
        }
    }
        
   }
   
   return $categories_data;
    
  }

?>