<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thoroughbreds
 */
get_header(); ?>

<?php 
    $_term = get_queried_object('membership'); //Varies by template

    //ACF Fields
    $image = get_field('header_image_group', $_term);
    $cta_image_quartet = get_field('cta_image_group', $_term);
    $tagline = get_field('group_tag_line', $_term); 
    $content = get_field('page_content_group', $_term);
    $booking_description = get_field('booking_description', $_term);
?>

<div class="container-fluid">
    <section class="hero">
        <div class="hero__image" style="background-image:url(<?php echo $image['url']; ?>);"></div>
        <div class="hero__shade"></div>
        <div class="hero__content">
            <div class="hero__title ">
                <h1 class="margin-0"><?php single_term_title(); ?></h1>
            </div>
            <div class="hero__cta">
                <a href="<?php $current_url; ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3">Book <?php single_term_title(); ?></a>
                <a href="#topshow" class="thoroughbreds-button secondary small animated flipInX slide2_button1 delay3">Our Next Performance</a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2 class="section__title--title"><?php echo $tagline  ?></h2>
                    <?php echo $content; ?>
                </div>
            </div>    
        </div>
    </section>

    <section class="singers bg-gray-light">
        <?php get_template_part( 'template-parts/loop/loop-singers' ); ?>
    </section>
<!-- Event Loop -->
    <section class="callouts">
        <div class="row">
            <h2 class="header__secondary--line">Hear us sing!</h2> 
        </div>
        <div class="row"><a id="topshow"></a>
            <?php get_template_part('template-parts/loop/loop-events-lp'); ?>
        </div>
    </section>

    <!-- Video Loop -->
    <section class="videos bg-gray-light">
        <div class="row">
            <h2 class="header__secondary--line">Newest Videos</h2> 
        </div> 
        <div class="row">
            <?php get_template_part( 'template-parts/loop/loop-video-lp'); ?>
        </div>
    </section>

    <!-- Booking -->

    <section class="booking">
        <div class="row">
            <h2 class="header__secondary--line">Book <?php single_term_title(); ?>!</h2> 
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="callouts--card">
                    <div class="callouts--card--image" style="background-image:url(<?php echo $cta_image_quartet['url']; ?>);">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="callouts--card">
                    <div class="callouts--card--content--right">
                        <h4 class="callouts--card--title--right">Contact us to learn more!</h4>
                        <div class="callouts--card--dates"></div>
                        <p class="callouts--card--description"><?php echo $booking_description; ?></p>
                        <div class="callouts--card--link">
                            <a href="<?php the_permalink(); ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3">Our Next Show</a>
                            <a href="/hire-the-thoroughbreds/hire-a-quartet/" class="thoroughbreds-button secondary small animated flipInX slide2_button1 delay3">Find a Quartet!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
</div>

<?php get_footer(); ?>

