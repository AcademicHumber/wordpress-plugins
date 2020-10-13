
<section id="widget-by-family">
<?php
$user_categories = trim(esc_attr(get_option('categories_field')));
$user_categories = explode('-', $user_categories);
$all_categories = wm_get_categories_data();
$color_intercalator = 1;


foreach ($user_categories as $user_category):
    if(!empty($all_categories[$user_category]['sub-categories'])):
    echo '<button class="wm_color'.$color_intercalator.' accordion">'.$user_category.'</button>';
    echo '<div class="panel-1">';
    
    foreach($all_categories[$user_category]['sub-categories'] as $sub_category):        
        ?>

        <button class="accordion sub<?php echo  $color_intercalator.'">'.$sub_category['name']; ?></button>
        <div class="panel">
        <?php echo do_shortcode('[products limit="-1" columns="1" category="'.$sub_category['slug'].'" cat_operator="IN"]') ?>
        </div>

        <?php        
    endforeach;
    
    echo '</div>';
    $color_intercalator == 1 ? $color_intercalator = 2 : $color_intercalator = 1;    

    endif;  
endforeach;
?>
</section>
<script>
//--Script para efectos de cascada--
var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {            
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
