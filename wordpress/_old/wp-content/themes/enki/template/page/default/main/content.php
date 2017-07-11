<?php $path = 'template/page/default/main/content/'; ?>

<article <?php post_class( array( 'single-entry-item' ) ); ?>>

    <div class="entry-content">
        
        <?php if( has_post_thumbnail() ): $enki_utility = Enki_Utility::get_instance(); ?>
            <div class="entry-thumb">
                <?php the_post_thumbnail( $enki_utility->get_featured_image_size() );?>
            </div>
        <?php endif; ?>

        <?php
        $title_type = get_post_meta( get_the_ID(), 'enki_title_type', true );
        get_template_part( $path . 'title', $title_type );
        ?>        

        <div id="enki-page-content" class="clearfix">
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        </div>
        
    </div>

</article>