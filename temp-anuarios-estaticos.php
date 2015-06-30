<?php

/*
 * Template name: Anuarios Estaticos
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if ( have_rows('anuarios') ) : 
            $counter = 1;
        ?>
            <div class="revistasPublicaciones boletines">
                <?php while( have_rows('anuarios') ): the_row(); 
                        
                    $titulo = get_sub_field('titulo');
                    $imagen = get_sub_field('imagen');
                    $offsetClass = (($counter - 1) % 5 == 0 || $counter == 1) ? "col-xs-4 col-sm-2 col-sm-offset-1" : "col-xs-4 col-sm-2";
                ?>

                    <div class="<?php echo $offsetClass; ?> item" style="text-align:center">
                        <img src="<?php echo $imagen['url']; ?>" title="<?php echo $imagen['title']; ?>" alt="<?php echo $imagen['alt']; ?>">
                        <div style="color:#FF0000; margin:5px 0"><?php echo $titulo; ?></div>

                        <?php if ( have_rows('archivos') ) : ?>
                            <div>
                                <?php while( have_rows('archivos') ): the_row(); 
                                
                                    $archivo = get_sub_field('archivo');
                                    $archivoClass = "pdf";
                                    $excelExts = array("xla","xlam","xls","xlsb","xlsm","xlsx","xlt","xltm","xltx","xlw","xml");
                                    $ext = strtolower(pathinfo($archivo['url'], PATHINFO_EXTENSION));

                                    foreach ($excelExts as $val) {
                                        if ($val == $ext) {
                                            $archivoClass = "excel";
                                            break;
                                        }
                                    }

                                    echo '<a href="'.$archivo['url'].'" target="_blank" class="'.$archivoClass.'-link-icon"></a>';
                                ?>
                                    
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php
                        if ($counter % 3 == 0) {
                            echo '<div class="clearfix visible-xs-block"></div>';
                        }
                        if ($counter % 5 == 0) {
                            echo '<div class="clearfix hidden"></div>';
                        }
                        $counter++;
                    ?>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>