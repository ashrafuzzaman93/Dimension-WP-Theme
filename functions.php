<?php

	/*---------------------------------------------------------*/
	/* Theme Initial Setup */
	/*---------------------------------------------------------*/
	if ( !function_exists('dimension_theme_setup') ) {
		function dimension_theme_setup() {

			/* REGISTER TEXT DOMAIN FOR TRANSLATION */
			load_theme_textdomain('dimension');

			/* GETTING RSS FEED LINKS */
			add_theme_support('automatic-feed-links');

			/* GETTING TITLE TAG */
			add_theme_support('title-tag');

			/* GETTING POST THUMBNAIL */
			add_theme_support('post-thumbnails');

			/* GETTING BACKGROUND OPTIONS */
			add_theme_support('custom-background');

			/* GETTING HEADER OPTIONS */
			$defaults = array(
				'default-image'			=> get_theme_file_uri('/images/bg.jpg'),
				'header-text'			=> true,
				'default-text-color'	=> '#fff'
			);
			add_theme_support('custom-header', $defaults);

		}
	}
	
	add_action( 'after_setup_theme', 'dimension_theme_setup' );

	/*---------------------------------------------------------*/
	/* Register Page Sidebar */
	/*---------------------------------------------------------*/
	function dimension_page_sidebar() {

		$args = array(
			'name'			=> __( 'Page Sidebar', 'dimension' ),
			'id'			=> 'page-sidebar',
			'description'	=> __( 'Select your page widgets.', 'dimension' ),
		);
		register_sidebar($args);
	}
	add_action( 'widgets_init', 'dimension_page_sidebar' );


	/*---------------------------------------------------------*/
	/* Include Theme assets */
	/*---------------------------------------------------------*/
	function dimension_theme_assets() {

		$var = '1.0';

		/* FONTS */
		wp_enqueue_style( 'dimension-font-awesome', get_theme_file_uri('/assets/css/font-awesome.min.css'), null, '4.7.0' );
		wp_enqueue_style( 'dimension-Source-Sans-Pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300italic,600italic,300,600', null, null );
		
		/* CSS */
		wp_enqueue_style( 'dimension-main-css', get_theme_file_uri('/assets/css/main.css'), array(), $var );
		wp_enqueue_style( 'dimension-theme-css', get_stylesheet_uri(), array(), $var );

		/* JavaScripts */
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'dimension-browser-min-js', get_theme_file_uri('/assets/js/browser.min.js'), array(), $var, true );
		wp_enqueue_script( 'dimension-breakpoints-min-js', get_theme_file_uri('/assets/js/breakpoints.min.js'), array(), $var, true );
		wp_enqueue_script( 'dimension-util-js', get_theme_file_uri('/assets/js/util.js'), array(), $var, true );
		wp_enqueue_script( 'dimension-main-js', get_theme_file_uri('/assets/js/main.js'), array(), $var, true );

	}
	add_action( 'wp_enqueue_scripts', 'dimension_theme_assets' );


	/* REQUIRE CUSTOM WIDGETS FILE */
	require_once('inc/custom-widgets.php');

	/* REQUIRE CUSTOMIZER FILE */
	require_once('inc/customizer-api.php');


	/*---------------------------------------------------------*/
	/* Custom internal CSS add */
	/*---------------------------------------------------------*/
	function dimension_custom_internal_css() {
		if ( current_theme_supports( 'custom-header' ) ) {
	?>
			<style>
				#bg:after { background-image: url('<?php header_image(); ?>'); }
				.inner h1, .inner p {
					color: #<?php echo get_header_textcolor(); ?>;
					<?php  
						if ( !display_header_text() ) {
							echo 'display: none;';
						}
					?>
				}
			</style>
	<?php
		}
	}

	add_action( 'wp_head', 'dimension_custom_internal_css' );



	/*---------------------------------------------------------*/
	/* Remove default active widgets */
	/*---------------------------------------------------------*/
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	    add_action('admin_footer','removed_widgets');
	}

	function removed_widgets(){
	    //get all registered sidebars
	    global $wp_registered_sidebars;
	    //get saved widgets
	    $widgets = get_option('sidebars_widgets');
	    //loop over the sidebars and remove all widgets
	    foreach ($wp_registered_sidebars as $sidebar => $value) {
	        unset($widgets[$sidebar]);
	    }
	    //update with widgets removed
	    update_option('sidebars_widgets',$widgets);
	}

