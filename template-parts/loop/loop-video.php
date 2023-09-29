<?php $videos = new WP_Query( array(
    'post_type' => 'video',							
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy'=>'video__type',
            'field'=> 'slug',
            'terms' => 'barbershop-tag'
        ),
    ),
    'orderby' => 'date',
    'order' => 'DESC'
) ); ?>

<?php if($videos->have_posts() ) { ?>
    <?php while($videos->have_posts() ) : $videos->the_post(); ?>

    <div class="col-sm-6 padding-none">
        <div class="highlights--video--item">
            <div class="highlights--video--item--inner highlights--video--item--inner-vi-ratio">
                <?php the_field('embed_link'); ?>
            </div>
            <div class="highlights--video--content">
                <h4 class="highlights--video--title"><?php the_title(); ?></h4>
                <p class="highlights--video--description"><?php the_field('video_by'); ?></p>   
            </div> <!-- /.card--content -->
        </div> <!-- /.highlights--list-item-->
    </div> <!-- /.col-sm-->
<?php endwhile; wp_reset_postdata();

  } else {

    get_template_part('template-parts/content-none_videos');

  } ?>