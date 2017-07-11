<?php $path = 'template/search/default/main/content/'; ?>

<article <?php post_class( array( 'entry-item', 'enki-missing-thumbnail' ) ); ?>>   

    <div class="entry-content">
        
        <header class="entry-header">
            <?php get_template_part( $path . 'title' ); ?>    
            <?php get_template_part( $path . 'meta' ); ?>
        </header>

        <footer class="entry-footer">
            <?php get_template_part( $path . 'excerpt' ); ?>
            <?php get_template_part( $path . 'button', 'more' ); ?>           
        </footer>

    </div>

</article>