<?php get_header(); ?>

	<?php get_template_part( 'breadcrumbs' ); ?>

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
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<span>Publicado el: <?php echo get_the_date( 'd/m/Y' ); ?></span>
								<p><?php echo wp_trim_excerpt(); ?></p>

								<div class="share-icons pull-left">
					            	Compartir: <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
					            </div>

					            <a class="see-more pull-right" href="<?php the_permalink(); ?>">Leer más</a>
							</div>
						</li>

					<?php endwhile; ?>

				</ul>

			  	<?php get_template_part( 'paginations' ); ?>

			<?php endif; ?>

	    </div>
	</div>

<?php get_footer(); ?>