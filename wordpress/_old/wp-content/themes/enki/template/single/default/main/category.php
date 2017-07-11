<?php if( has_category() ): ?>
	<div class="kopa-entry-post">
		<div class="entry-categories">			
			<span><?php esc_html_e( 'Categories:', 'enki' ); ?></span>
			<?php the_category( ', ' ); ?>
		</div>
	</div>
<?php
endif;