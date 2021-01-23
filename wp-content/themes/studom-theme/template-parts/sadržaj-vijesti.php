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


<article>
	<header>
		<a class=""><h3><?php echo the_title(); ?></h3></a>
	</header>
    <p><?php the_content(); ?></p>
    
</article>
<article>
    <img style="width:500px; margin-top:80px;" class="" src="<?php echo $sIstaknutaSlika ?>" alt="">
    <footer>
        <p>Datum: <?php the_date(); ?></p>
    </footer>
</article>
