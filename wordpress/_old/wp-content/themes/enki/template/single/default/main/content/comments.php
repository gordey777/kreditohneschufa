<p class="entry-author">
    <a href="<?php the_permalink(); ?>#respond">
        <i class="ti-pencil"></i>       
    </a>
    <?php comments_popup_link( 
        esc_html__( 'Leave a comment', 'enki' ), 
        esc_html__( '1 comment', 'enki' ), 
        esc_html__( '% comments', 'enki' ), 
        'comments-link', 
        esc_html__( 'Comments off', 'enki' ) ); 
    ?>
</p>