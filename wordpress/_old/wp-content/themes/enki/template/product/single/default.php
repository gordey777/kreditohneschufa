<?php 
$enki_breadcrumb = Enki_Breadcrumb::get_instance();
$enki_layout = Enki_Layout::get_instance();
$enki_breadcrumb->get_template_part();
$path= 'template/product/archive/default/';
?>

<section class="kopa-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="enki_modul_type_product_shop_single woocommerce">
                    <?php get_template_part( $path . 'main' ); ?>
                </div>         

            </div>
        </div>
    </div>
</section>