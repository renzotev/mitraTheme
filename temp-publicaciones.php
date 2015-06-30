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
                    <ul class="default-list-items">
                        <?php while( have_rows('arvhivos') ): the_row(); 

                            $texto = get_sub_field('texto');
                            $archivo = get_sub_field('archivo');
                            $agregar_fecha = get_sub_field('agregar_fecha');
                            $fecha = get_sub_field('fecha');
                            $fecha = ($fecha != '') ? DateTime::createFromFormat('Ymd', $fecha) : 0;

                        ?>
                            <li>
                                <p>
                                    <a href="<?php echo $archivo['url']; ?>" target="_blank"><?php echo $texto; ?></a><br />
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


        <?php if( get_field( "titulo" ) ):

            $titulo = get_field('titulo');
        ?>

            <h3 style="font-size:16px"><?php echo $titulo; ?></h3>
        <?php endif; ?>

        <div class="clearfix"></div>

        <div class="revistasPublicaciones">
            <?php if( have_rows('revistas') ): 
                $counter = 1;
            ?>
                <?php while( have_rows('revistas') ): the_row(); 
                    
                    $imagen = get_sub_field('imagen');
                    $archivo = get_sub_field('archivo');
                    $offsetClass = (($counter-1) % 5 == 0 || $counter == 1) ? "col-xs-4 col-sm-2 col-sm-offset-1" : "col-xs-4 col-sm-2";

                    ?>

                    <a class="<?php echo $offsetClass; ?>" href="<?php echo $archivo['url']; ?>" target="_blank">
                        <img src="<?php echo $imagen['url']; ?>" title="<?php echo $imagen['title']; ?>" alt="<?php echo $imagen['alt']; ?>" class="img-responsive">
                    </a>

                    <?php
                        if ($counter % 3 == 0) {
                            echo '<div class="clearfix visible-xs-block"></div>';
                        }
                        if ($counter % 5 == 0) {
                            echo '<div class="clearfix hidden"></div>';
                        }
                        $counter++;
                    ?>

                <?php endwhile;?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>