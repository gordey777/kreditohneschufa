<?php get_template_part( 'template/header/common/head' ); ?>

<body <?php body_class(); ?>>

  <?php 
  $is_show_search_form  = (int)get_theme_mod( 'is_show_search_form', 0 );
  $is_show_social_links = (int)get_theme_mod( 'is_show_social_links', 1 );
  ?>

  <?php 
  get_template_part( 'template/header/style-08/overlay' );
  get_template_part( 'template/header/style-08/panel', 'side' ); 
  ?>

	<div class="main-container">

		<header class="kopa-page-header-3">

            <div class="container">

                <div class="kopa-pull-left"> 
                	<?php get_template_part( 'template/header/style-08/logo' ); ?>
                </div>

                <div class="kopa-pull-right">  

                  	<?php 
                  	if( $is_show_social_links ){
                  		get_template_part( 'template/header/style-08/socials' ); 
                  	}
                  	?>
                  	
                  	<?php get_template_part( 'template/header/style-08/handler' ); ?>

                  	<?php 
                  	if( $is_show_search_form ){
                  		get_template_part( 'template/header/style-08/search' ); 
                  	}
                  	?>

                </div>

                <?php get_template_part( 'template/header/style-08/nav', 'primary' ); ?>
            
            </div>

        </header>

        <div id="main-container">