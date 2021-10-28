<?php
/***
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package thoroughbreds
 */
get_header();
$map = get_field('event_directions');
$event_content = get_field('event_page_content');
$ticket_price = get_field('event_ticket-price');
$date = get_field('event_date');
$time = get_field('event_time');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php get_template_part('template-parts/modules/hero-inner'); ?>

        <div class="row">
            
            <div class="col-sm-<?php echo thoroughbreds_main_width(); ?>">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="upcoming_events__header entry-header">
                        <h2 class="upcoming_events__date color-primary"><?php echo $date; ?>, <span class="upcoming_events__time"><?php echo $time; ?></span></h2>
                        
                        <p class="upcoming_events__location">
                            <?php the_field('event_location'); ?> 
                            
                            <?php if($map) :  ?> 
                                <a target="_blank" href="<?php the_field('event_directions'); ?>" class="upcoming_events__directions-link">(Click Here For Directions!)
                                </a>
                            <?php endif; ?>
                        <p>
                        <p class="upcoming_events__price"><?php echo $ticket_price; ?></p>
                    </header><!-- .entry-header -->

                    <div class="upcoming_events__content entry-content ">
                        <?php echo $event_content; ?>
                    </div><!-- .entry-content -->

                    <?php the_post_navigation(); ?>

                </article>

            </div>
            
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
