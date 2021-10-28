<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thoroughbreds
 */
get_header(); ?>

<div class="container-fluid">
    <h2><?php echo get_the_archive_title(); ?></h2>

<?php

$_terms = get_terms( array ('section') );

foreach ($_terms as $term) :
    
    $term_slug = $term->slug;

    $_posts = new WP_Query( array(
        'post_type' => 'singers',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'section',
                'field' => 'slug',
                'terms' => $term_slug
            ),
        ),
    ) );

    if($_posts->have_posts() ) : ?>

        <section class="content profile">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2 class="section__title--title"><?php echo $term->name; ?></h2>
                    </div>
                </div>    
            </div>
            <div class="row">

                <?php while($_posts->have_posts() ) : $_posts->the_post(); ?>

                    <?php get_template_part( 'template-parts/loop-singers'); ?>

                <?php endwhile; ?>

            </div>

        </section>

    <?php
        endif;
        wp_reset_postdata();

    endforeach;

    ?>

 </div><!-- ./container-fluid -->

<?php get_footer(); ?>
