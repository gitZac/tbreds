<?php
// Get all the categories
$categories = get_terms( 'quartet' ); ?>



<div class="highlights--list">
    <div class="row row--full-width ">

        <?php // Loop through all the returned terms
        foreach ( $categories as $category ) :

        $image = get_field('header_image_group', $category);
        $termlink = get_term_link( $category );

        ?>
        
        <div class="col-sm-4 padding-none">
            <div class="highlights--list--item">
                <a href="<?php echo $termlink; ?>" class="highlights--card">
                    <div style="background-image:url(<?php echo $image['url']; ?>);" class="highlights--card--image"></div>
                    <div class="highlights--card--shade"></div>
                    <div class="highlights--card--content">
                        <strong class="highlights--card--title"><?php echo $category->name; ?></strong>
                        <!-- <em class="highlights--card--subtitle">subtitle</em> -->
                    </div>
                </a>
            </div> <!-- /.highlights--list-item-->
        </div> <!-- /.col-sm-->
        <?php endforeach; ?>
    </div> <!-- /.row--full-width-->
</div> <!-- /.highlights--list-->

