<?php
function csf_get_categories(){

$categories_data;  

$taxonomy     = 'product_cat';
$orderby      = 'name';
$category_id  = '2177';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';  
$empty        = 1;

$args = array(
       'taxonomy'     => $taxonomy,
       'orderby'      => $orderby,
       'parent'       => $category_id,
       'child_of'     => 0,       
       'show_count'   => $show_count,
       'pad_counts'   => $pad_counts,
       'hierarchical' => $hierarchical,
       'title_li'     => $title,
       'hide_empty'   => $empty
);
$all_categories = get_categories( $args );  

foreach($all_categories as $category){
       $categories_data[$category -> name] = ['name' => $category -> name, 'slug' => $category -> slug];
}

return $categories_data;
}

function csf_get_tags(){  
    
    $taxonomy     = 'product_tag';
    $orderby      = 'name';     
    
    $args = array(
           'taxonomy'     => $taxonomy,
           'orderby'      => $orderby,
           'hide_empty'   => 1          
    );

    $all_tags = get_tags( $args );

    return $all_tags;

}

?>