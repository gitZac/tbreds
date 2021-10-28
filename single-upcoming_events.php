<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package thoroughbreds
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">



        <?php get_template_part('template-parts/modules/hero-inner'); ?>

        <div class="row">
            
            <div class="col-sm-<?php echo thoroughbreds_main_width(); ?>">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="upcoming_events__header entry-header">
                        <h2 class="upcoming_events__date color-primary"><?php the_field('event_date'); ?>, <span class="upcoming_events__time"><?php the_field('event_time') ?></span></h2>
                        
                        <p class="upcoming_events__location">
                            <?php the_field('event_location'); ?> 
                            
                            <?php $map = get_field('event_directions'); if ($map) :  ?> 
                                <a target="_blank" href="<?php the_field('event_directions'); ?>" class="upcoming_events__directions-link">(Click Here For Directions!)
                                </a>
                            <?php endif; ?>
                        <p>
                        <p class="upcoming_events__price"><?php the_field('event_ticket-price');?></p>
                    </header><!-- .entry-header -->

                    <div class="upcoming_events__content entry-content ">
                        <?php the_field('event_page_content'); ?>
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'thoroughbreds'),
                            'after' => '</div>',
                        ));
                        ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php thoroughbreds_entry_footer(); ?>
                    </footer><!-- .entry-footer -->

                    <?php the_post_navigation(); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                </article><!-- #post-## -->

            </div>
            
            <?php //get_sidebar(); ?>

        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
