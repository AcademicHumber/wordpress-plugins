<?php
function sf_get_categories_data(){

$categories_data;  

$taxonomy     = 'product_cat';
$orderby      = 'name';  
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';  
$empty        = 1;

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