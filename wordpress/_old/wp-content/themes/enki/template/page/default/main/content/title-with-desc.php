<header class="enki-single-title-ft-desc widget-header style-01">
    <h1 id="enki-page-title" class="widget-title"><?php the_title(); ?></h1>
    <span class="icon-title"></span>

    <?php
    $desc = get_post_meta( get_the_ID(), 'enki_desc', true );
    if( $desc ):
    	?>
    	<p><?php echo wp_kses_post( do_shortcode( $desc ) ); ?></p>     
	<?php endif; ?>
</header>
			