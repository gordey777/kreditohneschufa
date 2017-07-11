
<div class="enki-module-blog-list style-02">
    <div class="enki-blog-list-wrapper">
        
        <?php if( have_posts() ): ?>

            <?php while(have_posts()): the_post(); ?>

                <?php get_template_part( 'template/archive/default/main/content' ); ?>        

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

    <?php get_template_part( 'template/archive/default/main/button', 'more' ); ?>
</div>
