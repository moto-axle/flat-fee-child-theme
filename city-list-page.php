<?php
/**
 * Template Name: City List Page
 *
 */
?>
<?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="page-header">

            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

        </header>

        <section class="page-content">

            <?php the_content(); ?>

            <?php echo npCityList(); ?>

        </section>

        <footer>

            <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

        </footer>

    </article>

<?php endwhile; ?>