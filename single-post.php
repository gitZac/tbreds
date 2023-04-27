<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package thoroughbreds
 */
get_header();

$post_date = get_the_date('l F j, Y' ); ?>
<main class="blog-single">
    <div class="container">
    <div class="blog-single__image">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        <div class="blog-single__image-meta">
            <?php echo $post_date; ?>
        </div>
    </div>
    <h1 class="blog-single__title"><?php the_title(); ?></h1> 
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>
