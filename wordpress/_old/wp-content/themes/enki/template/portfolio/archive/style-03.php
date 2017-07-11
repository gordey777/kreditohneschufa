<?php 
$enki_breadcrumb = Enki_Breadcrumb::get_instance();
$enki_breadcrumb->get_template_part();
?>

<?php $path = 'template/portfolio/archive/style-03/'; ?>

<section class="kopa-area">
    <div class="container">
        <div class="widget">
            <div class="enki-module-portfolio style-02">
                <?php get_template_part( $path . 'header' ); ?>

                <div class="widget-content">
                    <div class="row">
                       <?php get_template_part( $path . 'main' ); ?> 
                    </div>
                </div>

                <?php get_template_part( $path . 'pagination' ); ?>

            </div>
        </div>
    </div>
</section>

<?php 
get_template_part( $path . 'footer' );