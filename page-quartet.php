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
 * Template Name: All Quartets
 * @package thoroughbreds
 */
get_header();?>

<div id="primary" class="content-area">
    <main id="main" class="site-main thoroughbreds-page" role="main">
        <div class="container-fluid">
            <?php if (get_post_thumbnail_id($post->ID)) : ?>
            <section class="hero">
                <div class="hero__image" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>);"></div>
                <div class="hero__shade"></div>
                <div class="hero__content">
                    <div class="hero__title ">
                        <h1 class="margin-0"><?php the_title(); ?></h1>
                    </div>
                    <div class="hero__subtitle">
                        <?php //the_field('event_date'); ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2 class="section__title--title"><?php the_title();  ?></h2>
                            <?php while(have_posts() ) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                        </div>
                    </div>    
                </div>
            </section>
            <section class="section">
                <?php get_template_part( 'template-parts/loop/loop-quartets' ); ?>
            </section>
        </div>
    </main>
</div>

<?php get_footer(); ?>
