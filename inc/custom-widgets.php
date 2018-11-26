<?php

	function dimension_custom_widgets() {
		register_widget('dimension_intro_page');
		register_widget('dimension_work_page');
		register_widget('dimension_about_page');
		register_widget('dimension_contact_page');
	}
	add_action( 'widgets_init', 'dimension_custom_widgets' );

	/*---------------------------------------------------------*/
	/* Intro page widget */
	/*---------------------------------------------------------*/
	class dimension_intro_page extends WP_Widget {

		function __construct() {
			parent::__construct( 'dimension-intro-page', __( 'Dimension &mdash; Intro Page', 'dimension' ), array(
				'description'	=> __( 'Dimension intro page', 'dimension' )
			) );
		}


		function form( $instance ) {
		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title: ', 'dimension' ); ?></label>
				<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?php echo !empty($instance['title']) ? $instance['title'] : ''; ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'intro-page-id' ) ); ?>"><?php _e( 'Select Page: ', 'dimension' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name('intro-page-id') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'intro-page-id' ) ); ?>" class="widefat">
					<option value=""><?php _e( '-- Select page --', 'dimension' ); ?></option>
					<?php
						$pages = get_pages();
						foreach ( $pages as $page ) :
							$select = ( $instance['intro-page-id'] == $page->ID ) ? 'selected=selected': '';
							?>
								<option value="<?php echo esc_attr( $page->ID ) ?>" <?php echo esc_attr( $select ) ?>><?php echo esc_html( $page->post_title ); ?></option>
							<?php
						endforeach;
					?>
				</select>
			</p>

<?php
		}

		function widget( $args, $instance ) {

			/* Getting Page ID */
			$page_id = isset( $instance['intro-page-id'] ) ? $instance['intro-page-id'] : '';

			$dimension_intro_page_args = array(
				'post_type'		=> 'page',
				'page_id'		=> $page_id,
				'posts_per_page'	=> 1
			);

			$dimension_query = new WP_Query($dimension_intro_page_args);

			while ( $dimension_query->have_posts() ) :
				$dimension_query->the_post();
			?>
				<article id="intro">
					<h2 class="major">
						<?php
							if ( !empty($instance['title']) ) {
								echo esc_html( $instance['title'] );
							} else {
								the_title();
							}
						?>
					</h2>
					<?php

						/* Show Thumbnail */
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full', array( 'alt' => esc_attr(get_the_title()) ) );
						}

						// Content Show
						the_content();
					?>

				</article>
		<?php
			endwhile;
			wp_reset_postdata();

		}


	}

	/*---------------------------------------------------------*/
	/* Work page widget */
	/*---------------------------------------------------------*/

	class dimension_work_page extends WP_Widget {

		function __construct() {
			parent::__construct( 
				'dimension-work-page', 
				__( 'Dimension &mdash; Work Page', 'dimension' ), 
				array(
					'description'	=> __( 'Dimension work page', 'dimension' )
				) 
			);
		}


		function form( $instance ) {
?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title: ', 'dimension' ); ?></label>
				<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?php echo !empty($instance['title']) ? $instance['title'] : ''; ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'work-title' ) ); ?>"><?php _e( 'Select Page', 'dimension' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name('work-title') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'work-title' ) ); ?>" class="widefat">
					<option value=""><?php echo esc_html__( '-- Select page --', 'dimension' ); ?></option>
					<?php
						$pages = get_pages();
						foreach ( $pages as $page ) :
							$select = ( $instance['work-title'] == $page->ID ) ? 'selected=selected': '';
							?>
								<option value="<?php echo esc_attr( $page->ID ) ?>" <?php echo esc_attr( $select ) ?>><?php echo esc_html( $page->post_title ); ?></option>
							<?php
						endforeach;
					?>
				</select>
			</p>

<?php
		}


		function widget( $args, $instance ) {


			/* Getting Page ID */
			$page_id = isset( $instance['work-title'] ) ? $instance['work-title'] : '';

			$dimension_work_page_args = array(
				'post_type'		=> 'page',
				'page_id'		=> $page_id,
				'posts_per_page'	=> 1
			);

			$dimension_work_page_query = new WP_Query( $dimension_work_page_args );

			while ( $dimension_work_page_query->have_posts() ) :
				$dimension_work_page_query->the_post();

			?>
				<article id="work">
					<h2 class="major">
						<?php
							if (!empty($instance['title'])) {
								echo esc_html( $instance['title'] );
							} else {
								the_title();
							}
						?>
					</h2>
					<?php

						/* Show Thumbnail */
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full', array( 'alt' => esc_attr(get_the_title()) ) );
						}

						// Content Show
						the_content();
					?>
				</article>
			<?php
			endwhile;
			wp_reset_postdata();
		}
	}


	/*---------------------------------------------------------*/
	/* About page widget */
	/*---------------------------------------------------------*/

	class dimension_about_page extends WP_Widget {

		function __construct() {
			parent::__construct( 'dimension-about-page', __( 'Dimension &mdash; About Page', 'dimension' ), array(
				'description'	=> __( 'Dimension about page', 'dimension' )
			) );
		}


		function form( $instance ) {
?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title: ', 'dimension' ); ?></label>
				<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?php echo !empty($instance['title']) ? $instance['title'] : ''; ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'about-title' ) ); ?>"><?php _e( 'Select Page:', 'dimension' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name('about-title') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'about-title' ) ); ?>" class="widefat">
					<option value=""><?php echo esc_html__( '-- Select page --', 'dimension' ); ?></option>
					<?php
						$pages = get_pages();
						foreach ( $pages as $page ) :
							$select = ( $instance['about-title'] == $page->ID ) ? 'selected=selected': '';
							?>
							<option value="<?php echo esc_attr( $page->ID ) ?>" <?php echo esc_attr( $select ) ?>><?php echo esc_html( $page->post_title ); ?></option>
							<?php
						endforeach;
					?>
				</select>
			</p>

<?php
		}


		function widget( $args, $instance ) {

			/* Getting Page ID */
			$page_id = isset( $instance['about-title'] ) ? $instance['about-title'] : '';

			$dimension_about_page_args = array(
				'post_type'		=> 'page',
				'page_id'		=> $page_id,
				'posts_per_page'	=> 1
			);

			$dimension_about_page_query = new WP_Query( $dimension_about_page_args );

			while ( $dimension_about_page_query->have_posts() ) :
				$dimension_about_page_query->the_post();
			?>
				<article id="about">
					<h2 class="major">
						<?php
							if (!empty($instance['title'])) {
								echo esc_html( $instance['title'] );
							} else {
								the_title();
							}
						?>
					</h2>
					<?php

						/* Show Thumbnail */
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full', array( 'alt' => esc_attr(get_the_title()) ) );
						}

						// Content Show
						the_content();
					?>

				</article>
			<?php
			endwhile;
			wp_reset_postdata();
		}
	}


	/*---------------------------------------------------------*/
	/* Contact page widget */
	/*---------------------------------------------------------*/

	class dimension_contact_page extends WP_Widget {

		function __construct() {
			parent::__construct( 'dimension-contact-page', __( 'Dimension &mdash; Contact Page', 'dimension' ), array(
				'description'	=> __( 'Dimension contact page', 'dimension' )
			) );
		}


		function form( $instance ) {
?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title: ', 'dimension' ); ?></label>
				<input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?php echo !empty($instance['title']) ? $instance['title'] : ''; ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'contact-title' ) ); ?>"><?php _e( 'Select Page:', 'dimension' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name('contact-title') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'contact-title' ) ); ?>" class="widefat">
					<option value=""><?php echo esc_html__( '-- Select page --', 'dimension' ); ?></option>
					<?php

						$pages = get_pages();
						foreach ( $pages as $page ) :
							$select = ( $instance['contact-title'] == $page->ID ) ? 'selected=selected': '';
							?>
							<option value="<?php echo esc_attr( $page->ID ) ?>" <?php echo esc_attr( $select ) ?>><?php echo esc_html( $page->post_title ); ?></option>
							<?php
						endforeach;
					?>
				</select>
			</p>

<?php
		}


		function widget( $args, $instance ) {

			/* Getting Page ID */
			$page_id = isset( $instance['contact-title'] ) ? $instance['contact-title'] : '';

			$dimension_contact_page_args = array(
				'post_type'		=> 'page',
				'page_id'		=> $page_id,
				'posts_per_page'	=> 1
			);

			$dimension_contact_page_query = new WP_Query( $dimension_contact_page_args );

			while ( $dimension_contact_page_query->have_posts() ) :
				$dimension_contact_page_query->the_post();
			?>
				<article id="contact">
					<h2 class="major">
						<?php
							if (!empty($instance['title'])) {
								echo esc_html( $instance['title'] );
							} else {
								the_title();
							}
						?>
					</h2>

					<?php

						/* Show Thumbnail */
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full', array( 'alt' => esc_attr(get_the_title()) ) );
						}

						// Content Show
						the_content();

					?>

					<ul class="icons">
						<?php if ( !empty( get_theme_mod('twitter_link') ) ) :  ?>
							<li>
								<a href="<?php echo esc_url( get_theme_mod('twitter_link') ); ?>" class="icon fa-twitter">
									<span class="label"><?php _e( 'Twitter', 'dimension' ); ?></span>
								</a>
							</li>
						<?php endif; ?>

						<?php if ( !empty( get_theme_mod('fb_link') ) ) :  ?>
							<li>
								<a href="<?php echo esc_url( get_theme_mod('fb_link') ); ?>" class="icon fa-facebook">
									<span class="label"><?php _e( 'Facebook', 'dimension' ); ?></span>
								</a>
							</li>
						<?php endif; ?>

						<?php if ( !empty( get_theme_mod('instagram_link') ) ) :  ?>
							<li>
								<a href="<?php echo esc_url( get_theme_mod('instagram_link') ); ?>" class="icon fa-instagram">
									<span class="label"><?php _e( 'Instagram', 'dimension' ); ?></span>
								</a>
							</li>
						<?php endif; ?>

						<?php if ( !empty( get_theme_mod('github_link') ) ) :  ?>
							<li>
								<a href="<?php echo esc_url( get_theme_mod('github_link') ); ?>" class="icon fa-github">
									<span class="label"><?php _e( 'GitHub', 'dimension' ); ?></span>
								</a>
							</li>
						<?php endif; ?>

						<?php if ( !empty( get_theme_mod('skype_link') ) ) :  ?>
							<li>
								<a href="skype:<?php echo get_theme_mod('skype_link'); ?>?call" class="icon fa-skype">
									<span class="label"><?php _e( 'Skype', 'dimension' ); ?></span>
								</a>
							</li>
						<?php endif; ?>

					</ul>

				</article>
			<?php
			endwhile;
			wp_reset_postdata();
		}
	}