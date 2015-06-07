<?php get_header(); ?>

	<div class="breadcrumb-wrapper hidden">
	    <div class="container">
	        <ol class="breadcrumb">
	            <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
	            <li><a href="<?php echo get_post_type_archive_link( 'notas-de-prensa' ); ?>">Prensa</a></li>
	            <li class="active"><span><?php post_type_archive_title(); ?></span></li>
	        </ol>
	    </div>
	</div>

	<div class="general-content">
	    <div class="container">
	    	<?php if ( have_posts() ) : ?>

				<ul class="posts-list">

					<?php while ( have_posts() ) : the_post(); ?>

						<li>
							<a href="<?php the_permalink(); ?>" class="post-img">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'notaPrensaArchive' );
									} 
								?>
							</a>

							<div class="content-post">
								<h2><?php the_title(); ?></h2>
								<span><?php echo get_the_date( 'd/m/Y' ); ?></span>
								<p><?php echo wp_trim_excerpt(); ?></p>

								<div class="share-icons pull-left">
					            	Compartir: <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
					            </div>

					            <a class="see-more pull-right" href="<?php the_permalink(); ?>">Leer más</a>
							</div>
						</li>

					<?php endwhile; ?>

				</ul>

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

			<?php endif; ?>

	    </div>
	</div>

	<script type="text/javascript">
		jQuery(".navPrensa").addClass("active");
	</script>


<?php get_footer(); ?>