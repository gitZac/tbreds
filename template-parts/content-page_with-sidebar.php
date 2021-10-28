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

<div class="section">
    <div class="row">
        <div class="section-title">
            <h2 class="section__title--title"><?php the_field('secondary_title');?></h2>
        </div><!-- /.section-title-->
    </div>
</div>

<div class="row">
    
    <?php get_sidebar('left'); ?>
    
    <div class="col-sm-<?php echo thoroughbreds_main_width(); ?>">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



            <div class="entry-content">

                <?php if (!get_post_thumbnail_id($post->ID)) : ?>

                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->

                <?php endif; ?>


                <?php the_content(); ?>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'thoroughbreds'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php
                edit_post_link(
                        sprintf(
                                /* translators: %s: Name of current post */
                                esc_html__('Edit %s', 'thoroughbreds'), the_title('<span class="screen-reader-text">"', '"</span>', false)
                        ), '<span class="edit-link">', '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->



        </article><!-- #post-## -->
    </div>

    <?php get_sidebar(); ?>

</div>

