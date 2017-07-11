<?php $enki_config = Enki_Config::get_instance(); ?>

<div class="entry-meta style-06">

	<?php 
	if( $enki_config->setting['blog']['is_show_like'] ) {
		$args = array(
			'before' => '<div class="meta-item entry-like">',
			'after'  => '</div>'
		);
		do_action( 'enki_blog_like_button', 'default', $args );
	}
	?>

	<?php
	if( $enki_config->setting['blog']['is_show_share'] ) {

		$before = '<div class="meta-item entry-share">';
		$before .= '<div class="share-btn-1">';
		$before .= '<span><i class="ti-share"></i>'. esc_html__( 'Share', 'enki' ) .'</span>';
		$before .= '</div>';
		$before .= '<div class="social-share-list">';

		$args = array(
			'before' => $before,
			'after'  => '</div></div>'
		);
		do_action( 'enki_blog_share_buttons', 'default', $args ); 

	}
	?>
	
</div>