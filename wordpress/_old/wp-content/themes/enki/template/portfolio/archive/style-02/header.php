<?php 
$subtitle = wp_kses_post( get_theme_mod( 'portfolio_archive_subtitle', '' ) );
$desc     = wp_kses_post( get_theme_mod( 'portfolio_archive_desc', '' ) );
?>

<div class="widget-header-right widget-header-match-height">
    <span class="icon-title"></span>
    <?php if( $subtitle ): ?>
    	<h3><?php echo esc_html( do_shortcode( $subtitle ) ); ?></h3>
    <?php endif; ?>
	
	<?php if( $desc ): ?>
		<div class="clearfix">
			<?php echo wp_kses_post( do_shortcode( $desc ) ); ?>
		</div>
	<?php endif;?>

</div>