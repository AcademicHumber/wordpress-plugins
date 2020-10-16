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

    function widget($args, $instance){
        // Contenido del Widget que se mostrará en la Sidebar
        extract( $args );
        /* User-selected settings. */

        $title = '';

        if (! empty( $instance['title'] ) ){
            $title = apply_filters('widget_title', $instance['title'] );
        }        

        /* Before widget (defined by themes). */
        echo $before_widget;

        /* Title of widget (before and after defined by themes). */
        if ( $title ){
            echo $before_title . $title . $after_title;
            include_once(plugin_dir_path( __FILE__ ).'/template-widget.php');
        }
        /* After widget (defined by themes). */
        echo $after_widget;
       
    }

    function update($new_instance, $old_instance){
        // Función de guardado de opciones
        $instance = $old_instance;
        $instance["title"] = strip_tags($new_instance["title"]);       
        return $instance;
    }

    function form($instance){
        // Formulario de opciones del Widget, que aparece cuando añadimos el Widget a una Sidebar
        
        $instance = wp_parse_args( (array) $instance, array(
            'title'            => ''));

        $title = strip_tags($instance['title']);   
        ?>
        <p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        		<?php esc_html_e('Title:','medik');?>
        		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
			</label>
		</p>        
        <?php
    }
}