<?php get_header(); ?>
<?php echo get_template_part('nav-menu'); ?>
    </header>

    <!-- Main -->
    <div id="main">

        <?php
	        if ( is_active_sidebar('page-sidebar') ) {
	            dynamic_sidebar('page-sidebar');
	        }
        ?>
        
    </div>

<?php get_footer(); ?>