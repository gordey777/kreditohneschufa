<?php 
$enki_breadcrumb = Enki_Breadcrumb::get_instance();
$enki_breadcrumb->get_template_part();
?>

<?php $path = 'template/portfolio/archive/style-04/'; ?>

<section class="kopa-area">

	<div class="container">
	    <div class="widget enki-widget-has-paginator">
	        <div class="enki-module-portfolio style-05">
	            <div class="row">
	                <div class="col-md-10 col-sm-10 col-xs-12 col-md-push-1 col-sm-push-1">
	                    <div class="row row-custom">
	                        <ul>
	                            <li class="col-md-6 col-sm-6 col-xs-12">
	                                <?php get_template_part( $path . 'header' ); ?>
	                            </li>

	                            <?php get_template_part( $path . 'main' ); ?>

	                        </ul>
	                    </div>
	                </div>
	            </div>
	            
	        </div>
	        
	        <?php get_template_part( $path . 'pagination' ); ?>
	       
	    </div>
	</div>

</section>

<?php 
get_template_part( $path . 'footer' );
