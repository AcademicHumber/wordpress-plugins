
<section id="search-widget">
<?php
$all_categories = csf_get_categories();
$all_tags = csf_get_tags();
?>
<form role="search" method="get" class="sf-search-form" action="<?php echo home_url( '/' ); ?>">

    <label for="category_name" class="sf_label">Acción Terapéutica</label>
  <select id="category_name" name="product_cat" class="sf_form_select">    
    <option value="">Todas</option>
    <?php
    foreach ($all_categories as $category):?>
      <option value="<?php echo $category['slug']?>"><?php echo $category['name'];?></option>
      <?php      
    endforeach; ?>
  </select>

  <label for="tag" class="sf_label">Molécula</label>
  <select id="tag" name="product_tag" class="sf_form_select">
    <option value="">Todas</option>
    <?php $tags = get_tags();
    foreach ($all_tags as $tag):?>
      <option value="<?php echo $tag->slug;?>"><?php echo $tag->name;?></option>
    <?php endforeach?>
  </select>
  <input type="hidden" value="product" name="post_type"/>
  <input type="hidden" value="" name="s"/>
  <input type="submit" class="sf-form-button" value="<?php echo esc_attr_x( 'Buscar', 'submit button' ) ?>" />
  
</form>
</section>

