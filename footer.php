		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">
				<?php 
					$getFooterText = get_theme_mod( 'dimension_footer_text' );
					if ( !empty( $getFooterText ) ) {
						echo esc_html( $getFooterText );
					} else {
						printf( __( '&copy; Dimension %s Development: %s', 'dimension' ), get_the_date('Y'), '<a href="http://ashrafuzzaman.com" target="_blank">'. __( 'Shahid', 'dimension' ) .'</a>.' );
					}
				?>
			</p>
		</footer>

	</div>

	<!-- BG -->
	<div id="bg"></div>
	
<?php wp_footer(); ?>
</body>
</html>
