<?php
/**
 * The template for displaying all pages.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Bio
 * @package thoroughbreds
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main thoroughbreds-page" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content', 'page_bio'); ?>

        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->

</div><!-- #primary -->


<?php get_footer(); ?>
