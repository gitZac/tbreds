<?php // get_sidebar('left'); ?>

<div class="homepage-page-content col-sm-<?php echo thoroughbreds_main_width(); ?>">
                
                <?php if (have_posts()) : ?>

                    <?php if (is_home() && !is_front_page()) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>

                    <?php $front = get_option('show_on_front'); ?>

                    <?php echo $front == 'posts' ? '<div class="thoroughbreds-blog-content">' : ''; ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                        if ('posts' == get_option('show_on_front')) :
                            get_template_part('template-parts/content-blog', get_post_format());
                        else:
                            get_template_part('template-parts/content-page-home', get_post_format());
                        endif;
                        ?>

                    <?php endwhile; ?>
                    <?php echo $front == 'posts' ? '</div>' : ''; ?>
                    <div class="thoroughbreds-pagination">
                        <?php echo paginate_links(); ?>
                    </div>

                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; ?>            




<?php //get_sidebar(); ?>

            </div>