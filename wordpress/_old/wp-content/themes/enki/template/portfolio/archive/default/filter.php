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
				<li class="enki_index" data-filter="<?php echo esc_attr( $_id ); ?>"><?php echo esc_html(  $_label ); ?></li>
				<?php 				
			endforeach;
		endif;		
		?>
	</ol>
<?php endif; ?>