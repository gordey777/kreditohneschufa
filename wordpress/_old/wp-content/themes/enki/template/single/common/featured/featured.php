<?php
$featured_type = get_post_meta( get_the_ID(), 'enki_featured_type', true );
if( $featured_type ){		
	?>
	<div class="entry-thumb">
		<?php
		$featured_type = apply_filters( 'enki_single_get_featured_type', $featured_type );
		get_template_part( 'template/single/common/featured/featured', $featured_type );
		?>
	</div>
	<?php
}