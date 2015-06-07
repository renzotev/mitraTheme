<?php get_header(); ?>

	<div class="breadcrumb-wrapper hidden">
	    <div class="container">
	        <ol class="breadcrumb">
	            <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
	            <li><a href="<?php echo get_post_type_archive_link( 'notas-de-prensa' ); ?>">Prensa</a></li>
	            <li><a href="<?php echo get_post_type_archive_link( 'notas-de-prensa' ); ?>">Notas de prensa</a></li>
	            <li class="active"><span><?php the_title(); ?></span></li>
	        </ol>
	    </div>
	</div>

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

	<script type="text/javascript">
		jQuery(".navPrensa").addClass("active");
	</script>


<?php get_footer(); ?>