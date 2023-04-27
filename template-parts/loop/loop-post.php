<?php
    $args = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'date'
    ) );
?>

<div class="row">

    <?php $articles = new WP_Query($args); while($articles->have_posts()): $articles->the_post(); $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

        <div class="col-sm-6">
            <div class="callouts--card">
                <div class="callouts--card--image callouts--card--image--mb0    " style="background-image:url(<?php echo $thumbnail[0]; ?>);">
                </div>
                <p class="callouts__post-date"><?php echo get_the_date('l F j, Y' ); ?></p>
                <div class="callouts--card--content">
                    <h4 class="callouts--card--title"><?php the_title(); ?></h4>
                    <p class="callouts--card--description"><?php the_excerpt(); ?></p>
                    <div class="callouts--card--link">
                        <a href="<?php the_permalink() ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3">Read More</a>
                    </div>
                </div>
            </div>
        </div>


    <?php endwhile; ?>

</div>
