<?php

/*
 * Template name: Formatos tupa
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

    	<?php if( have_rows('enlaces') ): ?>
			<ul style="list-style:none">
			<?php while( have_rows('enlaces') ): the_row(); 
				$texto = get_sub_field('texto');
				$archivoClass = "pdf";
				$excelExts = array("xla","xlam","xls","xlsb","xlsm","xlsx","xlt","xltm","xltx","xlw","xml");
				$wordExts = array("docx","docm","dotx","dotm","doc","dot");
				$ext = strtolower(pathinfo($archivo['url'], PATHINFO_EXTENSION));

				?>

				<li>
					<?php echo $texto; ?>

					<?php if( have_rows('archivos') ): ?>
						<?php while (have_rows('archivos') ) : the_row(); 
							$archivo = get_sub_field('archivo');
							$archivoClass = "pdf";
							$excelExts = array("xla","xlam","xls","xlsb","xlsm","xlsx","xlt","xltm","xltx","xlw","xml");
							$wordExts = array("docx","docm","dotx","dotm","doc","dot");
							$ext = strtolower(pathinfo($archivo['url'], PATHINFO_EXTENSION));

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

							echo '<a href="'.$archivo['url'].'" target="_blank" class="'.$archivoClass.'-link-icon"></a>';

						endwhile; ?>
					<?php endif; ?>
				</li>

			<?php endwhile; ?>

			</ul>

		<?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>