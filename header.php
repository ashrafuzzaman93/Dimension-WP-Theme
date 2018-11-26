<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class('is-preload'); ?>>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header -->
				<header id="header">
					<div class="logo">
						<?php  
							if ( !empty( get_theme_mod( 'dimension_image_logo' ) ) ) {
								$name = get_bloginfo('name');
								$url = site_url();
								echo '<a href="'. esc_url($url) .'"><img src="'. esc_attr( get_theme_mod( 'dimension_image_logo' ) ) .'" alt="'. $name .' logo"></a>';
							} else {
								if ( !empty( get_theme_mod('dimension_logo_icon_name') ) ) {
									$icon = get_theme_mod('dimension_logo_icon_name');
									echo '<span class="icon '. esc_html($icon) .'"></span>';
								} else {
									echo '<span class="icon fa-diamond"></span>';
								}
							}
						?>
					</div>
					<div class="content">
						<div class="inner">
							<h1><?php bloginfo('name'); ?></h1>
							<p><?php bloginfo('description'); ?></p>
						</div>
					</div>