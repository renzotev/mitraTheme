<?php

/*
 * Template name: Inicio
 */

get_header();

?>

<?php if( have_rows('botones_con_icono') ): ?>
    <div class="triangle-buttons">
        <div class="container">
            <?php $flag = false; $LRclass = ''; ?>
            <?php while( have_rows('botones_con_icono') ): the_row(); 
                
                $imagen = get_sub_field('icono');
                $url = get_sub_field('url');
                $text = get_sub_field('texto');
                $flag = !$flag;
                $LRclass = ($flag) ? "b-left" : "b-right";
            ?>

                <a href="<?php echo $url; ?>" class="col-xs-6 col-sm-3" target="_blank">
                    <div class="bt-bg <?php echo $LRclass; ?>">
                        <div class="after" style="background-image:url(<?php echo $imagen['url']; ?>)"></div>
                        <?php echo $text; ?>
                    </div>
                </a>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>


<?php if( have_rows('servicios') ): ?>
    <div class="image-buttons">
        <div class="container">
            <?php while( have_rows('servicios') ): the_row(); 
                
                $imagen = get_sub_field('imagen');
                $url = get_sub_field('url');
                $text = get_sub_field('texto');

            ?>

                <a href="<?php echo $url; ?>" class="col-sm-6" target="_blank">
                    <figure>
                        <img src="<?php echo $imagen['url']; ?>" class="img-responsive hidden">
                        <figcaption>
                            <span><?php echo $text; ?></span>
                        </figcaption>
                    </figure>
                </a>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<div class="tabs-section">
    <div class="container">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <?php if( have_rows('tab_1') ): ?>
                    <li role="presentation" class="active">
                        <?php while( have_rows('tab_1') ): the_row();
                             
                            $titulo_tab = get_sub_field('titulo_tab');
                        ?>
                            <a href="#tab-programas" aria-controls="tab-programas" role="tab" data-toggle="tab"><span><?php echo $titulo_tab; ?></span></a>
                        <?php endwhile; ?>
                    </li>
                <?php endif; ?>

                <?php if( have_rows('tab_2') ): ?>
                    <li role="presentation">
                        <?php while( have_rows('tab_2') ): the_row();
                             
                            $titulo_tab = get_sub_field('titulo_tab');
                        ?>
                            <a href="#tab-consejos" aria-controls="tab-consejos" role="tab" data-toggle="tab"><span><?php echo $titulo_tab; ?></span></a>
                        <?php endwhile; ?>
                    </li>
                <?php endif; ?>

                <?php if( have_rows('tab_3') ): ?>
                    <li role="presentation">
                        <?php while( have_rows('tab_3') ): the_row();
                             
                            $titulo_tab = get_sub_field('titulo_tab');
                        ?>
                            <a href="#tab-consultas" aria-controls="tab-consultas" role="tab" data-toggle="tab"><span><?php echo $titulo_tab; ?></span></a>
                        <?php endwhile; ?>
                    </li>
                <?php endif; ?>

                <?php if( have_rows('tab_4') ): ?>
                    <li role="presentation">
                        <?php while( have_rows('tab_4') ): the_row();
                             
                            $titulo_tab = get_sub_field('titulo_tab');
                        ?>
                            <a href="#tab-seguridad" aria-controls="tab-seguridad" role="tab" data-toggle="tab"><span><?php echo $titulo_tab; ?></span></a>
                        <?php endwhile; ?>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="tab-content">

                <?php if( have_rows('tab_1') ): ?>
                    <div role="tabpanel" class="tab-pane active" id="tab-programas">
                        <?php while( have_rows('tab_1') ): the_row(); 
                            $counter_tab1 = 1;
                        ?>
                             <?php if( have_rows('contenido') ): ?>
                                <?php while( have_rows('contenido') ): the_row(); 

                                    $titulo_boton = get_sub_field('titulo_boton');
                                    $descripcion = get_sub_field('descripcion');
                                    $icono = get_sub_field('icono');
                                    $url = get_sub_field('url');
                                ?>
                                    <div class="col-sm-6">
                                        <a href="<?php echo $url; ?>" class="button-icon-text btn-4">
                                            <div class="before" style="background-image: url(<?php echo $icono['url']; ?>)"></div>
                                            <span class="title-btn"><?php echo $titulo_boton; ?></span>
                                            <span class="text-btn"><?php echo $descripcion; ?></span>
                                        </a>
                                    </div>

                                    <?php
                                        if ($counter_tab1 % 2 == 0) {
                                            echo '<div class="clearfix"></div>';
                                        }
                                        $counter_tab1++;
                                    ?>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php if( have_rows('tab_2') ): ?>
                    <div role="tabpanel" class="tab-pane" id="tab-consejos">
                        <?php while( have_rows('tab_2') ): the_row(); 
                            $counter_tab2 = 1;
                        ?>
                             <?php if( have_rows('contenido') ): ?>
                                <?php while( have_rows('contenido') ): the_row(); 

                                    $imagen = get_sub_field('imagen');
                                    $url = get_sub_field('url');
                                ?>
                                    <a class="col-sm-3 img-consejo" style="display:block" href="<?php echo $url; ?>" target="_blank">
                                        <img src="<?php echo $imagen['url']; ?>" class="img-responsive">
                                    </a>

                                    <?php
                                        if ($counter_tab2 % 4 == 0) {
                                            echo '<div class="clearfix"></div>';
                                        }
                                        $counter_tab2++;
                                    ?>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php if( have_rows('tab_3') ): ?>
                    <div role="tabpanel" class="tab-pane" id="tab-consultas">
                        <?php while( have_rows('tab_3') ): the_row(); 
                            $contenido_derecha = get_sub_field('contenido_derecha');
                            $contenido_izquierda = get_sub_field('contenido_izquierda');
                        ?>

                            <div class="col-sm-6">
                                <?php echo $contenido_derecha; ?>
                            </div>

                            <div class="col-sm-6">
                                <?php echo $contenido_izquierda; ?>
                            </div>
                             

                        <?php endwhile; ?>

                        <div class="clearfix"></div>
                    </div>
                <?php endif; ?>

                <?php if( have_rows('tab_4') ): ?>
                    <div role="tabpanel" class="tab-pane" id="tab-seguridad">
                        <?php while( have_rows('tab_4') ): the_row(); 
                            $contenido_derecha = get_sub_field('contenido_derecha');
                            $contenido_izquierda = get_sub_field('contenido_izquierda');
                        ?>

                            <div class="col-sm-6">
                                <?php echo $contenido_derecha; ?>
                            </div>

                            <div class="col-sm-6">
                                <?php echo $contenido_izquierda; ?>
                            </div>
                             

                        <?php endwhile; ?>

                        <div class="clearfix"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if( have_rows('botones_varios') ): 
    $botones_varios = count(get_field('botones_varios'));
    $botones_varios_counter = 1;
?>
    <div class="icon-buttons">
    <div class="container">
    <?php while( have_rows('botones_varios') ): the_row(); 
        
        $texto = get_sub_field('texto');
        $icono = get_sub_field('icono');
        $enlace = get_sub_field('enlace');
        $offsetClass_botonesVarios = (($botones_varios-1) % 3 == 0 && $botones_varios_counter == $botones_varios) ? "col-sm-offset-4" : '';
        ?>

        <div class="col-sm-4 <?php echo $offsetClass_botonesVarios; ?>">
            <a href="<?php echo $enlace; ?>" class="btn-ico">
               <?php echo $texto; ?>

                <div class="after" style="background-image: url(<?php echo $icono['url']; ?>)"></div>
            </a>
        </div>

        <?php
            if ($botones_varios_counter % 3 == 0) {
                echo '<div class="clearfix"></div>';
            }
            $botones_varios_counter++;
        ?>

    <?php endwhile; ?>

    </div>
    </div>

<?php endif; ?>



<?php if( have_rows('eventos') ): ?>
    <div class="carousel-wrapper hidden">
        <div class="container">
            <div class="owl-carousel">
                <?php while( have_rows('eventos') ): the_row(); 
                    
                    $image = get_sub_field('imagen');
                    $url = get_sub_field('url');
                    $archivo = get_sub_field('archivo');
                    $url_o_archivo = get_sub_field('url_o_archivo');
                    $link = ($url_o_archivo == "url") ? $url : $archivo["url"];

                ?>

                    <div class="item">
                        <a href="<?php echo $link; ?>"><img src="<?php echo $image['url']; ?>" class="img-responsive" /></a>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

    
<div class="videos-wrapper hidden">
    <div class="container">
        <?php if( get_field( "url_video_youtube") ):

            $url = get_field('url_video_youtube');

            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                $video_id = $match[1];
            }
        ?>
            <div class="col-sm-8">
                <div class="header-video">Video</div>
                <div class="clearfix"></div>
                <div class="video-container">
    				<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_field( "pagina_de_facebook") ):

            $url = get_field('pagina_de_facebook');
         ?>
        
        <div class="col-sm-4">
            <div class="fb-page" data-href="<?php echo $url; ?>" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $url; ?>"><a href="<?php echo $url; ?>">Ministerio de Trabajo y Promoción del Empleo</a></blockquote></div></div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php if( have_rows('enlaces') ): ?>
    <div class="sponsors hidden">
        <div class="container">
            <?php 
                $counter = 0;
                $offsetClass = "";
            ?>
            <?php while( have_rows('enlaces') ): the_row(); 
                
                $image = get_sub_field('imagen');
                $url = get_sub_field('url');
                $archivo = get_sub_field('archivo');
                $url_o_archivo = get_sub_field('url_o_archivo');
                $link = ($url_o_archivo == "url") ? $url : $archivo["url"];
                $counter++;

                $offsetClass = ($counter==1) ? "col-sm-offset-1" : "";

            ?>

                <div class="enlace col-sm-2 <?php echo $offsetClass; ?>">
                    <a href="<?php echo $link; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" class="img-responsive"></a>
                </div>

                <?php if($counter == 5): ?>
                    <div class="clearfix"></div>
                    <?php $counter = 0 ?>
                <?php endif; ?>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>