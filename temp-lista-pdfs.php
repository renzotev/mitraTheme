<?php

/*
 * Template name: Lista PDFS
 */

get_header();

?>

<?php get_template_part( 'breadcrumbs' ); ?>

<div class="general-content">
    <div class="container">
        <?php if( have_rows('archivos') ): ?>
            <ul class="list-checks double-arrow">
            <?php while( have_rows('archivos') ): the_row(); 
                
                $texto = get_sub_field('texto');
                $pdf = get_sub_field('pdf');

                ?>

                <li><a href="<?php echo $pdf['url']; ?>" class="type-pdf" target="_blank"><?php echo $texto; ?></a></li>

            <?php endwhile; ?>

            </ul>

        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>