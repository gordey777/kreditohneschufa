<?php 
$before = '<div class="entry-share">';
$before .= '<div class="share-btn-1">';
$before .= '<span><i class="ti-share"></i>'. esc_html__( 'Share', 'enki' ) .'</span>';
$before .= '</div>';
$before .= '<div class="social-share-list">';

$args = array(
    'before' => $before,
    'after'  => '</div></div>'
);

do_action( 'enki_blog_share_buttons', 'default', $args ); 