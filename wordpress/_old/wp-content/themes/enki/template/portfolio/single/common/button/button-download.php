<?php
$url = get_post_meta( get_the_ID(), 'enki_download_url', true );
if( $url ):
	?>
	<a href="<?php echo esc_url( $url ); ?>" class="enki-btn enki-size-03 enki-bd-fat enki-color-hover enki-effect-01"><?php esc_html_e( 'download', 'enki' ); ?></a>
<?php
endif;