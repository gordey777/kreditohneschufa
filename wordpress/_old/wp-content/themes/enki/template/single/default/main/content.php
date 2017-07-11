<?php 
$enki_config = Enki_Config::get_instance();
$path = 'template/single/default/main/content/'; 
?>

<article <?php post_class( array( 'single-entry-item' ) ); ?>>

    <?php 
    if( $enki_config->setting['post']['is_show_featured'] ) {
        get_template_part( $path . 'featured' );
    }
    ?>

    <div class="entry-content">
        
        <header class="clearfix">
            
            <h1 id="enki-page-title" class="entry-title"><?php the_title(); ?></h1>

            <?php if( $enki_config->setting['post']['is_show_date'] || $enki_config->setting['post']['is_show_comment'] || $enki_config->setting['post']['is_show_like'] || $enki_config->setting['post']['is_show_share'] ) : ?>
                
                <div class="entry-meta style-01">
                    
                    <?php 
                    if( $enki_config->setting['post']['is_show_date'] ) {
                        get_template_part( $path . 'date' );
                    }
                    ?> 

                    <?php 
                    if( $enki_config->setting['post']['is_show_comment'] ) {
                        get_template_part( $path . 'comments' );
                    }
                    ?>    

                    <?php 
                    if( $enki_config->setting['post']['is_show_like'] ) {
                        get_template_part( $path . 'button', 'like' );
                    }
                    ?>

                    <?php 
                    if( $enki_config->setting['post']['is_show_share'] ) {
                        get_template_part( $path . 'button', 'share' );
                    }
                    ?>
                </div>

            <?php endif; ?>

        </header>

        <div id="enki-page-content" class="clearfix">
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        </div>
        
    </div>
</article>