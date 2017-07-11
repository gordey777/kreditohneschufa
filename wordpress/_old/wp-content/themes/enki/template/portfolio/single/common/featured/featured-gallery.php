<?php 
$ids = get_post_meta( get_the_ID(), 'enki_gallery', true );
if( $ids ) :		
	?>
	
	<div class="widget">
		<div class="enki-single-portfolio style-1">
			<?php foreach ( $ids as $id) : $image = wp_get_attachment_image_src( $id, 'enki-large-08' ); ?>
				<img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive" alt="">
			<?php endforeach; ?>
		</div>                    
	</div>

	<?php	
endif;