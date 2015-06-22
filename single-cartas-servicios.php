<?php get_header(); ?>

	<?php get_template_part( 'breadcrumbs' ); ?>

	<div class="general-content">
	    <div class="container">
	        <dl class="list-links-years">
				<?php if ( have_rows('archivos') ) : ?>
					<?php while (have_rows('archivos') ) : the_row(); ?>		
						
						<?php if( get_row_layout() == 'archivo' ): 
							$texto = get_sub_field('texto');
							$archivo = get_sub_field('archivo');
						?>
							<dd><a href="<?php echo $archivo['url'] ?>" target="_blank"><?php echo $texto ?></a></dd>

						<?php elseif( get_row_layout() == 'anio' ): 
							$anio = get_sub_field('anio');
						?>

							<dt><?php echo $anio ?></dt>

						<?php endif; ?>
						
					<?php endwhile; ?>
				<?php endif; ?>
			</dl>

	    </div>
	</div>

<?php get_footer(); ?>