<?php
function sf_get_categories_data(){

$categories_data;  

$taxonomy     = 'product_cat';
$orderby      = 'name';
$category_id  = '206';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';  
$empty        = 0;

$args = array(
       'taxonomy'     => $taxonomy,
       'orderby'      => $orderby,
       'parent'       => $category_id,
       'show_count'   => $show_count,
       'pad_counts'   => $pad_counts,
       'hierarchical' => $hierarchical,
       'title_li'     => $title,
       'hide_empty'   => $empty
);
$all_categories = get_categories( $args );   

return $categories_data;
}

function sf_get_tags_data(){  
    
    $taxonomy     = 'product_tag';
    $orderby      = 'name';     
    
    $args = array(
           'taxonomy'     => $taxonomy,
           'orderby'      => $orderby          
    );

    $all_tags = get_tags( $args );

    return $all_tags;

}

?>