<?php if (get_post_thumbnail_id($post->ID)) : ?>
    <section class="hero margin-none">
        <div class="hero__image" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>);"></div>
        <div class="hero__shade"></div>
        <div class="hero__content">
        <div class="hero__title-wrapper">
            <h1 class="hero__title margin-0"><?php the_title(); ?></h1>
        </div>

        <?php if(get_post_type() == 'upcoming_events') {?>
            <div class="hero__subtitle">
                <?php the_field('event_date'); ?>
            </div>
        <?php } ?>

            <div class="hero__cta">
            <?php if(get_post_type() == 'upcoming_events') { ?> 
                <a href="#" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3">Get Tickets</a>
            <?php } ?>
            </div>
        </div>
    </section>
<?php endif; ?>