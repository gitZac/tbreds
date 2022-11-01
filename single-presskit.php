<?php
/**
 * The template for displaying all pages.
 * This is the single template page for the presskit.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package thoroughbreds
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main thoroughbreds-page" role="main">
        <div class="container">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'plainheader'); ?>
                <?php the_field('kit_post_content'); ?>
                <?php get_template_part('template-parts/content', 'aboutcta'); ?>
            <?php endwhile; // End of the loop. ?>
        </div>

    </main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>