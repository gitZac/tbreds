<?php $args = array(
    'post_type' => 'services',							
    'posts_per_page' => -1,							
    'orderby' => 'date',
    'order' => 'DESC'
); ?>


<div class=" highlights">
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