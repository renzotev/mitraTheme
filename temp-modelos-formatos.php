<?php

/*
 * Template name: Modelos y formatos
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">

    <div class="container">
    	<?php if ( have_rows('secciones') ) : ?>
			<?php while (have_rows('secciones') ) : the_row(); ?>		
				
				<?php if( get_row_layout() == 'titulo' ): 
					$titulo = get_sub_field('titulo');
				?>
					
					<h4 style="margin-top:30px"><?php echo $titulo; ?></h4>

				<?php elseif( get_row_layout() == 'contenido_personalizado' ): 
					$contenido = get_sub_field('contenido');
				?>

					<?php echo $contenido; ?>

				<?php elseif( get_row_layout() == 'archivos' && have_rows('enlaces') ): ?>
					<ul>
						<?php while( have_rows('enlaces') ): the_row(); 
							$texto = get_sub_field('texto');
							$incluir_icono = get_sub_field('incluir_icono');
						?>
							<li>

							<?php if ( have_rows('archivos2') ) : 
								$count = 0;
								$current = 0;
							?>
								<?php 
									while (have_rows('archivos2') ) : the_row(); 
										$count++;
									endwhile; 
								?> 

								<?php while (have_rows('archivos2') ) : the_row(); 
									$archivo = get_sub_field('archivo');
									$archivoClass = "pdf";
									$excelExts = array("xla","xlam","xls","xlsb","xlsm","xlsx","xlt","xltm","xltx","xlw","xml");
									$wordExts = array("docx","docm","dotx","dotm","doc","dot");
									$ext = strtolower(pathinfo($archivo['url'], PATHINFO_EXTENSION));
								?>

									<?php
										if ($count == 1 && $incluir_icono == false) {
											echo '<a href="'.$archivo['url'].'" target="_blank" style="color:#4d4d4d">'.$texto.'</a>';
										} else if ($count > 1 || $incluir_icono) {

			                        		foreach ($excelExts as $val) {
											    if ($val == $ext) {
											    	$archivoClass = "excel";
											    	break;
												}
											}

											foreach ($wordExts as $val) {
											    if ($val == $ext) {
											    	$archivoClass = "word";
											    	break;
												}
											}

											if ($current == 0) {
												echo $texto.' - ';
											}

											echo '<a href="'.$archivo['url'].'" target="_blank" class="'.$archivoClass.'-link-icon"></a>';

											$current++;
										}
									?>

								<?php endwhile; ?>
							<?php endif; ?>
							</li>

						<?php endwhile; ?>
					</ul>

				<?php endif; ?>
				
			<?php endwhile; ?>
		<?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>