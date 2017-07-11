<?php 
$url                =  get_theme_mod( 'call_to_action_button_url', '' );
$is_open_by_new_tab = (int)get_theme_mod( 'call_to_action_is_open_new_tab', true );
$target             = $is_open_by_new_tab ? '_blank' : '_self';

if( $url ):
	?>
	<div class="header-tag-line-1">
	    <p><?php echo esc_html( get_theme_mod( 'call_to_action_message' ) ); ?></p>
	    <a class="kopa-1-btn-1"  target="<?php echo esc_attr( $target ); ?>" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( get_theme_mod( 'call_to_action_button_text' ) ); ?></a>
	</div>
	<?php
endif;