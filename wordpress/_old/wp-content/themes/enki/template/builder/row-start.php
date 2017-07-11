<?php
global $post;

$obj_data_row      = Enki_Builder_Data_Row::get_instance();
$row_id            = $obj_data_row->get_id( $post->ID );
$row_classes       = $obj_data_row->get_classes();
$container_classes = $obj_data_row->get_container_classes();
?>

<section id="<?php echo esc_attr( $row_id ); ?>" class="<?php echo esc_attr( $row_classes ); ?>">
	<?php $obj_data_row->print_css( $post->ID ); ?>
	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<div class="enki-row row">