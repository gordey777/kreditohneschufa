<?php $path = 'template/portfolio/archive/style-03/main/'; ?>

<?php
if( have_posts() ):
	global $enki_subtitle;	
	?>
	
	<?php 
	while( have_posts() ): the_post();
		$enki_subtitle = get_post_meta( get_the_ID(), 'enki_subtitle', true );		
		?>
		
		<?php get_template_part( $path . 'content' ); ?>
		
		<?php		
	endwhile;	
	unset( $enki_subtitle );	
	?>

<?php
endif;