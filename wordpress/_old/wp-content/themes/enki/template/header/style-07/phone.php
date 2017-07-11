<?php 
$phone = esc_html( get_theme_mod( 'phone_number', '' ) );

if( $phone ):
?>

	<div class="header-contact">
		<p><i class="fa fa-phone"></i><?php echo esc_html( $phone ); ?></p>
	</div> 

<?php
endif;