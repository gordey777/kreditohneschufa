<?php
$enki_utility = Enki_Utility::get_instance();
$socials      = $enki_utility->get_socials_activated();

if( count( $socials ) ):
?>
	<div class="kopa-social-links style-06">
	    <ul class="clearfix">
	    	<?php foreach ( $socials as $slug => $social ): ?>                 
	    		<li>
	    			<a href="<?php echo esc_url( $social['url'] ); ?>" class="<?php echo esc_attr( $social['icon'] ); ?>"  target="<?php echo esc_attr( $social['target'] ); ?>" rel="<?php echo esc_attr( $social['rel'] ); ?>"></a>
	    		</li>
	    	<?php endforeach; ?>
	    </ul>
	</div>
<?php
endif;