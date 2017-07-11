<?php
$args = array(
    'before' => '<p class="entry-like">',
    'after'  => '</p>',
    'suffix' => esc_html__( 'Likes', 'enki' )
);
do_action( 'enki_blog_like_button', 'default', $args );