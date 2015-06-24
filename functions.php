<?php

	/* Menú de navegación*/
	require_once('wp_bootstrap_navwalker.php');

	add_action( 'after_setup_theme', 'wpt_setup' );
    if ( !function_exists( 'wpt_setup' ) ) {
        function wpt_setup() {  
            register_nav_menu( 'primary', __( 'Menú principal', 'wptuts' ) );
        } 
    }


    /* Página de opciones del tema */

    if( function_exists('acf_set_options_page_menu') ) {
		acf_set_options_page_menu( __('Opciones generales') );
	}

	if( function_exists('acf_set_options_page_title') ) {
		acf_set_options_page_title( __('Opciones generales') );
	}


	/* Tamaños personalizados a las imagenes */

	add_action( 'after_setup_theme', 'setup' );
	function setup() {
		add_theme_support( 'post-thumbnails', 
			array( 
				'notas-de-prensa',
				'cartas-servicios' ) 
		);

	    add_image_size( 'notaPrensaPost', 1030 );
		add_image_size( 'notaPrensaArchive', 251, 167, true );
		add_image_size( 'notaPrensaBanner', 860, 400, true );
		add_image_size( 'cartasServiciosArchive', 156 );
	}


	/* Limite de posts por pagina */

	function page_sizes($query) {
	  if ( is_post_type_archive( 'notas-de-prensa' ) ) {
	      if (!($query->is_admin)) {
	        $query->set('posts_per_page', '5');
	      }
	  }
	}

	add_action('pre_get_posts','page_sizes');


	/* Funcion paginador */
	function pagination($pages = '', $range = 4)
	{  
	     $showitems = ($range * 2)+1;  
	 
	     global $paged;
	     if(empty($paged)) $paged = 1;
	 
	     if($pages == '')
	     {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }   
	 
	     if(1 != $pages)
	     {

	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	             {
	                 echo ($paged == $i)? "<li><a href='#' class='active'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
	             }
	         }

	     }
	}


	/* REMOVE meta boxes */

	function remove_my_post_metaboxes() {
		remove_meta_box( 'postbox-container-2','post','normal' ); // Author Metabox
	}
	add_action('admin_menu','remove_my_post_metaboxes');


	/* CUSTOM LOGIN */

	function mintra_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/img/logo.png);
          	width: 237px;
			height: 80px;
			background-size: 100%;
        }
    </style>
	<?php }
	add_action( 'login_enqueue_scripts', 'mintra_login_logo' );

	function mintra_login_logo_url() {
    return home_url();
	}
	add_filter( 'login_headerurl', 'mintra_login_logo_url' );

	function mintra_login_logo_url_title() {
	    return 'Ministerio de Trabajo y Promoción del Empleo';
	}
	add_filter( 'login_headertitle', 'mintra_login_logo_url_title' );

	// Add rewrite rule and flush on plugin activation
	register_activation_hook( __FILE__, 'NLURL_activate' );
	function NLURL_activate() {
	    if (! get_option('permalink_structure') ){
	        add_action('admin_notices', 'permalink_structure_admin_notice');
	    }
	    NLURL_rewrite();
	    flush_rewrite_rules();
	}
	 
	// Flush on plugin deactivation
	register_deactivation_hook( __FILE__, 'NLURL_deactivate' );
	function NLURL_deactivate() {
	    flush_rewrite_rules();
	}
	 
	// Create new rewrite rule
	add_action( 'init', 'NLURL_rewrite' );
	function NLURL_rewrite() {
	    add_rewrite_rule( 'gestor/?$', 'wp-login.php', 'top' );
	    add_rewrite_rule( 'register/?$', 'wp-login.php?action=disabled', 'top' );
	    add_rewrite_rule( 'forgot/?$', 'wp-login.php?action=lostpassword', 'top' );
	}
	 
	 
	//register url fix
	add_filter('register','fix_register_url');
	function fix_register_url($link){
	    return str_replace(site_url('wp-login.php?action=register', 'gestor'),site_url('register', 'gestor'),$link);
	}
	 
	//login url fix
	add_filter('login_url','fix_login_url');
	function fix_login_url($link){
	    return str_replace(site_url('wp-login.php', 'gestor'),site_url('gestor', 'gestor'),$link);
	}
	 
	//forgot password url fix
	add_filter('lostpassword_url','fix_lostpass_url');
	function fix_lostpass_url($link){
	    return str_replace('?action=lostpassword','',str_replace(network_site_url('wp-login.php', 'gestor'),site_url('forgot', 'gestor'),$link));
	}
	 
	//Site URL hack to overwrite register url
	add_filter('site_url','fix_urls',10,3);
	function fix_urls($url, $path, $orig_scheme){
	    if ($orig_scheme !== 'gestor')
	        return $url;
	    if ($path == 'wp-login.php?action=register')
	        return site_url('register', 'gestor');
	 
	    return $url;
	}
	//notice if user needs to enable permalinks 
	function permalink_structure_admin_notice(){
	    echo '<div id="message" class="error"><p>Please Make sure to enable <a href="options-permalink.php">Permalinks</a>.</p></div>';
	}



	/* ALLL BUTTONS EDITOR WYSIWYG*/

	function enable_more_buttons($buttons) {

		$buttons[] = 'fontselect';
		$buttons[] = 'fontsizeselect';
		$buttons[] = 'styleselect';
		$buttons[] = 'cut';
		$buttons[] = 'copy';
		$buttons[] = 'charmap';
		$buttons[] = 'hr';
		$buttons[] = 'visualaid';

		return $buttons;
	}
	add_filter("mce_buttons_3", "enable_more_buttons");

	add_filter( 'tiny_mce_before_init', 'customformatTinyMCE' );
		function customformatTinyMCE( $in ) {

		$in['wordpress_adv_hidden'] = FALSE;

		return $in;
	}


	/* SHORTCODES */

	function lista_botones( $atts, $content = null ) {
		return '<div class="list-buttons-1">' . $content . '</div>';
	}
	add_shortcode( 'lista_botones', 'lista_botones' );