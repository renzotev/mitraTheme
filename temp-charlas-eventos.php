<?php

/*
 * Template name: Charlas y Eventos
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">
    <div class="container">
        <ul class="list-images">
            <li class="title"><h1><?php the_title(); ?></h1></li>

            <?php if( have_rows('charlas_eventos') ): ?>
                <?php while( have_rows('charlas_eventos') ): the_row(); 
                    
                    $enlace = get_sub_field('enlace');
                    $imagen = get_sub_field('imagen');

                    ?>
                    
                    <li><a href="<?php echo $enlace; ?>" target="_blank"><img src="<?php echo $imagen['url']; ?>" clas="img-responsive"></a></li>

                <?php endwhile; ?>
            <?php endif; ?>

        </ul>
    </div>
</div>

<?php get_footer(); ?>