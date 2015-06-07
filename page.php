<?php get_header(); ?>

	<div class="breadcrumb-wrapper hidden">
	    <div class="container">
	        <ol class="breadcrumb">
	            <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
	            <li class="active"><span><?php the_title(); ?></span></li>
	        </ol>
	    </div>
	</div>

	<div class="general-content">
	    <div class="container">
	        <?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
	    </div>
	</div>


<?php get_footer(); ?>