<?php get_template_part( 'template/header/common/head' ); ?>

<body <?php body_class(); ?>>

  <?php 
  get_template_part( 'template/header/style-07/overlay' );
  get_template_part( 'template/header/style-07/panel', 'side' ); 
  ?>

	<div class="main-container">

		<header class="kopa-page-header-1">

      <div class="container">

        <div class="header-left kopa-pull-left">    
          <?php get_template_part( 'template/header/style-07/logo' ); ?>

          <?php get_template_part( 'template/header/style-07/phone' ); ?>                                                    
        </div>

        <div class="header-right kopa-pull-right">  
          <?php get_template_part( 'template/header/style-07/nav', 'primary' ); ?>      

          <?php get_template_part( 'template/header/style-07/handler' ); ?>      
        </div>
      
      </div>

    </header>        

    <div id="main-container">