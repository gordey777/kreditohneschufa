<div class="widget-header-left widget-header-match-height">      	
	<?php 	
	$enki_hook = Enki_Hook::get_instance();
	
	$title = wp_kses_post( get_theme_mod( 'portfolio_archive_title', '' ) );
	$title = $title ? $enki_hook->apply_html_tag( $title ) : '';
	?>
	<h3 class="widget-title style-01"><?php echo wp_kses_post( $title ); ?></h3>

	<?php 
	$enki_portfolio = ET_Posttype_Portfolio::get_instance();
	if( have_posts() ): ?>
		<ol class="filters-options clearfix">
			<li class="active" data-filter="*"><?php esc_html_e( 'All', 'enki' ); ?></li>
			<?php 
			$filters = $enki_portfolio->get_filter();

			if( $filters ):
				foreach( $filters as $_id => $_label ):				
					?>
					<li data-filter="<?php echo esc_attr( $_id ); ?>"><?php echo esc_html(  $_label ); ?></li>
					<?php 				
				endforeach;
			endif;		
			?>
		</ol>
	<?php endif; ?>

</div>