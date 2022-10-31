<?php 
$cta_image = get_field('cta_image');
$cta_text = get_field('cta_text');
$cta_section_title = get_field('cta_section_title');
$cta_button_text = get_field('cta_button_text');
$cta_link = get_field('cta_link');
?>
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