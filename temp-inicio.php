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
                <li role="presentation" class="active">
                    <a href="#tab-programas" aria-controls="tab-programas" role="tab" data-toggle="tab"><span>Programas</span></a>
                </li>
                <li role="presentation">
                    <a href="#tab-consejos" aria-controls="tab-consejos" role="tab" data-toggle="tab"><span>Consejos - Comités - Comisiones</span></a>
                </li>
                <li role="presentation">
                    <a href="#tab-consultas" aria-controls="tab-consultas" role="tab" data-toggle="tab"><span>Consultas Lab - Servicios</span></a>
                </li>
                <li role="presentation">
                    <a href="#tab-seguridad" aria-controls="tab-seguridad" role="tab" data-toggle="tab"><span>Seguridad y Salud en el Trabajo</span></a>
                </li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab-programas">
                    <div class="col-sm-6">
                        <a href="#" class="button-icon-text btn-1">
                            <span class="title-btn">Perú Responsable</span>
                            <span class="text-btn">Programa Nacional de Promoción de la Responsabilidad Social Empresarial</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="button-icon-text btn-2">
                            <span class="title-btn">Trabaja Perú</span>
                            <span class="text-btn">Programa para la Generación de Empleo Social Inclusivo</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-sm-6">
                        <a href="#" class="button-icon-text btn-3">
                            <span class="title-btn">Impulsa Perú</span>
                            <span class="text-btn">Programa Nacional para la Promoción de Oportunidades Laborales</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="button-icon-text btn-4">
                            <span class="title-btn">Jóvenes Productivos</span>
                            <span class="text-btn">Programa Nacional de Empleo Juvenil</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="tab-consejos">
                    <div class="col-sm-3 img-consejo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/consejo-1.jpg" class="img-responsive">
                    </div>
                    <div class="col-sm-3 img-consejo">
                       <img src="<?php echo get_template_directory_uri(); ?>/img/consejo-2.jpg" class="img-responsive">
                    </div>

                    <div class="col-sm-3 img-consejo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/consejo-3.jpg" class="img-responsive">
                    </div>
                    <div class="col-sm-3 img-consejo">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/consejo-4.jpg" class="img-responsive">
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="tab-consultas">
                    <div class="col-sm-6">
                        <ul>
                            <li>Solicitud de Orientación vía web (Consultas Laborales)</li>
                            <li>Solicitud de Orientación vía telefónica</li>
                            <li>Solicitud escrita de opinión técnica</li>
                            <li>Consultas Presenciales</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul>
                            <li>Servicios Presenciales</li>
                            <li>Servicios Virtuales</li>
                            <li>Información sobre Trabajadores - Empresas - Sindicatos</li>
                            <li>Otros</li>
                        </ul>   
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="tab-seguridad">
                    <div class="col-sm-6">
                        <ul>
                            <li>Estadísticas de Accidentes de Trabajo</li>
                            <li>Modelos Referenciales Comité SST (Privado)</li>
                            <li>Resoluciones Directoriales</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul>
                            <li>Normas Legales</li>
                            <li>Documentos de Interés</li>
                            <li>Módulo de Difusión</li>
                        </ul>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="icon-buttons">
    <div class="container">
        <div class="col-sm-4">
            <a href="#" class="btn-ico btn-1">
                Acceso a la Información Pública
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#" class="btn-ico btn-2">
                Agenda Ministerial
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#" class="btn-ico btn-3">
                Convocatoria CAS
            </a>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-4">
            <a href="#" class="btn-ico btn-4">
                Estado de su Trámite
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#" class="btn-ico btn-5">
                Charlas y Eventos
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#" class="btn-ico btn-6">
                Normas Legales - SNIL
            </a>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-4 col-sm-offset-4">
            <a href="#" class="btn-ico btn-7">
                Plan Anticorrupción
            </a>
        </div>
    </div>
</div>


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
                <div class="header-video">Videos</div>
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