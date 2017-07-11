<?php 
$enki_config = Enki_Config::get_instance();
$path = 'template/single/default/main/'; 
?>

<?php if( have_posts() ): ?>

    <?php while(have_posts()): the_post(); ?>

        <?php get_template_part( $path . 'content' ); ?>   

        <?php 
        if( $enki_config->setting['post']['is_show_category'] ) {
        	get_template_part( $path . 'category' );
    	}
        ?>

        <?php 
        if( $enki_config->setting['post']['is_show_tag'] ) {
        	get_template_part( $path . 'tag' );
    	}
        ?>

        <?php
        if( $enki_config->setting['post']['is_show_author'] ) {
        	get_template_part( $path . 'author' );
    	}
        ?>
        
       	<?php comments_template(); ?>

    <?php endwhile; ?>

<?php endif;