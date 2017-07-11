<?php $path = 'template/portfolio/single/style-02/main/'; ?>

<?php if( have_posts() ):   ?>

    <?php while( have_posts() ): the_post(); ?>

		 <div <?php post_class( 'row' ); ?>>

		    <div class="col-md-12 col-sm-12 col-xs-12">
		        <div class="widget">
					<div class="enki-single-portfolio style-4">
						<div class="widget-header-wrapper">
							<header class="widget-header style-01">
								
								<h3 id="enki-page-title" class="widget-title"><?php the_title(); ?></h3>
								
								<span class="icon-title"></span>

								<div id="enki-page-content" class="entry-content clearfix">
	                                <?php the_content(); ?>
	                                <?php wp_link_pages(); ?>
	                            </div>

							</header>							

							<?php get_template_part( $path . 'additional' ); ?>
							
							<?php get_template_part( $path . 'button', 'share' ); ?>

							<?php get_template_part( $path . 'button', 'download' ); ?>
							
						</div>
						

						<div class="widget-content">				
							<?php get_template_part( $path . 'featured' ); ?>															

							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<?php get_template_part( $path . 'testimonials' ); ?>
								</div>
							</div>

						</div>
						
					</div>
					
				</div>
		    </div>
		</div>

		<div class="row">
		    <div class="col-md-12 col-sm-12 col-xs-12">
		   		<?php get_template_part( $path . 'adjacent' ); ?>
		    </div>
		</div>

    <?php endwhile; ?>

<?php
endif;
