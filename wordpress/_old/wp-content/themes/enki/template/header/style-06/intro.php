<?php 
$intro = wp_kses_post( get_theme_mod( 'intro_text', '' ) );
if( $intro ):
	?>
	<div class="header-tag-line-2">
		<p><?php echo wp_kses_post( $intro ); ?></p>
	</div>
<?php
endif;	