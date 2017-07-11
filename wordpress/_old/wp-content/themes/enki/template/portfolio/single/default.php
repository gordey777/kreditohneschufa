<?php 
$enki_breadcrumb = Enki_Breadcrumb::get_instance();
$enki_breadcrumb->get_template_part();
?>

<?php $path = 'template/portfolio/single/default/'; ?>

<section class="kopa-area">
  <div class="container">
    <?php get_template_part( $path . 'main' ); ?>
  </div>
</section>

<?php
get_template_part( $path . 'related' );