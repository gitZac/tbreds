<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thoroughbreds
 */
get_header();

?>

<?php 
    $_term = get_queried_object('quartet');

    $obj_id = get_queried_object_id();
    $current_url = get_term_link( $obj_id ) . '#topshow';

    $tagline = get_field('group_tag_line', $_term); 
    $content = get_field('page_content_group', $_term);
    $image = get_field('header_image_group', $_term);
    $cta_image_quartet = get_field('cta_image_group', $_term);
    $cta_text = get_field('cta_text', $_term);
    $cta_link = get_field('cta_link', $_term);
    $booking_description = get_field('booking_description', $_term);

    $current_taxonomy = array(
        'taxonomy'=>'quartet',
        'field'=> 'slug',
        'terms' => $_term
    );

    $videos = new WP_Query( array(
        'post_type' => 'video',							
        'tax_query' => array(
            'relation' => 'OR',
            $current_taxonomy
        ),
    ) ); 

    $events = new WP_Query( array(
        'post_type' => 'upcoming_events',							
        'tax_query' => array(
            'relation' => 'OR',
            $current_taxonomy
        ),
    ) ); 

    $singers = new WP_Query( array(
        'post_type' => 'singers',							
        'tax_query' => array(
            'relation' => 'OR',
            $current_taxonomy
        ),
    ) ); 
?>

<div class="container-fluid">
    <section class="hero">
        <div class="hero__image" style="background-image:url(<?php echo $image['url']; ?>);"></div>
        <div class="hero__shade"></div>
        <div class="hero__content">
            <div class="hero__title ">
                <h1 class="margin-0"><?php single_term_title(); ?></h1>
            </div>
            <div class="hero__cta">
                <a href="#booking" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3">Book <?php single_term_title(); ?></a>
                <?php if($events->have_posts()) : ?>
                <a href="#topshow" class="thoroughbreds-button secondary small animated flipInX slide2_button1 delay3">Our Next Performance</a>
                <?php endif; ?>

            </div>
        </div>
    </section>
</div>

<div class="container-fluid">
    <section class="content section">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2 class="section__title--title"><?php echo $tagline  ?></h2>
                    <?php echo $content; ?>
                </div>
            </div>    
        </div>
    </section>

    <!-- Profile Card Loop -->

    <?php if($singers->have_posts()) :  ?>

    <section class="singers section">
        <div class="row">
            <h2 class="header__secondary--line">Meet <?php single_term_title(); ?></h2> 
        </div>
        <div class="row">
            <?php get_template_part( 'template-parts/content-singers'); ?>
        </div>
    </section>

    <?php endif; ?>

    <?php if($events->have_posts()) :  ?>

    <!-- Event Loop -->
    <section class="callouts section">
        <div class="row">
            <h2 class="header__secondary--line">Hear us sing!</h2> 
        </div>
        <div class="row"> <a id="topshow"></a>
            <?php get_template_part('template-parts/loop/loop-events-lp'); ?>
        </div>
    </section>

    <?php endif; ?>

    <!-- Video Loop -->

    <?php if($videos->have_posts()) :  ?>

    <section class="videos  section">
        <div class="row">
            <h2 class="header__secondary--line">Newest Videos</h2> 
        </div> 
        <div class="row">
            <?php get_template_part( 'template-parts/loop/loop-video-lp'); ?>
        </div>
    </section>

    <?php endif; ?>

    <!-- Booking -->

    <section id="booking" class="booking section">
        <div class="row">
            <h2 class="header__secondary--line">Book <?php single_term_title(); ?>!</h2> 
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="callouts--card">
                    <div class="callouts--card--image" style="background-image:url(<?php echo $cta_image_quartet['url']; ?>);">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="callouts--card">
                    <div class="callouts--card--content--right">
                        <h4 class="callouts--card--title--right">Contact us to learn more!</h4>
                        <div class="callouts--card--dates"></div>
                        <p class="callouts--card--description"><?php echo $booking_description; ?></p>
                        <div class="callouts--card--link">
                            <a href="<?php echo $cta_link; ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3"><?php echo $cta_text; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
</div><!-- ./container-fluid -->

<?php get_footer(); ?>


<script>

    const sections = document.querySelectorAll(".section");

    for (i = 0; i < sections.length; i++){
        if(i % 2 !== 0){
            sections[i].classList.add('bg-gray-light');
        }
    }

</script>