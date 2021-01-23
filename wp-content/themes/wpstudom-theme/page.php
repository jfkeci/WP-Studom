<?php
get_header();
?>

<main>

<?php

    echo '<section id="three" class="wrapper special">
				<div class="inner">
					<header class="align-center">
						<h2>Studom</h2>
						<p>VŠMTI</p>
					</header>
					<div class="flex flex-2">';
    if ( have_posts() )
    {
        while ( have_posts() )
        {


            the_post();
            $sIstaknutaSlika = "";
            if( get_the_post_thumbnail_url($post->ID) )
            {
                $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
            }
            else
            {
                $sIstaknutaSlika = get_template_directory_uri(). '/img/home-bg.jpg';
            }

        }
        echo'<article>
		<header>
			<a class=""><h3>'.the_title().'</h3></a>
		</header>
        <p>'.nl2br(the_content()).'</p>
        </article>
	    <article>
            <img style="width:500px" class="" src="'.$sIstaknutaSlika.'" alt="">
        </article></article>
        </div>
        </div>
        </section>';
    }

?>

</main>

<?php
get_footer();
?>