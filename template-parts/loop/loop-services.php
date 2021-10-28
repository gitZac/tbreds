<?php $args = array(
    'post_type' => 'services',							
    'posts_per_page' => -1,							
    'orderby' => 'date',
    'order' => 'DESC'
); ?>
        
<div class="scrapbook">

    <div class="row row--full-width">

        <?php $services = new WP_Query($args); while($services->have_posts()): $services->the_post(); $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

        <div class="col-lg-4 col-sm-6 padding-none">

            <a href="<?php the_permalink(); ?>" class="scrapbook__link">
                <div class="scrapbook__card" style="background-image:url(<?php echo $thumbnail['0']; ?>);">
                <div class="scrapbook__shade"></div>

                    <div class="scrapbook__card-inner">
                        <div class="columns">
                            <div class="column is-half">
                                <div class="scrapbook__logo pad-all-1 grow animate--fast">
                                    <img src="http://conf-dev.local/wp-content/uploads/2019/10/PRPT-White.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="abs-wrapper abs-wrapper--center fade-in animate--fast">
                            <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                            <p class="scrapbook__read-more">Learn More</p>
                        </div>
                        <div class="abs-wrapper abs-wrapper--title-center abs-wrapper--center-bottom pad-tb-1">
                            <h2 class="animate--fast  scrapbook__title title scrapbook__title--prorehab"><?php the_title(); ?></h2>
                            <p class="scrapbook__location animate--fast fade-in zoom-in--left subtitle is-4"><?php the_field('service_subtitle'); ?></p>
                        </div>
                    </div> <!--./scrapbook__card-inner -->
                </div> <!--./scrapbook__card -->
            </a> <!--./scrapbook__link -->
        </div> <!--./Column -->

        <?php endwhile; wp_reset_postdata(); ?>

    </div>

</div><!-- ./Scrapbook -->