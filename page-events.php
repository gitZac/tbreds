<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Events
 * @package thoroughbreds
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main thoroughbreds-page" role="main">
        <div class="container-fluid">
            <?php get_template_part('template-parts/modules/hero-inner') ?>
        </div>
        <div class="container-fluid bg-gray-light">
            <section class="section callouts ">
                <div class="row">
                    <?php get_template_part( 'template-parts/modules/inner-title' ); ?>
                    <?php get_template_part('template-parts/loop/loop-events'); ?>
                </div> <!-- /.row -->
            </section> <!-- /.callouts -->
        </div> <!-- /.container-fluid-->
    </main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
