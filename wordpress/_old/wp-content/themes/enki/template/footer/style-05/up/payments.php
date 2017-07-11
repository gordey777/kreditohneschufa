<?php 
$enki_utility = Enki_Utility::get_instance();
$payment_gateway_providers = $enki_utility->get_payment_gateway_providers();

if( $payment_gateway_providers ):
?>

	<div class="enki-module-ft-ads">
	    <ul>	       
	    	<?php foreach( $payment_gateway_providers as $name => $info ): ?>
	        	<li>
	        		<a href="<?php echo esc_url( $info['url'] ); ?>" target="_blank" rel="nofollow" title="<?php echo esc_attr( $info['title'] ); ?>">
	        			<img src="<?php echo esc_url( $info['image'] ); ?>" alt="">
	        		</a>
	        	</li>
	        <?php endforeach; ?>
	    </ul>
	</div>

<?php
endif;