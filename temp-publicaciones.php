<?php

/*
 * Template name: Publicaciones
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">
    <div class="container">
        <?php if( have_rows('listas') ): ?>
            <?php while( have_rows('listas') ): the_row(); 
                
                $titulo = get_sub_field('titulo');

                ?>

                <h3 style="font-size: 16px"><?php echo $titulo; ?></h3>
                
                <?php if( have_rows('arvhivos') ): ?>
                    <ul style="list-style:none; margin-bottom: 40px">
                        <?php while( have_rows('arvhivos') ): the_row(); 

                            $texto = get_sub_field('texto');
                            $archivo = get_sub_field('archivo');
                            $agregar_fecha = get_sub_field('agregar_fecha');
                            $fecha = get_sub_field('fecha');
                            $fecha = ($fecha != '') ? DateTime::createFromFormat('Ymd', $fecha) : 0;

                        ?>
                            <li>
                                <p>
                                    <a href="<?php echo $archivo['url']; ?>" target="_blank" style="color:#333333"><?php echo $texto; ?></a><br />
                                    <?php 

                                        if ($agregar_fecha && $fecha != 0) {
                                            echo "<span>(Publicado el ".$fecha->format('d-m-Y').")</span>";
                                        }
                                    ?>
                                </p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>