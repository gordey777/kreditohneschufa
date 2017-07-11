<?php get_template_part( 'template/header/common/head' ); ?>

<body <?php body_class(); ?>>
    <?php
    $is_show_search_form  = (int)get_theme_mod( 'is_show_search_form', 0 );
    ?>

    <?php 
    get_template_part( 'template/header/style-04/overlay' );
    get_template_part( 'template/header/style-04/panel', 'side' );
    ?>

    <div class="main-container">

        <header class="kopa-page-header-8">

            <div class="container">

                <div class="kopa-pull-left"> 
                    <?php get_template_part( 'template/header/style-04/logo' ); ?>
                </div>
                
                <div class="kopa-pull-right">  

                    <?php get_template_part( 'template/header/style-04/nav', 'primary' ); ?>
                    
                    <?php 
                    if( $is_show_search_form ){
                        get_template_part( 'template/header/style-04/search' ); 
                    }
                    ?>

                    <?php get_template_part( 'template/header/style-04/handler' ); ?>                    

                </div>
                            
            </div>
            
        </header>

        <div id="main-container">