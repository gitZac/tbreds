<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thoroughbreds
 */
get_header();

$about_section_title = get_field('about_section_title');
$about_image = get_field('about_image');
$about_text = get_field('about_text');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container-fluid">

            <?php get_template_part('template-parts/modules/hero-full-fp'); ?>

            <section class="callouts">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2 class="section__title--title">Shows and Events</h2>
                        </div>
                    </div>
                </div>
                <?php get_template_part('template-parts/loop/loop-events-fp'); ?>
            </section> 
            <section class="section callouts bg-gray-light">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2 class="section__title--title">Join the Thoroughbreds!</h2>
                        </div>
                    </div>

                    <?php $args = array(
                        'post_type' => 'page',							
                        'posts_per_page' => 2,
                        'post_parent' => 2055,							
                        'orderby' => 'rand',
                        'offset' => 1,
                        'order' => 'DESC'
                    ); ?>

                    <?php $custom = new WP_Query($args); while($custom->have_posts()): $custom->the_post(); $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

                    <div class="col-sm-6">
                        <div class="callouts--card">
                            <div class="callouts--card--image" style="background-image:url(<?php echo $thumbnail['0']; ?>);">
                            </div>
                            <div class="callouts--card--content">
                            <h4 class="callouts--card--title"><?php the_title(); ?></h4>
                            <p class="callouts--card--description"><?php the_field('page_description'); ?></p>
                            <div class="callouts--card--link">
                                <a href="<?php the_permalink(); ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3">Learn More</a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; wp_reset_postdata(); ?>

                </div> 
            </section>
            <section class="about">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2 class="section__title--title"><?php echo $about_section_title; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 about__video-box">
                        <img src="<?php echo $about_image; ?>">
                    </div>
                    <div class="col-lg-6 about__text">
                        <p class="text-left font-italic color-default-light">
                            <?php echo $about_text; ?>
                        </p>
                    </div>   
                </div>
            </section>
            <section style="margin-bottom:0;" class="section highlights bg-gray-light mb-0">
                <div class="row">
                    <div class="section-title">
                        <h2 class="section__title--title">Our Latest Tags</h2>
                    </div>
                </div>
                <div class="highlights--video">
                    <div class="row">
                        <?php get_template_part('template-parts/loop/loop-video'); ?>
                    </div>
                </div>
            </section>
        </div>

    </main>
</div>


<?php get_footer(); ?>        