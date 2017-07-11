<?php $path = 'template/portfolio/archive/style-02/main/'; ?>

<?php
if( have_posts() ):
	global $enki_index, $enki_size, $enki_subtitle, $enki_data_filter, $enki_size_class;

	$items           = '';
	$enki_index      = 0;	
	$enki_size       = 'enki-medium-08';
	$enki_size_class = 'col-md-6 col-sm-6';

	if( isset( $_POST['enki_index'] ) ){
		$enki_index = (int)$_POST['enki_index'];		
		$enki_index++;
	}
	?>
	
	<?php 
	while( have_posts() ): the_post();
		$enki_subtitle     = get_post_meta( get_the_ID(), 'enki_subtitle', true );		
		$enki_data_filter  = array();
		$terms             = wp_get_post_terms( get_the_ID(), 'portfolio_tag' );

		if( $terms ){
			foreach( $terms as $term ){
				$enki_data_filter[] = $term->term_id;				
			}
		}

		if( $enki_index >= 6 ){
			$enki_index = 0;
		}

		switch ( $enki_index) {
			case 0:
			case 5:
				$enki_size       = 'enki-large-07';
				$enki_size_class = 'col-md-6 col-sm-6 col-xs-12';
				break;			
			default:
				$enki_size       = 'enki-medium-08';
				$enki_size_class = 'col-md-3 col-sm-3 col-xs-12';
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
	?>

<?php endif;