<?php get_template_part( 'template/header/common/head' ); ?>

<body <?php body_class(); ?>>
  <?php $is_show_search_form = (int)get_theme_mod( 'is_show_search_form', 0 ); ?>

  <?php 
  get_template_part( 'template/header/style-03/overlay' );
  get_template_part( 'template/header/style-03/panel', 'side' ); 
  ?>

	<div class="main-container">

        <header class="kopa-page-header-5">

            <?php get_template_part( 'template/header/style-03/top' ); ?>

            <div class="kopa-header-bottom">

                <div class="container">

                    <div class="kopa-pull-left">
                        <?php get_template_part( 'template/header/style-03/logo' ); ?>
                    </div>
                   

                    <div class="kopa-pull-right">  

                        <?php 
                        if( $is_show_search_form ) {
                            get_template_part( 'template/header/style-03/search' ); 
                        }
                        ?>

                        <?php get_template_part( 'template/header/style-03/handler' ); ?>
                        
                    </div>
                   
                    <?php get_template_part( 'template/header/style-03/nav', 'primary' ); ?>
                    
                </div>
               
            </div>
            
        </header>

        <div id="main-container">