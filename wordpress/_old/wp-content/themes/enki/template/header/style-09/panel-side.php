<?php 
$is_show_search_form_mobile = (int)get_theme_mod( 'is_show_search_form_mobile', true );
?>

<section class="slide-area">

    <div class="close-btn">
        <span class="close-icon"></span>
    </div>

    <div class="slide-container">

        <?php get_template_part( 'template/header/style-09/panel/side/logo' ); ?>    
        
        <?php 
        if( $is_show_search_form_mobile ) {
        	get_template_part( 'template/header/style-09/panel/side/search' ); 
        }
        ?>    
        
        <?php get_template_part( 'template/header/style-09/panel/side/nav', 'mobile' ); ?>    

    </div>

</section>