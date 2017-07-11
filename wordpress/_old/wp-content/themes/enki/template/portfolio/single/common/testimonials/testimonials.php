<?php 
$testimonials_ids = get_post_meta( get_the_ID(), 'enki_testimonials', true );
if( $testimonials_ids ):	
	$records = new WP_Query( array( 'post_type' => 'testimonial', 'post__in' => $testimonials_ids ) );

	if ( $records->have_posts() ): 
		while ($records->have_posts()):
			$records->the_post();

			$message         = get_post_meta( get_the_ID(), 'enki_message', true );			
			$job             = get_post_meta( get_the_ID(), 'enki_job', true );			
			
			$company_name    = get_post_meta( get_the_ID(), 'enki_company_name', true );			
			$company_suffix  = get_post_meta( get_the_ID(), 'enki_company_suffix', true );			
			?>

			<blockquote class="enki-blockquote style-08">
				<p><?php echo wp_kses_post( $message ); ?></p>
				<h6><?php the_title(); ?></h6>
				
				<i>
				<?php if( $job || $company_name ): ?>
					<span>
						<?php echo esc_html( $job ); ?>
						<?php 
						if( $company_name ){
							echo ', ' . esc_html( $company_name );
						}
						?>
					</span>
				<?php endif; ?>

				<?php if( $company_suffix ): ?>					
					- <?php echo esc_html( $company_suffix ); ?>
				<?php endif; ?>	
				</i>				
			</blockquote>

			<?php
		endwhile;
	endif;
	
	wp_reset_postdata();
endif;