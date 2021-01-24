<?php

$sIstaknutaSlika = "";
if( get_the_post_thumbnail_url($post->ID) )
{
    $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
}
else
{
    $sIstaknutaSlika = get_template_directory_uri(). '/img/home-bg.jpg';
}
?>


<div class="col-lg-5 col-md-6">
    <div class="about-img">
        <img src="<?php echo $sIstaknutaSlika ?>" alt="">
    </div>
</div>
<div class="col-lg-7 col-md-6">
    <div class="about-text">
        <h2><?php echo the_title(); ?></h2>
        <p>
            <?php the_content(); ?>
        </p>
        <a class="btn" href="">Datum: <?php the_date(); ?></a>
    </div>
</div>
