<?php get_header();?>
<div id="content" >
	<div class="page news full">
		<div class="container">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="block">
				<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &rsaquo; '); ?>
				<h1><?php the_title(); ?></h1>
				<div class="text">
					<?php the_content('<p class="serif">' . __('Read the rest of this entry &raquo;', 'kubrick') . '</p>'); ?>
				</div>
			</div>
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>