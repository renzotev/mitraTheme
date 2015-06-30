<?php

/*
 * Template name: Convocatorias CAS
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">

    <div class="container">
    	<?php 
    		//convocatorias-cas ID
    		$cas_id = 600;
    	?>

    	<?php if( have_rows('botones_principales', $cas_id) ): ?>
			<div class="gradient-buttons">
			<?php while( have_rows('botones_principales', $cas_id) ): the_row(); 
				
				$texto_boton = get_sub_field('texto_boton');
				$boton = get_sub_field('boton');

				?>

				<div class="col-sm-3">
					<a href="<?php echo $boton; ?>" class="gBtn">
						<span><?php echo $texto_boton; ?></span>
					</a>
				</div>

			<?php endwhile; ?>

			</div>

		<?php endif; ?>


		<?php if ( have_rows('secciones') ) : ?>
			<?php while (have_rows('secciones') ) : the_row(); ?>		
				
				<?php if( get_row_layout() == 'cuadro_rojo' ): 
					$titulo = get_sub_field('titulo');
					$contenido_cuadro = get_sub_field('contenido_cuadro');
				?>
					<dd><a href="<?php echo $archivo['url'] ?>" target="_blank"><?php echo $texto; ?></a></dd>

					<h5><?php echo $titulo; ?></h5>

					<div class="large-alert">
						<?php echo $contenido_cuadro; ?>
					</div>

				<?php elseif( get_row_layout() == 'cuadro_blanco' ): 
					$contenido_cuadro = get_sub_field('contenido_cuadro');
					$activar_boton = get_sub_field('activar_boton');
					$texto_boton = get_sub_field('texto_boton');
					$archivo_boton = get_sub_field('archivo_boton');
				?>

					<div class="message-white">
						<?php echo $contenido_cuadro; ?>

						<?php if ( $activar_boton ) : ?>
							<div class="alert-message button">
					        	<a href="<?php echo $archivo_boton['url']; ?>" target="_blank"><?php echo $texto_boton; ?></a>
					        </div>
				        <?php endif; ?>
					</div>

				<?php elseif( get_row_layout() == 'otros_contenidos' ): 
					$contenido_cuadro = get_sub_field('contenido');
				
					echo $contenido_cuadro;
				endif; ?>
				
			<?php endwhile; ?>
		<?php endif; ?>

		<?php if( get_field( "activar_tabla") ): 
			$columas_tabla = get_field('columas_tabla');
		?>

			<div class="table-multiCols-wrapper">
				<table class="table-responsive table-multiCols">
				<?php if( have_rows('header') ): ?>
					<thead>
						<tr>
						<?php while( have_rows('header') ): the_row(); 
							
							$titulo = get_sub_field('titulo');
							$titulo_2 = get_sub_field('titulo_2');
							if ($columas_tabla == "cinco") { $titulo_3 = get_sub_field('titulo_3'); }
							$titulo_4 = get_sub_field('titulo_4');
							if ($columas_tabla == "cinco") { $titulo_5 = get_sub_field('titulo_5'); }

						?>

							<th><?php echo $titulo; ?></th>
							<th><?php echo $titulo_2; ?></th>
							<?php 
								if ($columas_tabla == "cinco") { echo '<th>'.$titulo_3.'</th>'; }
							?>
							<th><?php echo $titulo_4; ?></th>
							<?php 
								if ($columas_tabla == "cinco") { echo '<th>'.$titulo_5.'</th>'; }
							?>

						<?php endwhile; ?>
						</tr>
					</thead>

				<?php endif; ?>

				<?php if( have_rows('tabla_contenido') ): ?>

					<tbody>
						
						<?php while( have_rows('tabla_contenido') ): the_row(); 
							$num_rows = count(get_sub_field('texto'));
						
							$arr_1 = array();
							$arr_2 = array();
							if ($columas_tabla == "cinco") { $arr_3 = array(); }
							$archivo_2 = get_sub_field('archivo_2');
							if ($columas_tabla == "cinco") { $archivo_3 = get_sub_field('archivo_3'); }
						?>
						<tr>
							<?php 
								if( have_rows('texto') ): 
								 	while( have_rows('texto') ): the_row(); 
										$texto_11 = get_sub_field('texto_11');
									
										array_push($arr_1, $texto_11);
								 	endwhile; 
								 endif; 

								 if( have_rows('texto_2') ):
									while( have_rows('texto_2') ): the_row(); 
										$texto_22 = get_sub_field('texto_22');

										array_push($arr_2, $texto_22);
								 	endwhile;
								 endif; 

								 if( have_rows('archivos') && $columas_tabla == "cinco" ):
									while( have_rows('archivos') ): the_row(); 
										$archivo = get_sub_field('archivo');
									
										array_push($arr_3, $archivo);
									endwhile; 
								 endif; 
							 ?>

							<td><?php echo $arr_1[0]; ?></td>
							<td><?php echo $arr_2[0]; ?></td>
							<?php 
								if ($columas_tabla == "cinco") { 
									echo '<td><a href="'.$arr_3[0]['url'].'" target="_blank" class="pdf-link-large"></a></td>';
								} 
							?>
							<td rowspan="<?php echo $num_rows; ?>"><?php echo '<a href="'.$archivo_2['url'].'" target="_blank" class="pdf-link-large"></a>'; ?></td>

							<?php if($columas_tabla == "cinco"): ?>
								<td rowspan="<?php echo $num_rows; ?>"><?php echo '<a href="'.$archivo_3['url'].'" target="_blank" class="pdf-link-large"></a>'; ?></td>
							<?php endif; ?>
						</tr>
						
						<?php 
							for ($i=1; $i < $num_rows; $i++) { 
								echo "<tr>";
									echo "<td>".$arr_1[$i]."</td>";
									echo "<td>".$arr_2[$i]."</td>";

									if ($columas_tabla == "cinco") { 
										echo '<td><a href="'.$arr_3[$i]['url'].'" target="_blank" class="pdf-link-large"></a></td>';
									}
								echo "</tr>";
							}
						?>
						<?php endwhile; ?>
						
					</tbody>

				<?php endif; ?>
				</table>
			</div>

    	<?php endif; ?>
	
    </div>
</div>

<?php get_footer(); ?>