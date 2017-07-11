<?php 
$enki_config = Enki_Config::get_instance();
$path = 'template/archive/style-02/main/content/meta/';
?>

<div class="entry-meta style-01">
    
    <?php 
    if( $enki_config->setting['blog']['is_show_date'] ){
	    get_template_part( $path . 'date' ); 
	}
    ?>

    <?php 
    if( $enki_config->setting['blog']['is_show_comment'] ){
    	get_template_part( $path . 'comments' );
    }
    ?>

    <?php 
    if( $enki_config->setting['blog']['is_show_share'] ){
	    get_template_part( $path . 'share' );
	}
    ?>

    <?php 
    if( $enki_config->setting['blog']['is_show_like'] ){
        get_template_part( $path . 'like' );
    }
    ?>   

</div>