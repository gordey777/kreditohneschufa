<?php $path = 'template/search/default/main/'; ?>

<div class="enki-module-blog-list style-04">

    <div class="enki-blog-list-wrapper">

        <?php if( have_posts() ): ?>

            <?php while(have_posts()): the_post(); ?>

                <?php get_template_part( $path . 'content' ); ?>        

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

    <?php get_template_part( $path . 'button', 'next-prev' ); ?>     

</div>
