<?php $args = array(
    'post_type' => 'upcoming_events',							
    'posts_per_page' => 1,							
    'orderby' => 'date',
    'order' => 'DESC'
); 
$events = new WP_Query($args); 

$tickets_link = get_field('tickets_link');

?>

<?php if($events->have_posts() ) {  //If events has posts?>

<?php while($events->have_posts()): $events->the_post(); $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); 

    $tickets_link = get_field('tickets_link');
    $tickets_text = get_field('tickets_text');

    if(empty($tickets_text)){
        $tickets_text = 'Get Tickets!';
    } ?>

<section class="hero hero--full margin-none">
    <div class="hero__image" style="background-image:url(<?php echo $thumbnail['0']; ?>);"></div>
    <div class="hero__shade"></div>
    <div class="hero__content">
        <span class="hero__top-title">Our Next Event...</span>
        <div class="hero__title-wrapper">
            <h1 class="hero__title margin-0"><?php the_title(); ?></h1>
        </div>
        
        <div class="hero__subtitle">
            <?php the_field('event_date'); ?>
        </div>
        <div class="hero__cta">
            <?php if( !empty($tickets_link ) ): ?>
                <a target="_blank" href="<?php echo $tickets_link; ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3"><?php echo $tickets_text; ?></a>
            <?php endif; ?>

            <a href="<?php the_permalink(); ?>" class="thoroughbreds-button secondary small animated flipInX slide2_button1 delay3">More Info</a>
        </div>
    </div>
</section>

<?php endwhile; wp_reset_postdata(); ?>

<?php } else {

get_template_part('template-parts/content-none_events');

} ?>