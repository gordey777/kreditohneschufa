<?php 
$enki_breadcrumb = Enki_Breadcrumb::get_instance();
$enki_breadcrumb->get_template_part();
?>

<?php $path = 'template/portfolio/archive/default/'; ?>

<section class="kopa-area">
	<div class="widget">
		<div id="enki_data__portfolio" class="enki-module-portfolio style-03">

            <div class="widget-header-wrapper">
                <?php get_template_part( $path . 'header' ); ?>
                <?php get_template_part( $path . 'filter' ); ?>
            </div>

            <div class="widget-content">
            	<?php get_template_part( $path . 'main' ); ?>
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