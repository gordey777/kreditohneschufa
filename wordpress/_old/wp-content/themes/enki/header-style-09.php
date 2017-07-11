<?php get_template_part( 'template/header/common/head' ); ?>

<body <?php body_class(); ?>>

	<?php 
	get_template_part( 'template/header/style-09/overlay' );
	get_template_part( 'template/header/style-09/panel', 'side' ); 
	?>

	<div class="main-container">

		<header class="kopa-page-header-4">

            <div class="container">

                <div class="kopa-pull-left"> 
                    <?php get_template_part( 'template/header/style-09/logo' ); ?>
                    
                    <?php get_template_part( 'template/header/style-09/title', 'sub' ); ?>
                </div>                

                <div class="kopa-pull-right">  
                    <?php get_template_part( 'template/header/style-09/nav', 'primary' ); ?>

                    <?php get_template_part( 'template/header/style-09/handler' ); ?>                    
                </div>
            
            </div>

        </header>

        <div id="main-container">