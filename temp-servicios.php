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

        <?php if( have_rows('servicios_virtuales') ):

			$titulo_2 = get_field('titulo_2');
	 	?>

	        <table class="table-responsive table-downloads">
	        	<thead>
	        		<tr>
		        		<th colspan="2"><?php echo $titulo_2; ?></th>
		        	</tr>
	        	</thead>

				<tbody>
					<?php while( have_rows('servicios_virtuales') ): the_row(); ?>
		            	<tr>
		            		<td><?php the_sub_field( "texto" ); ?></td>
			                <?php if( have_rows('archivo_o_enlace') ): ?>
			                	<td>
			                        <?php while( have_rows('archivo_o_enlace') ): the_row(); 

			                        	$tipo = get_sub_field('tipo');
			                        	$archivo = get_sub_field('archivo');
			                        	$enlace = get_sub_field('enlace');
			                        	$archivoClass = "explorer";
			                        	$excelExts = array("xla","xlam","xls","xlsb","xlsm","xlsx","xlt","xltm","xltx","xlw","xml"); 

			                        	if ($tipo == 'archivo') {
			                        		$ext = pathinfo($archivo['url'], PATHINFO_EXTENSION);
			                        		
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
			                <?php endif; ?>
		            	</tr>
		            <?php endwhile; ?>
	            </tbody>
	        </table>

        <?php endif; ?>



        <?php if( have_rows('informacion') ):

			$titulo_3 = get_field('titulo_3');
	 	?>

	        <table class="table-responsive table-downloads two-cols">
	        	<thead>
	        		<tr>
		        		<th colspan="2"><?php echo $titulo_3; ?></th>
		        	</tr>
	        	</thead>

				<tbody>
					<?php while( have_rows('informacion') ): the_row(); ?>
		            	<tr>
		            		<td><?php the_sub_field( "texto" ); ?></td>
			                <?php if( have_rows('archivo_o_enlace') ): ?>
			                	<td>
			                        <?php while( have_rows('archivo_o_enlace') ): the_row(); 

			                        	$tipo = get_sub_field('tipo');
			                        	$archivo = get_sub_field('archivo');
			                        	$enlace = get_sub_field('enlace');
			                        	$archivoClass = "explorer";
			                        	$excelExts = array("xla","xlam","xls","xlsb","xlsm","xlsx","xlt","xltm","xltx","xlw","xml"); 

			                        	if ($tipo == 'archivo') {
			                        		$ext = pathinfo($archivo['url'], PATHINFO_EXTENSION);
			                        		
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
			                <?php endif; ?>
		            	</tr>
		            <?php endwhile; ?>
	            </tbody>
	        </table>

        <?php endif; ?>

        <table class="table-responsive table-downloads two-cols">
        	<thead>
	        	<tr>
	        		<th colspan="2">Información</th>
	        	</tr>
        	</thead>

        	<tbody>
        		<tr>
        			<th colspan="2">Para Trabajadores</th>
        		</tr>
	    		<tr>
	    			<td>
	    				<table class="table-responsive table-downloads">
	    					<tr>
				    			<td>Beneficios de la Nueva Ley Procesal del Trabajo</td>
				    			<td>
				    				<a href="#" target="_blank" class="pdf-link-icon"></a>
				    			</td>
				    		</tr>
	    				</table>
	    			</td>
	    			<td>
	    				<table class="table-responsive table-downloads">
	    					<tr>
				    			<td>La Convención Colectiva</td>
				    			<td>
				    				<a href="#" target="_blank" class="pdf-link-icon"></a>
				    			</td>
				    		</tr>
	    				</table>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<table class="table-responsive table-downloads">
	    					<tr>
				    			<td>Beneficios de la Nueva Ley Procesal del Trabajo</td>
				    			<td>
				    				<a href="#" target="_blank" class="pdf-link-icon"></a>
				    			</td>
				    		</tr>
	    				</table>
	    			</td>
	    			<td>
	    				<table class="table-responsive table-downloads">
	    					<tr>
				    			<td>La Convención Colectiva</td>
				    			<td>
				    				<a href="#" target="_blank" class="pdf-link-icon"></a>
				    			</td>
				    		</tr>
	    				</table>
	    			</td>
	    		</tr>
	    		<tr>
        			<th colspan="2">Para Empresas</th>
        		</tr>
	    		<tr>
	    			<td>
	    				<table class="table-responsive table-downloads">
	    					<tr>
				    			<td>Beneficios de la Nueva Ley Procesal del Trabajo</td>
				    			<td>
				    				<a href="#" target="_blank" class="pdf-link-icon"></a>
				    			</td>
				    		</tr>
	    				</table>
	    			</td>
	    			<td>
	    				<table class="table-responsive table-downloads">
	    					<tr>
				    			<td>La Convención Colectiva</td>
				    			<td>
				    				<a href="#" target="_blank" class="pdf-link-icon"></a>
				    			</td>
				    		</tr>
	    				</table>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<table class="table-responsive table-downloads">
	    					<tr>
				    			<td>Beneficios de la Nueva Ley Procesal del Trabajo</td>
				    			<td>
				    				<a href="#" target="_blank" class="pdf-link-icon"></a>
				    			</td>
				    		</tr>
	    				</table>
	    			</td>
	    			<td>
	    				<table class="table-responsive table-downloads">
	    					<tr>
				    			<td>La Convención Colectiva</td>
				    			<td>
				    				<a href="#" target="_blank" class="pdf-link-icon"></a>
				    			</td>
				    		</tr>
	    				</table>
	    			</td>
	    		</tr>
    		</tbody>
        </table>
    </div>
</div>

<?php get_footer(); ?>