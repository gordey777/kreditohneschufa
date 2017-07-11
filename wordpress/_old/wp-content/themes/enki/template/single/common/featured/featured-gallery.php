<?php
$ids = get_post_meta( get_the_ID(), 'enki_gallery', true );
if( $ids ) {
	echo do_shortcode( sprintf( '[gallery ids="%s" style=1 columns=1 size="enki-extra-02"]', implode( ',', $ids ) ) );
}