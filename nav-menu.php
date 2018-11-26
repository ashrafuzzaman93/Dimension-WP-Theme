<nav>
    <ul>
        <?php
            
            if ( is_active_widget( false, false, 'dimension-intro-page', true ) ) {
                echo '<li><a href="#intro">'. __( 'Intro', 'dimension' ) .'</a></li>';
            }

            if ( is_active_widget( false, false, 'dimension-work-page', true ) ) {
                echo '<li><a href="#work">'. __( 'Work', 'dimension' ) .'</a></li>';
            }

            if ( is_active_widget( false, false, 'dimension-about-page', true ) ) {
                echo '<li><a href="#about">'. __( 'About', 'dimension' ) .'</a></li>';
            }

            if ( is_active_widget( false, false, 'dimension-contact-page', true ) ) {
                echo '<li><a href="#contact">'. __( 'Contact', 'dimension' ) .'</a></li>';
            }

        ?>
    </ul>
</nav>