<?php $path = 'template/portfolio/archive/default/main/'; ?>

<?php
if( have_posts() ):
	global $enki_index, $enki_size, $enki_subtitle, $enki_data_filter, $enki_size_class, $enki_subtitle_url;

	$items           = '';
	$enki_index      = 0;	
	$enki_size       = 'enki-medium-04';
	$enki_size_class = 'size-01';

	if( isset( $_POST['enki_index'] ) ){
		$enki_index = (int)$_POST['enki_index'];		
		$enki_index++;
	}
	?>
	
	<?php 
	while( have_posts() ): the_post();
		$enki_subtitle     = get_post_meta( get_the_ID(), 'enki_subtitle', true );
		$enki_subtitle_url = get_post_meta( get_the_ID(), 'enki_subtitle_url', true );		
		$enki_subtitle_url = $enki_subtitle_url ? $enki_subtitle_url : get_permalink();
		$enki_data_filter  = array();
		$terms             = wp_get_post_terms( get_the_ID(), 'portfolio_tag' );

		if( $terms ){
			foreach( $terms as $term ){
				$enki_data_filter[] = $term->term_id;				
			}
		}

		if( $enki_index >= 10 ){
			$enki_index = 0;
		}

		switch ( $enki_index) {
			case 0:
			case 4:
				$enki_size = 'enki-large-03';
				break;
			case 2:
			case 6:
			case 9:					
				$enki_size = 'enki-large-04';						
				break;
			case 1:
			case 3:
			case 7:
			case 8:
				$enki_size = 'enki-medium-04';
				break;
			case 5:
				$enki_size = 'enki-large-05';
				break;						
		}

		switch ( $enki_size ) {
			case 'enki-large-03':
			case 'enki-large-04':					
				$enki_size_class = 'size-01';
				break;					
			default:
				$enki_size_class = 'size-02';
				break;
		}				
		?>

			<?php get_template_part( $path . 'content' ); ?>

		<?php
		$enki_index++;
	endwhile;

	unset( $enki_index );
	unset( $enki_size );
	unset( $enki_subtitle );
	unset( $enki_data_filter );
	unset( $enki_size_class );
	unset( $enki_subtitle_url );
	?>

<?php endif;