			</div>
			<!-- END: #main-container -->
		
			<footer class="kopa-footer style-05 white-text-style">

				<div class="footer-area-1">
					<div class="container">
						<?php get_template_part( 'template/footer/style-04/logo' ); ?>
					</div>		

					<?php 
					$is_show_social_links_footer = (int)get_theme_mod( 'is_show_social_links_footer', true );
					
					if( $is_show_social_links_footer ) {
						get_template_part( 'template/footer/style-04/socials' ); 
					}
					?>
				</div>	

				<div class="footer-area-2">
					<div class="container">
						<?php get_template_part( 'template/footer/style-04/copyright' ); ?>
					</div>
				</div>

			</footer>
		
		</div> 
		<!-- END: .main-container -->
<?php
get_template_part( 'template/footer/common/footer' );
