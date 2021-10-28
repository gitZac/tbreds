<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thoroughbreds
 */
?>

<?php if (get_post_thumbnail_id($post->ID)) : ?>
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

<div class="row">
    
    <?php get_sidebar('left'); ?>
    
    <div class="col-sm-<?php echo thoroughbreds_main_width(); ?>">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2 class="section__title--title"><?php the_field('secondary_title');?></h2>
                        </div><!-- /.section-title-->
                    </div>
                </div>
            <div class="entry-content">
                <?php the_content(); ?>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'thoroughbreds'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->
            </div>


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
    
    <?php get_sidebar(); ?>

</div>