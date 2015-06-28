<?php

/*
 * Template name: Boletines
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">

    <div class="container">
    	<?php if( get_field( "titulo") ):

			$titulo = get_field('titulo');
		 ?>
			<h3 style="font-size:18px; margin-bottom:40px"><?php echo $titulo; ?></h3>
		<?php endif; ?>

    	<?php if ( have_rows('archivos') ) : ?>
			<?php while (have_rows('archivos') ) : the_row(); ?>		
				
				<?php if( get_row_layout() == 'archivos' && have_rows('archivos_links') ): 
					$counter = 1;
				?>
					<div class="revistasPublicaciones boletines">
						<?php while( have_rows('archivos_links') ): the_row(); 
								
							$texto = get_sub_field('texto');
							$titulo_archivo = get_sub_field('titulo_archivo');
							$imagen_archivo = get_sub_field('imagen_archivo');
							$enlace_archivo = get_sub_field('enlace_archivo');

						?>

							<a class="col-xs-6 col-sm-3" href="<?php echo $enlace_archivo; ?>" target="_blank" title="<?php echo $imagen_archivo['title']; ?>" alt="<?php echo $imagen_archivo['alt']; ?>">
								<strong><?php echo $texto; ?></strong>
								<span><?php echo $titulo_archivo; ?></span>
								<div class="image-background" style="background-image:url('<?php echo $imagen_archivo['url']; ?>')"></div>
				            </a>

				            <?php
		                        if ($counter % 2 == 0) {
		                            echo '<div class="clearfix visible-xs-block"></div>';
		                        }
		                        if ($counter % 4 == 0) {
		                            echo '<div class="clearfix hidden"></div>';
		                        }
		                        $counter++;
		                    ?>

						<?php endwhile; ?>
					</div>

				<?php elseif( get_row_layout() == 'anio' ): 
					$anio = get_sub_field('anio');
				?>

					<div class="year"><?php echo $anio ?></div>

				<?php endif; ?>
				
			<?php endwhile; ?>
		<?php endif; ?>

    
    </div>
</div>

<?php get_footer(); ?>