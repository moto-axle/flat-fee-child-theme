<?php do_action( 'hji_theme_before_footer' ); ?>

    <footer id="footer" class="content-info" role="contentinfo">

        <div class="container">

            <?php do_action( 'hji_theme_before_footer_widgets' ); ?>

            <?php if ( is_active_sidebar( 'blvd-footerwidgets' ) ) : ?>

                <div class="footer-widgets row">

                    <?php dynamic_sidebar( 'blvd-footerwidgets' ); ?>

                </div>

            <?php endif; ?>

            <?php do_action( 'hji_theme_after_footer_widgets' ); ?>

            <?php
            if ( has_nav_menu( 'footer-menu' ) ) :
                wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'nav nav-pills' ) );
            endif;
            ?>

            <?php do_action( 'hji_theme_above_copyright' ); ?>


        </div>

        <div id="copyright" class="fineprint">

            <div class="container">

                <span class="copyright"><?php hji_footer_copyright(); ?></span>

            </div>

        </div>

        <?php wp_footer(); ?>

    </footer>

<?php do_action( 'hji_theme_after_footer' ); ?>