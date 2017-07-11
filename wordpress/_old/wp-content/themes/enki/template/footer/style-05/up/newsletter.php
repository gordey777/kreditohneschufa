<?php 
$mailchimp_form_action =  esc_html( get_theme_mod( 'mailchimp_form_action', '' ) );

if( $mailchimp_form_action ):
?>

	<div class="enki-module-newsletter style-01">

		<form action="<?php echo esc_url( $mailchimp_form_action ); ?>" method="post" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<span><?php echo esc_html_e( 'sign up', 'enki' ); ?></span>
			<input type="text" value="" name="EMAIL" class="required email" placeholder="<?php echo esc_attr_e( 'Email address', 'enki' ); ?>">
		    <button type="submit" name="subscribe"><i class="ti-arrow-right"></i></button>	    	    
		</form>

	</div>

<?php
endif;