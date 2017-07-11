<?php 
$logo_mobile_id = absint( get_theme_mod( 'logo_mobile', 0 ) );

if( $logo_mobile_id ):
	$logo_mobile = wp_get_attachment_image_url ( $logo_mobile_id, 'full' );

	if( $logo_mobile ):
	?>

		<div class="kopa-logo">
		    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		        <img src="<?php echo esc_url( $logo_mobile ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		    </a>
		</div>

	<?php
	endif;

endif;