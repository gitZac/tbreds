<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thoroughbreds
 */
?>

<div class="container-fluid">

<?php if (get_post_thumbnail_id($post->ID) && has_post_thumbnail() ) : ?>
    <section class="hero">
        <div class="hero__image" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>);"></div>
        <div class="hero__shade"></div>
        <div class="hero__content">
            <div class="hero__title ">
                <h1 class="margin-0"><?php the_title(); ?></h1>
            </div>
            <div class="hero__subtitle">
                <?php //the_field('event_date'); ?>
            </div>
        </div>
    </section>

<?php endif; ?>

</div>

<div class="container">
    <section class="section margin-none">
        <div class="row">
            <div class="section-title margin-none">
                <h2 class="section__title--title-nb"><?php the_field('secondary_title');?></h2>
            </div><!-- /.section-title-->
        </div>
    </section>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">

        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'thoroughbreds'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <?php 
    $subpages = new WP_Query(array(
        'post_type' => 'page',
        'post_parent' => $post->ID,
        'posts_per_page' => -1,
        'orderby' => 'menu_order'
    ));?>

    <?php if($subpages->have_posts() ) : ?>
        <section class="child-list">
            <h3>Read More</h3>
            <ul>
                <?php while( $subpages->have_posts() ) : $subpages->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul> 
        </section>
    <?php endif; ?>

    </article><!-- #post-## -->

</div>

