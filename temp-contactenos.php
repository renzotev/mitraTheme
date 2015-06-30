<?php

/*
 * Template name: Contáctenos
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">

    <div class="container">

		<?php if ( have_rows('secciones') ) : 
			$flag = false;
		?>
			<?php while (have_rows('secciones') ) : the_row(); ?>		
				
				<?php if( get_row_layout() == 'titulo' ): 
					$titulo = get_sub_field('titulo');
					$marginFlag = ($flag == true) ? 'margin-top: 30px;' : '';
				?>
					<?php 
						echo '<h4 style="font-size: 16px; color: red; margin-bottom:10px; '.$marginFlag.'">'.$titulo.'</h4>';
						$flag = true;
					?>

				<?php elseif( get_row_layout() == 'contenido' ): 
					$contenido = get_sub_field('contenido');
				?>

					<?php echo $contenido ?>

				<?php elseif( get_row_layout() == 'contenido_dos_columnas' ): 
					$contenido_izquierda = get_sub_field('contenido_izquierda');
					$contenido_derecha = get_sub_field('contenido_derecha');
				?>
					<div class="row">
						<div class="col-sm-6"><?php echo $contenido_izquierda ?></div>
						<div class="col-sm-6"><?php echo $contenido_derecha ?></div>
					</div>

				<?php elseif( get_row_layout() == 'google_map' ): 
					$map = get_sub_field('map');

					if (!empty($map)) {
						echo '<div class="acf-map">';
						echo '<div class="marker" data-lat="'.$map['lat'].'" data-lng="'.$map['lng'].'"></div>';
						echo '</div>';
					}
				?>

				<?php endif; ?>
				
			<?php endwhile; ?>
		<?php endif; ?>
    </div>

</div>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/renderGoogleMap.js" type="text/javascript"></script>

<?php get_footer(); ?>