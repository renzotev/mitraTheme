<?php get_header(); ?>

	<?php get_template_part( 'breadcrumbs' ); ?>

	<div class="general-content">
	    <div class="container">
	        <?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<!--<h1 class="h1-small" style="text-transform:uppercase"><?php the_title(); ?></h1>-->
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
	    </div>
	</div>


<?php get_footer(); ?>