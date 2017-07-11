<?php get_template_part( 'template/header/common/head' ); ?>

<body <?php body_class(); ?>>

  <?php 
  $is_show_intro_text   = (int)get_theme_mod( 'is_show_intro_text', 1 );
  $is_show_search_form  = (int)get_theme_mod( 'is_show_search_form', 0 );
  $is_show_social_links = (int)get_theme_mod( 'is_show_social_links', 1 );
  ?>

  <?php 
  get_template_part( 'template/header/style-06/overlay' );
  get_template_part( 'template/header/style-06/panel', 'side' );    
  ?>

	<div class="main-container">
    <header class="kopa-page-header-10">
      <div class="kopa-header-top white-text-style">
        <div class="container">      
          <?php if( $is_show_intro_text): ?>
              <div class="kopa-pull-left">
                  <?php get_template_part( 'template/header/style-06/intro' ); ?>
              </div>
          <?php endif; ?>          

          <div class="kopa-pull-right">  
              <?php 
              if( $is_show_search_form ){
                  get_template_part( 'template/header/style-06/search' ); 
              }
              ?>

              <?php 
              if( $is_show_social_links  ){
                  get_template_part( 'template/header/style-06/socials' ); 
              }
              ?>
          </div>
        </div>
      </div>

      <div class="kopa-header-bottom">
        <div class="container">
          <?php get_template_part( 'template/header/style-06/logo' ); ?>
          <div class="kopa-pull-right">  
              <?php get_template_part( 'template/header/style-06/nav', 'primary' ); ?>
              <?php get_template_part( 'template/header/style-06/handler' ); ?>
          </div>
        </div>
      </div>

    </header>        
    
    <div id="main-container">