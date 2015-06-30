<?php

/*
 * Template name: Trámites (T.U.P.A.)
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">

    <div class="container">
    	<?php if( get_field( "texto_inicio") ):

			$texto_inicio = get_field('texto_inicio');
		 ?>
			<?php echo $texto_inicio; ?>
		<?php endif; ?>

		<?php if( get_field( "texto_franja") ):

			$texto_franja = get_field('texto_franja');
		 ?>
			<div class="alert-message-fullWidth"><?php echo $texto_franja; ?></div>
		<?php endif; ?>

    	<br/>

    	<?php if( have_rows('archivo') ): ?>
			<ol>
			<?php while( have_rows('archivo') ): the_row(); 
				
				$texto = get_sub_field('texto');
				$enlace = get_sub_field('enlace');

				?>

				<li>
					<a href="<?php echo $enlace; ?>" target="_blank" style="color:#4d4d4d">
						<?php echo $texto; ?>
					</a>
				</li>

			<?php endwhile; ?>

			</ol>

		<?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>