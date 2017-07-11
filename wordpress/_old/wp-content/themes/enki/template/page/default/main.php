<?php $path = 'template/page/default/main/'; ?>

<?php if( have_posts() ): ?>

    <?php while(have_posts()): the_post(); ?>

        <?php get_template_part( $path . 'content' ); ?>   

       	<?php comments_template(); ?>

    <?php endwhile; ?>

<?php endif;