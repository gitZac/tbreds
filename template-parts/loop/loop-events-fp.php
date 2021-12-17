<?php $args = array(
    'post_type' => 'upcoming_events',							
    'posts_per_page' => 2,							
    'orderby' => 'date',
    'offset' => 1,
    'order' => 'DESC'
); 
$events = new WP_Query($args);

$count = 0;
?>



<?php if($events->have_posts() ) : ?>

<section class="callouts">
    <div class="row">
        <div class="col-sm-12">
            <div class="section-title">
                <h2 class="section__title--title">Shows and Events</h2>
            </div>
        </div>
    </div>
    <div class="callouts">
        <div class="row">
            <?php while($events->have_posts()): $events->the_post(); $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); $count++; ?>
            <div class="col-sm-12 col-lg-6">
                <div class="callouts--card">
                    <div class="callouts--card--image" style="background-image:url(<?php echo $thumbnail['0']; ?>);">
                    </div>
                    <div class="callouts--card--content">
                        <h4 class="callouts--card--title"><?php the_title(); ?></h4>
                        <div class="callouts--card--dates"><?php the_field('event_date'); ?></div>
                        <p class="callouts--card--description"><?php the_field('event_description'); ?></p>
                        <div class="callouts--card--link">
                            <?php if( get_field('tickets_link') ): ?>
                                <a target="_blank" href="<?php echo get_field('tickets_link') ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3">Get tickets!</a>
                            <?php endif; ?>
                        
                            <a href="<?php the_permalink(); ?>" class="thoroughbreds-button secondary small animated flipInX slide2_button1 delay3">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div><!-- /.row -->
    </div>

</section>

<?php endif; ?>
