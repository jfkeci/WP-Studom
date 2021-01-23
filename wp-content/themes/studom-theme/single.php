
<?php 
get_header();
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
        
        get_template_part('template-parts/sadržaj', 'vijesti');

    }
}

echo '</article>
</div>
</div>
</section>
';

get_footer(); 
?>


						
						