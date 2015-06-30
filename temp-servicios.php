<?php

/*
 * Template name: Servicios
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">
    <div class="container">
    	<?php if( get_field( "titulo_1" ) ):

			$titulo_1 = get_field('titulo_1');
	 	?>
	 		<div class="large-alert" style="padding:14px; font-size: 16px"><?php echo $titulo_1; ?></div>
		<?php endif; ?>

        <?php if( have_rows('columna') ): ?>
            <?php while( have_rows('columna') ): the_row(); 
                
                $imagen = get_sub_field('imagen');

            ?>
            	<div class="col-sm-6">
            		<div class="logo-services"><img src="<?php echo $imagen['url']; ?>" class="img-responsive"></div>

	                <?php if( have_rows('registros') ): ?>
	                	<dl class="list-links-years">
	                		<dt>Registros</dt>
	                		<dd>
	                			<ul class="list-checks">
			                        <?php while( have_rows('registros') ): the_row(); 

			                        	$texto = get_sub_field('texto');
			                        	$enlace = get_sub_field('enlace');
			                        ?>
										<li><a href="<?php echo $enlace; ?>"><?php echo $texto; ?></a></li>
			                        <?php endwhile; ?>
	                        	</ul>
	                        </dd>
	                    </dl>
	                <?php endif; ?>
            	</div>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="clearfix"></div>

        <?php if( have_rows('columna') ): ?>
            <?php while( have_rows('columna') ): the_row(); ?>
            	<div class="col-sm-6">
	                <?php if( have_rows('asesorias') ): ?>
	                	<dl class="list-links-years">
	                		<dt>Asesorías</dt>
	                		<dd>
	                			<ul class="list-checks">
			                        <?php while( have_rows('asesorias') ): the_row(); 

			                        	$texto = get_sub_field('texto');
			                        	$enlace = get_sub_field('enlace');
			                        ?>
										<li><a href="<?php echo $enlace; ?>"><?php echo $texto; ?></a></li>
			                        <?php endwhile; ?>
	                        	</ul>
	                        </dd>
	                    </dl>
	                <?php endif; ?>
            	</div>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="clearfix"></div>
        	
    	<?php if( get_field( "mensaje" ) ):

			$mensaje = get_field('mensaje');
	 	?>
	 		<div class="alert-message">
				<span><?php echo $mensaje; ?></span>
			</div>
		<?php endif; ?>
        

        <div class="clearfix"></div>

		<?php 
			$dataContainer = array('servicios_virtuales', 'informacion', 'consultas_laborales');
			$sectionTitle = array('titulo_2', 'titulo_3', 'titulo_4');
			$tableType = array('tipo_de_tabla_2', 'tipo_de_tabla_3', 'tipo_de_tabla_4');
		?>

		<?php for ($i = 0; $i < count($dataContainer); $i++): ?>
			

        <?php if( have_rows($dataContainer[$i]) ):

			$titulo = get_field($sectionTitle[$i]);
			$counter = 1;
			$tipo_de_tabla = get_field($tableType[$i]);
			$rLength = count( get_field($dataContainer[$i]) );
			$tableClass = ($tipo_de_tabla == 'una' ? '' : 'two-cols');
	 	?>
			
	        <table class="table-responsive table-downloads <?php echo $tableClass; ?>" id="<?php echo $dataContainer[$i]; ?>">
	        	<thead>
	        		<tr>
		        		<th colspan="2"><?php echo $titulo; ?></th>
		        	</tr>
	        	</thead>

				<tbody>
					<?php while( have_rows($dataContainer[$i]) ): the_row(); 

							$tipo_de_fila = get_sub_field('tipo_de_fila');
							$texto = get_sub_field('texto');
							$subtitulo = get_sub_field('subtitulo');
							
						?>

						<?php if($tipo_de_fila == "subseccion"): 
							$rLength--;
						?>
							<tr>
			        			<th colspan="2"><?php echo $subtitulo; ?></th>
			        		</tr>
						<?php else: ?>
			            	
			            	<?php 
			            		if ($tipo_de_tabla == 'una') {
			            			echo "<tr>";
			            		} else {
				            		if($counter == 0 || $counter % 2 != 0) {
				            			/* OPEN ROW */
				            			echo "<tr>";
				            		}
			            		}
			            	?>

			                <?php if( have_rows('archivo_o_enlace') ): ?>
			                	<?php if($tipo_de_tabla != 'una'): ?>
			                	<td>
			                		<table class="table-responsive table-downloads">
			                			<tr>
			                	<?php endif; ?>
			                				<td><?php echo $texto; ?></td>
			                				<td>
						                        <?php while( have_rows('archivo_o_enlace') ): the_row(); 
						                        	$tipo = get_sub_field('tipo');
						                        	$archivo = get_sub_field('archivo');
						                        	$enlace = get_sub_field('enlace');
						                        	$archivoClass = "explorer";
						                        	$excelExts = array("xla","xlam","xls","xlsb","xlsm","xlsx","xlt","xltm","xltx","xlw","xml"); 

						                        	if ($tipo == 'archivo') {
						                        		$ext = strtolower(pathinfo($archivo['url'], PATHINFO_EXTENSION));
						                        		
						                        		foreach ($excelExts as $val) {
														    if ($val == $ext) {
														    	$archivoClass = "excel";
														    	break;
															}
														}

														if ($archivoClass != "excel" && $ext == "pdf") {
															$archivoClass = "pdf";
														}
						                        	} else {
						                        		$archivoClass = "explorer";
						                        	}
						                        	
						                        ?>
													<a target="_blank" href="<?php echo $archivo['url']; ?>" class="<?php echo $archivoClass; ?>-link-icon"></a>
						                        <?php endwhile; ?>
				                        	</td>
				                <?php if($tipo_de_tabla != 'una'): ?>
				                        </tr>
			                        </table>
			                    </td>
			                    <?php endif; ?>
			                <?php endif; ?>

			            	<?php
			            		if ($tipo_de_tabla == 'una') {
			            			echo "<tr>";
			            		} else {
				            		if(($counter % 2 == 0 && $counter != 0) || $counter == $rLength) {
			            				/*CLOSE ROW*/
			            				echo "</tr>";
			            			}
			            		}
			            		$counter ++;
			            	?>
			            	
		            	<?php endif; ?>
		            <?php endwhile; ?>
		            		
	            </tbody>
	        </table>

        <?php endif; ?>

        <?php endfor; ?>

    </div>
</div>

<?php get_footer(); ?>