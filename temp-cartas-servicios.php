<?php

/*
 * Template name: Cartas servicios
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">
    <div class="container">
    	<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php if( get_field( 'texto_boton') && get_field( 'archivo')):

			$texto_boton = get_field('texto_boton');
			$archivo = get_field('archivo');
	 	?>
	 		<a href="<?php echo $archivo['url']; ?>" class="button-pdf" target="_blank"><?php echo $texto_boton; ?></a>
	 	<?php endif; ?>

		<?php 
		    $args = array(
		        'post_type'        => 'cartas-servicios',
		        'posts_per_page'   => 5
		    );

		    $the_query = new WP_Query( $args );  
		?>

		<?php if ( $the_query->have_posts() ) : ?>
			<ul class="certified-letters">

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<li>
						<?php if (get_field('pdf')) { $pdf = get_field('pdf'); } ?>
						<?php if ( has_post_thumbnail() ) : 
							$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "cartasServiciosArchive");
						?>
							<a href="<?php echo $pdf['url']; ?>" class="letter-img" target="_blank">
								<img src="<?php echo $src[0] ?>">
							</a>
						<?php endif; ?>
						
						<div class="content-letter">
							<h3><?php the_title(); ?></h3>
							<?php
								$estado = get_field('estado');

								if ( $estado != 'NINGUNO') { 
									echo '<a class="certified" href="'.$pdf['url'].'" target="_blank">'.$estado.'</a>';
								} 
							?>
							
							<?php the_field('contenido'); ?>

							<a href="<?php the_permalink(); ?>"><?php the_field('texto_contenido'); ?></a>
						</div>
					</li>

                <?php endwhile; ?>

		        <?php wp_reset_postdata(); ?>
			</ul>

		<?php endif; ?>

		<?php get_template_part( 'paginations' ); ?>
    </div>
</div>

<?php get_footer(); ?>