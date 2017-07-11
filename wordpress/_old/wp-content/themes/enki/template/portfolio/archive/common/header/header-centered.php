<?php
$enki_hook = Enki_Hook::get_instance();

$subtitle = esc_html( get_theme_mod( 'portfolio_archive_subtitle', '' ) );
$title    = esc_html( get_theme_mod( 'portfolio_archive_title', '' ) );
$title    = $title ? $enki_hook->apply_html_tag( $title ) : '';
$desc     = wp_kses_post( get_theme_mod( 'portfolio_archive_desc', '' ) );

$classes = apply_filters( 'enki_portfolio_archive_get_header_classes', array( 'widget-header', 'style-01' ) );
?>

<header class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
    <h4 class="widget-sub-title">
        <span>01</span>
        <?php echo esc_html( $subtitle ); ?>
    </h4>
    <h3 class="widget-title"><?php echo wp_kses_post( $title ); ?></h3>
    <span class="icon-title"></span>
    <p><?php echo wp_kses_post( do_shortcode( $desc ) ); ?></p>
</header>

<?php
unset( $subtitle );
unset( $title );
unset( $desc );