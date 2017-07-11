<?php 
$logo_footer_id = absint( get_theme_mod( 'logo_footer', 0 ) );

if( $logo_footer_id ):
	$logo_footer = wp_get_attachment_image_url ( $logo_footer_id, 'full' );

	if( $logo_footer ):
	?>
    <div class="footer-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( $logo_footer ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        </a>
    </div>
	<?php
	endif;
	
endif;
