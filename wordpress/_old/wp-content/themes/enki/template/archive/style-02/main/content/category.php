<?php
$taxonomy = apply_filters( 'enki_blog_get_tax_name', 'category' );
$terms    = wp_get_post_terms( get_the_ID(), $taxonomy );

if( $terms ):
?>
	<div class="entry-categories">
		<?php foreach( $terms as $term ) : ?>
			<a href="<?php echo esc_url( get_term_link( $term, $taxonomy ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
		<?php endforeach; ?>
	</div>
<?php
endif;