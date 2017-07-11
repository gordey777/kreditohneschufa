<?php
global $wp_query;
if ( $wp_query->max_num_pages <= 1 ) { return; }

$current_page = isset( $wp_query->query['paged'] ) ? (int)$wp_query->query['paged'] : 1;
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="enki-pagination style-01">
        <span class="enki-nav-all"><?php sprintf( esc_html__( 'Page %d of %d', 'enki' ), $current_page, $wp_query->max_num_pages ); ?></span>
        <?php 
        the_posts_pagination( array(
            'prev_text' => ' <i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>'
        ) ); 
        ?>
    </div>
</div>