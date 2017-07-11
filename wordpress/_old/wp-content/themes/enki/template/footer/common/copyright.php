<?php 
$copyright = wp_kses_post( get_theme_mod( 'copyright' ) );

if( $copyright  ):
?>
<div class="kopa-copyright">
    <p><?php echo wp_kses_post( $copyright ); ?></p>
</div>

<?php 
endif;