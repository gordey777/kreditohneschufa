<?php 
$enki_breadcrumb = Enki_Breadcrumb::get_instance();
$enki_layout     = Enki_Layout::get_instance();
$enki_breadcrumb->get_template_part();

$path                = 'template/product/archive/default/';
$sb_right            = apply_filters( 'enki_get_sidebar_by_position', 'sb_right_shop', 'pos_right' );
$main_column_classes = $enki_layout->get_main_column_classes( $sb_right );
?>

<section class="kopa-area">
    <div class="container">
        <div class="row">
            
            <div class="<?php echo esc_attr( implode( ' ', $main_column_classes ) ); ?>">
                <?php get_template_part( $path . 'main' ); ?>
            </div>

            <?php if( is_active_sidebar( $sb_right ) ): ?>
                <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                	<?php get_template_part( $path . 'right' ); ?>            
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_template_part( $path . 'footer' ); ?>           