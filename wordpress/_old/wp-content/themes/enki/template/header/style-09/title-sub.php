<?php 
$sub_title = esc_html( get_theme_mod( 'sub_title', '' ) );

if( $sub_title ):
?>

	<div class="header-sub-title">
	    <h6><?php echo esc_html( $sub_title ); ?></h6>
	</div>

<?php
endif;