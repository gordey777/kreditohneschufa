<?php 
$quote = get_post_meta( get_the_ID(), 'enki_quote', true );

if( isset( $quote['content'] ) && isset( $quote['author'] ) ):
?>

<blockquote class="enki-blockquote style-10">
    <h4><?php echo wp_kses_post( $quote['content'] ); ?></h4>
    <h6><?php echo esc_html( $quote['author'] ); ?></h6>
</blockquote>

<?php
endif;