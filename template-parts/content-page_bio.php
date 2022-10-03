<?php 
$page_title = get_field('page_title');
$bio_image = get_field('bio_image');
$bio_text = get_field('bio_text');
$cta_image = get_field('cta_image');
$cta_text = get_field('cta_text');
$cta_section_title = get_field('cta_section_title');
$cta_button_text = get_field('cta_button_text');
$cta_link = get_field('cta_link');
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

            <div class="about-us__container col-lg-6 d-flex flex-column justify-content-center">
                <div class="about-us__content">
                    <p class="about-us__text"><?php echo $bio_text; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about">
    <div class="row">
        <div class="col-sm-12">
            <div class="section-title">
                <h2 class="section__title--title"><?php echo $cta_section_title; ?></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 about__video-box">
            <img src="<?php echo $cta_image; ?>">
        </div>
        <div class="col-lg-6 about__text flex">
            <p class="text-left font-italic color-default-light">
                <?php echo $cta_text; ?>
            </p>
            <div class="about__cta">
                <a href="<?php echo $cta_link; ?>" class="thoroughbreds-button primary small animated flipInX slide2_button1 delay3"><?php echo $cta_button_text; ?></a>
            </div>   
        </div>

    </div>
</section>