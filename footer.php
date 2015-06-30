        <footer>
            <div class="container">
                <div class="col-sm-4 col-sm-push-8">
                    <?php if( get_field( "logo_pie_de_pagina", 'option') ):

						$image = get_field('logo_pie_de_pagina', 'option');
					 ?>

						<img src="<?php echo $image['url']; ?>" class="img-responsive logo-blanco">
					<?php endif; ?>
                </div>
                <div class="col-sm-8 col-sm-pull-4">
                    <div class="address">
                        <?php if( get_field( "texto_pie_de_pagina", 'option') ):

							$text = get_field('texto_pie_de_pagina', 'option');
						 ?>

							<?php echo $text; ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>

        <div class="scrollToTop-wrapper">
            <div class="scrollToTop"><i class="glyphicon glyphicon-chevron-up"></i></div>
        </div>
        
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.slides.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/owl.carousel.min.js"></script>

        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

        <?php if( get_field( "google_analytics", 'option') ):

            $google_analytics = get_field('google_analytics', 'option');
         ?>

            <?php echo $google_analytics; ?>
        <?php endif; ?>

        <?php wp_footer(); ?>
    </body>
</html>