<?php 
$enki_config = Enki_Config::get_instance();
$path = 'template/archive/default/main/content/'; 
?>

<article <?php post_class( array( 'entry-item', 'enki-item' ) ); ?>>
    
    <?php if( $enki_config->setting['blog']['is_show_share'] || $enki_config->setting['blog']['is_show_like'] || $enki_config->setting['blog']['is_show_author'] ) : ?>
      <div class="enki-entry-share">
        <?php 
        if( $enki_config->setting['blog']['is_show_share'] || $enki_config->setting['blog']['is_show_like'] ){
          get_template_part( $path . 'socials' ); 
        }
        ?>

        <?php 
        if( $enki_config->setting['blog']['is_show_author'] ){
          get_template_part( $path . 'author' ); 
        }
        ?>
      </div>
    <?php endif; ?>

    <header class="entry-header">
      <?php 
      if( has_post_thumbnail() ){
        get_template_part( $path . 'thumb' ); 
      }
      ?>
      
      <?php get_template_part( $path . 'title' ); ?>
      
      <?php 
      if( $enki_config->setting['blog']['is_show_date'] || $enki_config->setting['blog']['is_show_comment'] ){
        get_template_part( $path . 'meta' ); 
      }
      ?>
    </header>

    <?php get_template_part( $path . 'excerpt' ); ?>

</article>