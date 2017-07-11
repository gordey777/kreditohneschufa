<?php $enki_config = Enki_Config::get_instance(); ?>

<div class="entry-thumb">
    <a href="<?php the_permalink(); ?>">
    	<?php the_post_thumbnail( $enki_config->setting['thumbnail']['blog_style_02'] ); ?>
    </a>
    <?php get_template_part( 'template/archive/common/sticky/sticky' ); ?>
</div>