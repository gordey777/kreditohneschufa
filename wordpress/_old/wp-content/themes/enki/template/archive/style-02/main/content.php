<?php 
$enki_config = Enki_Config::get_instance();
$path = 'template/archive/style-02/main/content/';
?>

<article <?php post_class( 'entry-item' ); ?>>

    <?php 
    if( has_post_thumbnail() ){
    	get_template_part( $path . 'thumb' );
	}
    ?>

    <header class="entry-header">
        
        <?php 
        if( $enki_config->setting['blog']['is_show_category'] ){
            get_template_part( $path . 'category' ); 
        }
        ?>

        <?php get_template_part( $path . 'title' ); ?>    

        <?php 
        if( $enki_config->setting['blog']['is_show_date'] || $enki_config->setting['blog']['is_show_comment'] || $enki_config->setting['blog']['is_show_share'] || $enki_config->setting['blog']['is_show_like'] ){
            get_template_part( $path . 'meta' );
        }
        ?>

    </header>

    <?php get_template_part( $path . 'excerpt' ); ?>

</article>
