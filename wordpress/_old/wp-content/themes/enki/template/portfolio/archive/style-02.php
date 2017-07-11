<?php 
$enki_breadcrumb = Enki_Breadcrumb::get_instance();
$enki_breadcrumb->get_template_part();
?>

<?php $path = 'template/portfolio/archive/style-02/'; ?>

<section class="kopa-area kopa-area-03">
    <div class="widget">
        <div class="enki-module-portfolio style-07">
            
                <div class="widget-header-wrapper">
		            <?php get_template_part( $path . 'filter' ); ?>                                        
                    <?php get_template_part( $path . 'header' ); ?>
                </div>

                <div class="widget-content">
                    <ul>
                        <?php get_template_part( $path . 'main' ); ?>
                    </ul>
                </div>

                <?php 
                if( get_next_posts_link() ){
                    get_template_part( $path . 'pagination' ); 
                }
                ?>
           
        </div>

    </div>
</section>

<?php 
get_template_part( $path . 'footer' );