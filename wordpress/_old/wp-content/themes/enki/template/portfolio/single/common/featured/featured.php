<?php
$featured_type = get_post_meta( get_the_ID(), 'enki_featured_type', true );
if( $featured_type ){
	$featured_type = apply_filters( 'enki_single_get_featured_type', $featured_type );
	get_template_part( 'template/portfolio/single/common/featured/featured', $featured_type );
}