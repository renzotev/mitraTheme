<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="ES"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="ES"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="ES"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ES"> <!--<![endif]--> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
		<?php wp_title('|',1,'right'); ?>
		<?php bloginfo('name'); ?>
		</title>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css">
        <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/admin.css">

        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>


        <?php wp_enqueue_script("jquery"); ?>
        <?php wp_head(); ?>

        <?php if( have_rows('redes_sociales', 'option') ): ?>
            <style type="text/css">
                <?php while( have_rows('redes_sociales', 'option') ): the_row(); 
                    
                    $colorRS = get_sub_field('color');
                    $colorRS = ltrim($colorRS, '#');

                    ?>

                    <?php echo "header .logos-media .social-media li .c$colorRS:hover"; ?> { background-color: <?php echo "#$colorRS"; ?>; }

                <?php endwhile; ?>
            </style>
        <?php endif; ?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.3&appId=452128208267385";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        <header>
            <div class="line-top">
                <div class="container hidden">
                    <?php if( have_rows('enlaces', 'option') ): ?>
                        <ul class="items-top pull-right">
                        <?php while( have_rows('enlaces', 'option') ): the_row(); 
                            
                            $texto = get_sub_field('texto');
                            $enlace = get_sub_field('enlace');
                            $tipo = get_sub_field('tipo');
                            $abrir_en_una_nueva_pagina = get_sub_field('abrir_en_una_nueva_pagina');
                            $targetIcon = ($abrir_en_una_nueva_pagina) ? 'target="_blank"' : '';

                            ?>

                            <li class="icon-<?php echo $tipo; ?>">
                                <a href="<?php echo $enlace; ?>" <?php echo $targetIcon; ?>><?php echo $texto; ?></a>
                            </li>

                        <?php endwhile; ?>

                        </ul>

                    <?php endif; ?>

                </div>
            </div>

            <div class="logos-media">
                <div class="container">
                    <div class="col-sm-4 hidden">
						<?php if( get_field( "logo_secundario", 'option') ):

							$image = get_field('logo_secundario', 'option');
						 ?>

							<img src="<?php echo $image['url']; ?>" class="img-responsive" />
						<?php endif; ?>
                    </div>

                    <div class="col-sm-4">
                        
                        <?php if( get_field( "logo_principal", 'option' ) ):

							$image = get_field('logo_principal', 'option');
						 ?>

							<a href="<?php echo site_url(); ?>" class="logo-wrapper"><img src="<?php echo $image['url']; ?>" class="img-responsive" /></a>
						<?php endif; ?>
                    </div>

                    <div class="col-sm-4 hidden">

                        <?php if( have_rows('redes_sociales', 'option') ): ?>
							<ul class="social-media pull-right">
							<?php while( have_rows('redes_sociales', 'option') ): the_row(); 
								
								$image = get_sub_field('imagen');
								$link = get_sub_field('url');
                                $colorRS = get_sub_field('color');
                                $colorRS = str_replace("#", "c", $colorRS);

								?>

								<li>
									<a href="<?php echo $link; ?>" target="_blank" class="<?php echo $colorRS; ?>">
										<img src="<?php echo $image['url']; ?>" />
									</a>
								</li>

							<?php endwhile; ?>

							</ul>

						<?php endif; ?>
                    </div>
                </div>
            </div>

            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="see-menu">Ver Menú</span>
                        <button type="button" class="navbar-toggle collapsed">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    
                    <?php 
                    	wp_nav_menu( array(
			                'menu'              => 'primary',
			                'theme_location'    => 'primary',
			                'container'         => 'div',
			                'container_class'   => 'collapse navbar-collapse',
			        		'container_id'      => 'navbar',
			                'menu_class'        => 'nav navbar-nav',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new wp_bootstrap_navwalker())
			            );
                     ?>
                       
                </div>
            </nav>

            <div class="clearfix"></div>
        </header>

        <?php 
		    $args = array(
		        'post_type'        => 'notas-de-prensa',
		        'posts_per_page'   => 3
		    );

		    $the_query = new WP_Query( $args );  
		?>
