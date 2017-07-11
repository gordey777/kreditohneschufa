<?php get_header(); ?>
<div id="content" class="narrowcolumn" role="main">
	<div class="page news">
		<div class="container">
			<?php if (have_posts()) : ?>
			<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &rsaquo; '); ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
			<h1 class="pagetitle"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'kubrick'), single_cat_title('', false)); ?></h1>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h1 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'kubrick'), single_tag_title('', false) ); ?></h1>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h1 class="pagetitle"><?php printf(_c('Archive for %s|Daily archive page', 'kubrick'), get_the_time(__('F jS, Y', 'kubrick'))); ?></h1>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1 class="pagetitle"><?php printf(_c('Archive for %s|Monthly archive page', 'kubrick'), get_the_time(__('F, Y', 'kubrick'))); ?></h1>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h1 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'kubrick'), get_the_time(__('Y', 'kubrick'))); ?></h1>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h1 class="pagetitle"><?php _e('Author Archive', 'kubrick'); ?></h1>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1 class="pagetitle"><?php _e('Blog Archives', 'kubrick'); ?></h1>
			<?php } ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="block">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
				<div class="date"><?php the_time(__('d.m.Y', 'kubrick')) ?></div>
				<div class="text short">

<img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" />

					<?php echo mb_substr( strip_tags( get_the_content() ), 0, 500 ); ?>...
				</div>
			</div>
			<?php endwhile; ?>
			<?php else :
				if ( is_category() ) { // If this is a category archive
					printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.", 'kubrick').'</h2>', single_cat_title('',false));
				} else if ( is_date() ) { // If this is a date archive
					echo('<h2>'.__("Sorry, but there aren't any posts with this date.", 'kubrick').'</h2>');
				} else if ( is_author() ) { // If this is a category archive
					$userdata = get_userdatabylogin(get_query_var('author_name'));
					printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.", 'kubrick')."</h2>", $userdata->display_name);
				} else {
					echo("<h2 class='center'>".__('No posts found.', 'kubrick').'</h2>');
				}
				 get_search_form();
				endif;
				?>

<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>