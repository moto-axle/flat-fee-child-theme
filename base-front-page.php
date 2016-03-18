<!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <?php get_header( hji_theme_template_base() ); ?>

    <body <?php body_class(); ?>>
        
        <?php //$sitesObj = npStatesList(); $states = $sitesObj->returnAllStates(); $sites = $sitesObj->returnOnlyNetworkStates()?>

        <?php do_action( 'hji_theme_body_start' ); ?>

        <!--[if lt IE 9]>
            <div class="alert alert-warning">
                <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'hji-textdomain'); ?>
            </div>
        <![endif]-->

        <div id="wrapper" class="body-wrapper">

            <?php do_action( 'hji_theme_before_navbar' ); ?>

            <?php get_template_part( 'templates/header-navbar' ); ?>

            <?php do_action( 'hji_theme_after_navbar' ); ?>

            <?php if ( is_main_site() ) : ?>

                <div class="homepage-slider">

                    <?php putRevSlider("homepage","homepage") ?>

                    <div class="homepage-cta">

                        <div class="col-md-2"></div>

                        <div class="slider-link col-md-4">

                            <div class="inner-link">

                                <span><a href="/list-your-home-now/">List Your Home Now</a></span>

                            </div>

                        </div>

                        <div class="slider-search col-md-4">

                            <?php do_action( 'blvd/stateSearch' ); ?>

                        </div>

                        <div class="col-md-2"></div>

                    </div>

                </div>

                <?php else : ?>

                    <section>

                        <div class="blvd-slideshow"></div>

                    </section>

            <?php endif; ?>

            <section id="primary" class="primary-wrapper container">

                <?php if ( is_main_site() ) : ?>

                    <div class="row">

                    </div>

                <?php endif; ?>

                <?php do_action( 'hji_theme_layout_after' ); ?>

            </section>

        <?php do_action( 'hji_theme_after_primary' ); ?> 

            <section class="container np-list">

                <?php if ( is_active_sidebar( 'blvd-states' ) ) : ?>

                    <div class="blvd-states-widgets row">

                        <?php dynamic_sidebar( 'blvd-states'); ?>

                    </div>
                
                <?php endif; ?>

                <?php do_action( 'blvd/dataList' ); ?>
                                        
            </section>

            <section class="fsbo">

                <div class="container">

                <?php if ( is_active_sidebar( 'blvd-fsbo' ) ) : ?>

                    <div class="blvd-fsbo row">

                        <?php dynamic_sidebar( 'blvd-fsbo' ); ?>

                    </div>

                </div>

                <?php endif; ?>

            </section>

            <?php get_footer( hji_theme_template_base() ); ?>

        </div>

        <?php do_shortcode( 'hji_theme_body_end' ); ?>

    </body>

</html>
