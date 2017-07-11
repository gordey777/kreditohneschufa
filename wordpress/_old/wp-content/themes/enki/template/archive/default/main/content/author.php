<div class="enki-entry-author">
    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
        <?php echo get_avatar( get_the_author_meta( 'email' ), 42 ); ?>
        <span><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></span>
    </a>
</div>