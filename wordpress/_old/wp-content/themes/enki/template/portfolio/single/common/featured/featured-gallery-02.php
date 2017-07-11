<?php 
$ids = get_post_meta( get_the_ID(), 'enki_gallery', true );

if( $ids ) :
	?>
	
	<div class="enki-single-portfolio-gallery row">
		<?php		
		foreach ( $ids as $id) :			
			$image = wp_get_attachment_image_src( $id, 'enki-large-09' );
			?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive" alt="">
			</div>
		<?php endforeach; ?>
	</div>

	<?php	
endif;
