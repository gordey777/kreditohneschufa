<?php if( get_next_posts_link() ): ?>
	<div id="enki_button_more" class="row">
		<div class="col-md-4 col-sm-6 col-xs-12 col-md-push-4 col-sm-push-3">
		    <div class="enki-loadmore style-01">
		    	<?php next_posts_link(false); ?>
		        <i class="fa fa-refresh"></i>
		        <span><?php esc_html_e( 'Load more posts', 'enki' ); ?></span>
		    </div>	    
		</div>
	</div>
<?php endif; ?>