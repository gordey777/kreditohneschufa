<?php $is_show_page_title = (int)get_theme_mod( 'is_show_page_title', true ); ?>

<section id="enki_breadcrumb" class="kopa-area kopa-area-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="enki-module-breacrumb style-01">
                
                    <?php 
                    if( $is_show_page_title ){
                    	get_template_part( 'template/breadcrumb/style-01/page', 'title' );
                    }
                    ?>
                    	                    
                    <?php get_template_part( 'template/breadcrumb/style-01/breadcrumb' ); ?>

                    <?php get_template_part( 'template/breadcrumb/style-01/icon' ); ?>

                </div>

            </div>
        </div>
    </div>
</section>
<div id='kopa-area-text' class='enki-index-for-scroll'></div>