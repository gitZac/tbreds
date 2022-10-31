<?php 
$page_title = get_field('page_title');
$description = get_field('description')
?>

<section class="header">
    <div class="container header__container">
        <h1 class="header__text"><?php the_title(); ?></h1>
        <?php if(!empty($description)) : ?>
            <p class="header__desc"><?php echo $description; ?></p>
        <?php endif; ?>
    </div>
</section>
