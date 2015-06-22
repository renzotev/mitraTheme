<div class="pagination-posts">
	<ul>
		<li class="prev"><?php echo get_previous_posts_link( '&laquo;' ); ?></li>
		<?php 
		  	if (function_exists("pagination")) {
			    pagination($additional_loop->max_num_pages);
			} 
	  	?>
		<li class="next"><?php echo get_next_posts_link( '&raquo;' ); ?></li>
		
	</ul>
</div>