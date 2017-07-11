<?php 
$enki_config = Enki_Config::get_instance();
$path = 'template/archive/default/main/content/meta/';
?>

<div class="entry-meta style-01">
    <div class="meta-line-1"></div>

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

</div>