<?php if( has_tag() ): ?>
	<div class="kopa-entry-post">
	    <div class="single-tag-box">
	        <?php the_tags('', ' ', ''); ?>
	    </div>
	</div>
<?php
endif;
