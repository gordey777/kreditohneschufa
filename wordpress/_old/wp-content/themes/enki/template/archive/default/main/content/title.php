<h4 class="entry-title">
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php 	
	if( !has_post_thumbnail() ) {
		get_template_part( 'template/archive/common/sticky/sticky' );	
	}
	?>
</h4>