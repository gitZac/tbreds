<?php 
$page_title = get_field('page_title');
$bio_image = get_field('bio_image');
$bio_text = get_field('bio_text');
?>

<section class="header">
    <div class="container">
        <h1 class="header__text"><?php echo $page_title; ?></h1>
    </div>
</section>

<section class="about-us">
    <div class="container">
        <div class="about-us__row row no-gutters">
            <div class="col-lg-6 about-us__image-box">
                <img class="about-us__img" src="<?php echo $bio_image; ?>" alt="">
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <div class="about-us__content">
                    <p class="about-us__text"><?php echo $bio_text; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>