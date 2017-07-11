<?php 
$enki_config = Enki_Config::get_instance();
$path = 'template/archive/style-03/main/content/';
?>

<article <?php post_class( 'entry-item' ); ?>>

    <?php 
    if( has_post_thumbnail() ){
        get_template_part( $path . 'thumb' );
    }
    ?>    

    <div class="entry-content">
        
        <header class="entry-header">
            <?php get_template_part( $path . 'title' ); ?>
            <?php
            if( $enki_config->setting['blog']['is_show_date'] || $enki_config->setting['blog']['is_show_comment'] ){ 
                get_template_part( $path . 'meta' );
            }
            ?>
        </header>

        <footer class="entry-footer">
            <?php get_template_part( $path . 'excerpt' ); ?>
            <?php get_template_part( $path . 'button', 'more' ); ?>           
        </footer>

    </div>

</article>