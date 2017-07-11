<?php
global $post;

$obj_data_col    = Enki_Builder_Data_Col::get_instance();
$col_classes     = $obj_data_col->get_classes();
$col_id          = $obj_data_col->get_id( $post->ID );
?>

<div id="<?php echo esc_attr( $col_id ); ?>" class="<?php echo esc_attr( $col_classes ); ?>">	
	<?php $obj_data_col->print_css( $post->ID ); ?>
	<div class="enki-col-wrap">