<?php

class SearchFilterWidget extends WP_Widget {

    function __construct(){
        //constructor
        $widget_ops = array(
            'classname' => 'Search-filter-Widget', 
            'description' => "Widget de busqueda Custom para la barra lateral"
         );
        parent::__construct('SearchFilterWidget', "Search Filter Widget", $widget_ops);
    }

    function widget($args,$instance){
        // Contenido del Widget que se mostrará en la Sidebar
        echo $before_widget;
        ?>
        <aside id='custom_search_filter' class='widget search_filter'>
            <h3 class='widgettitle'><?=$instance["tittle"]?></h3>
            <?php
            include_once(plugin_dir_path( __FILE__ ).'/template-widget.php');

            ?>
        </aside>
        <?php
        echo $after_widget;
       
    }

    function update($new_instance, $old_instance){
        // Función de guardado de opciones
        $instance = $old_instance;
        $instance["tittle"] = strip_tags($new_instance["tittle"]);       
        return $instance;
    }

    function form($instance){
        // Formulario de opciones del Widget, que aparece cuando añadimos el Widget a una Sidebar
        ?>
        <p>
           <label for="<?php echo $this->get_field_id('tittle'); ?>">Título del widget</label>
           <input class="widefat" id="<?php echo $this->get_field_id('tittle'); ?>" name="<?php echo $this->get_field_name('tittle'); ?>" type="text" value="<?php echo esc_attr($instance["tittle"]); ?>" />
        </p>        
        <?php
    }
}