<?php
/**
 * The template for displaying all pages.
 *
 * This is the template for the Media Resources page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Media
 * @package thoroughbreds
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main thoroughbreds-page" role="main">

        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'plainheader'); ?>
            <?php get_template_part('template-parts/loop/loop', 'media'); ?>
            <?php get_template_part('template-parts/content', 'aboutcta'); ?>
        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>