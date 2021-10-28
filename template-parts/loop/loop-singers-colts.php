<?php
$_term = get_queried_object('quartet');

$_posts = new WP_Query( array(
    'post_type' => 'singers',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'membership',
            'field' => 'slug',
            'terms' => $_term
        ),
    ),
) ); 

if($_posts->have_posts() ) : ?>

<?php while($_posts->have_posts() ) : $_posts->the_post(); ?>

<article class="catcard col-md-3">
    <a href="<?php the_permalink(); ?>">
        <div class="catcard__inner">
            <div class="catcard__upper">
                <div class="catcard__cat-image">
                    <?php the_post_thumbnail(); ?>
                    <div class="catcard__title-wrapper">
                        <h4 class="catcard__title"><?php the_title(); ?></h4>
                    </div>
                </div><!--./catcard-cat-image-->
            </div> <!--./catcard-upper-->
            <!-- <div class="catcard__lower">
                <div class="catcard__content">
                    <?php //the_excerpt(); ?>
                </div>
            </div> -->
        </div><!--./catcard-inner-->
    </a>
</article>

<?php endwhile; endif; wp_reset_postdata();?>