<?php get_header(); ?>

	<?php get_template_part( 'breadcrumbs' ); ?>

	<div class="general-content">
	    <div class="container">
	        <div class="post-page">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>		
						<figure class="main-image">
			                <?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'notaPrensaLarge', array( 'class' => 'img-responsive' ) );
								} 
							?>
			                <figcaption>
			                    <h1 class="title-post"><?php the_title(); ?></h1>
			                    <?php if( get_field( "subtitulo") ):

									$text = get_field('subtitulo');
							 	?>

									<span class="sub-title"><?php echo $text; ?></span>
								<?php endif; ?>
			                    <span class="published">:: Publicado el <?php echo get_the_date( 'd/m/Y' ); ?></span>
			                </figcaption>
			            </figure>

			            <div class="share-icons pull-right">
			            	Compartir: <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
			            </div>

			            <div class="clearfix"></div>

			            <?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>

			</div>
	    </div>
	</div>

<?php get_footer(); ?>