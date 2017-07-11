<?php
global $wp_query;
if ( $wp_query->max_num_pages <= 1 ) { return; }

$path = get_template_directory_uri() . '/images/arrow/';
?>

<div class="enki-pagination style-02">
    <?php 
    the_posts_pagination( array(
        'prev_text' => sprintf( '<img src="%1$s/prev.png" alt="%2$s">%2$s', $path, esc_html__( 'Previous', 'enki' ) ),
        'next_text' => sprintf( '%2$s<img src="%1$s/next.png" alt="%2$s">', $path, esc_html__( 'Next', 'enki' ) )
    ) ); 
    ?>
</div>
