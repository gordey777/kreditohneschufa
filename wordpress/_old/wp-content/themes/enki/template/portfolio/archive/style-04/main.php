<?php $path = 'template/portfolio/archive/style-04/main/'; ?>

<?php if( have_posts() ):	?>
	
	<?php while( have_posts() ): the_post(); ?>
		
		<?php get_template_part( $path . 'content' ); ?>
		
	<?php endwhile; ?>

<?php
endif;