<?php
    $events = new WP_Query( array(
        'post_type' => 'upcoming_events',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'date'
    ) );
?>

<?php if ($events->have_posts() ) { ?>

    <?php while($events->have_posts() ) : $events->the_post(); $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
        
    $tickets_link = get_field('tickets_link');
    $tickets_text = get_field('tickets_text');
    
    if(empty($tickets_text)){
        $tickets_text = 'Get Tickets!';
    } ?>

    <div class="col-sm-6">
        <div class="callouts--card">
            <div class="callouts--card--image" style="background-image:url(<?php echo $thumbnail['0']; ?>);">
            </div>
            <div class="callouts--card--content">
                <h4 class="callouts--card--title"><?php the_title(); ?></h4>
                <div class="callouts--card--dates"><?php the_field('event_date'); ?></div>
                <p class="callouts--card--description"><?php the_field('event_description'); ?></p>
                <div class="callouts--card--link">
                    
                <?php if( !empty($tickets_link ) ): ?>
                    <a target="_blank" href="<?php echo $tickets_link; ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3"><?php echo $tickets_text; ?></a>
                <?php endif; ?>

                    <a href="<?php the_permalink(); ?>" class="thoroughbreds-button secondary small animated flipInX slide2_button1 delay3">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata();?>

<?php } else {

get_template_part('template-parts/content-none_events');

}?>