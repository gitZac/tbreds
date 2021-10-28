<?php

$_terms = get_terms( array ('section') );

foreach ($_terms as $term) :
    
    $term_slug = $term->slug;

    $_posts = new WP_Query( array(
        'post_type' => 'singers',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'section',
                'field' => 'slug',
                'terms' => $term_slug
            ),
            array(
                'taxonomy' => 'membership',
                'field' => 'slug',
                'terms' => 'thoroughbreds'
            ),
        ),
    ) );

    if($_posts->have_posts() ) : ?>

        <section class="content profile">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2 class="section__title--title"><?php echo $term->name; ?></h2>
                    </div>
                </div>    
            </div>
            <div class="row">

                <?php while($_posts->have_posts() ) : $_posts->the_post(); ?>


                    <article class="catcard col-md-3">
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
                    </article>


                <?php endwhile; ?>

            </div>

        </section>

    <?php
        endif;
        wp_reset_postdata();

    endforeach;

    ?>