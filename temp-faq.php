<?php

/*
 * Template name: FAQ
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">
    <div class="container">
        <?php if( have_rows('enlaces') ): ?>
            <ul class="list-checks">
                <?php while( have_rows('enlaces') ): the_row(); 
                    
                    $texto = get_sub_field('texto');
                    $enlace = get_sub_field('enlace');

                ?>
                    <li><a href="<?php echo $enlace; ?>"><?php echo $texto; ?></a></li>

                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

        <?php if( have_rows('lista_y_descarga') ): ?>
            <ul class="list-checks">
            	<li>
	                <?php while( have_rows('lista_y_descarga') ): the_row(); 
	                    
	                    $titulo = get_sub_field('titulo');
	                    $archivo = get_sub_field('archivo');

	                ?>
	                	<span class="header-faq"><?php echo $titulo; ?> <a href="<?php echo $archivo['url']; ?>" target="_blank" class="after"></a></span>

	                    <?php if( have_rows('lista') ): ?>
	                    	<ul>
		                        <?php while( have_rows('lista') ): the_row(); 

		                        	$punto = get_sub_field('punto');
		                        ?>
		                        	<li><?php echo $punto; ?></li>
		                        <?php endwhile; ?>
	                        </ul>
	                    <?php endif; ?>

	                <?php endwhile; ?>
                </li>
            </ul>
        <?php endif; ?>

        <p>Actualizado el: <?php the_modified_time('m-d-Y'); ?> <?php the_modified_time('g:i a'); ?></p>
        
    </div>
</div>

<?php get_footer(); ?>