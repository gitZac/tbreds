<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thoroughbreds
 */
?>
<div class="container-fluid">

<?php if (get_post_thumbnail_id($post->ID)) : ?>
    <section class="hero">
        <div class="hero__image" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>);"></div>
        <div class="hero__shade"></div>
        <div class="hero__content">
            <div class="hero__title ">
                <h1 class="margin-0"><?php the_title(); ?></h1>
            </div>
        </div>
    </section>
<?php endif; ?>

</div>
<div class="container-fluid padding-none">

<?php $args = array(
    'post_type' => 'services',							
    'posts_per_page' => -1,							
    'orderby' => 'date',
    'order' => 'DESC'
); ?>

    <div class="section highlights">
        <div class="row">
            <div class="section-title">
                <h2 class="section__title--title"><?php the_field('secondary_title');?></h2>
                <?php the_content(); ?>
            </div><!-- /.section-title-->
        </div>
        <div class="highlights--list">
            <div class="row row--full-width ">
            
                <?php $services = new WP_Query($args); while($services->have_posts()): $services->the_post(); $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

                <div class="col-sm-4 padding-none">
                    <div class="highlights--list--item">
                        <a href="<?php the_permalink(); ?>" class="highlights--card">
                            <div style="background-image:url(<?php echo $thumbnail['0']; ?>);" class="highlights--card--image"></div>
                            <div class="highlights--card--shade"></div>
                            <div class="highlights--card--content">
                                <strong class="highlights--card--title"><?php the_title(); ?></strong>
                                <em class="highlights--card--subtitle"><?php the_field('service_subtitle'); ?></em>
                            </div>
                        </a>
                    </div> <!-- /.highlights--list-item-->
                </div> <!-- /.col-sm-->

                <?php endwhile; wp_reset_postdata(); ?>

            </div> <!-- /.row--full-width-->
        </div> <!-- /.highlights--list-->
    </div><!-- /.section.highlights-->
</div><!-- /.container-fluid-->