<?php 
$logo_id = absint( get_theme_mod( 'logo', 0 ) );
$logo    = wp_get_attachment_image_url ( $logo_id, 'full' );

if( $logo ):
	?>
	<div class="kopa-logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    </a>
	</div>
<?php else: ?>
	<?php if( is_front_page() ): ?>
		<h1 id="enki-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a></h1>
	<?php else: ?>
		<h2 id="enki-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a></h2>
	<?php endif; ?>
<?php
endif;
