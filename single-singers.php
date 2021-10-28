<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package thoroughbreds
 */
get_header();

$_mterms = get_the_terms( $post->ID, 'membership' , array( 'fields' => 'names' ) );

$_sterms = get_the_terms( $post->ID, 'section' , array( 'fields' => 'names' ) );

$_qterms = get_the_terms( $post->ID, 'quartet' , array( 'fields' => 'names' ) );



?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container center-content">
            <div class="profile">
                <h1 class="header__page-title text-center"><?php the_title(); ?></h1>
                <div class="profile__upper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profile__image">
                                <?php the_post_thumbnail();?>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="profile__content">
                                <?php while(have_posts() ) : the_post(); ?>
                                    <?php the_content(); ?>
                                <?php endwhile; ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <ul class="profile__groups">
            <h4 class="margin-0 profile__groups--title">Singing Part</h4>
            <?php foreach ($_sterms as $_sterm) : ?>
                <li class="profile__groups--item"><?php echo $_sterm->name; ?></li>
            <?php endforeach; ?>
            <h4 class="margin-0 profile__groups--title">Quartets</h4>
            <?php foreach ($_qterms as $_qterm) : ?>
                <li class="profile__groups--item"><?php echo $_qterm->name; ?></li>
            <?php endforeach; ?>
            <h4 class="margin-0 profile__groups--title">Other Groups</h4>
            <?php foreach ($_mterms as $_mterm) : ?>
                <li class="profile__groups--item"><?php echo $_mterm->name; ?></li>
            <?php endforeach; ?>
        </ul>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
