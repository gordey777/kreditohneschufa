<?php get_header(); ?>
<!-- Content -->
<div id="content">
	<!-- Slider -->
	


<?php dynamic_sidebar( 'home-slider' ); ?>
		

	<!-- Table -->
	<div class="table">
		<div class="container">
			<h2>Alle Kreditanbieter im Überblick</h2>


<div class="text">
<?php
  $id = 30;
  $post = get_post($id); 
  echo $post->post_content;
?>
</div>
</div>
	</div>
	<!-- List -->
	
<?php dynamic_sidebar( 'home-list' ); ?>
<?php dynamic_sidebar( 'home-text' ); ?>


	<!-- Home text -->
	
			

</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.js"></script>
<script>
	$(document).ready(function() {
	  $("#slider").owlCarousel({	
	  autoPlay: 5000,	
	  navigation : true,
	  slideSpeed : 300,
	  paginationSpeed : 400,
	  singleItem : true	
	  });
	});
</script>
<?php get_footer(); ?>