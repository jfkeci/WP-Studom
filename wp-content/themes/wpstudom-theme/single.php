
<?php 
get_header();
    echo '<div class="about">
            <div class="container">
                <div class="row">';

if ( have_posts() )
{
    while ( have_posts() )
    {
        the_post();
        
        get_template_part('template-parts/sadržaj', 'vijesti');

    }
}

echo '</div>
</div>
</div>';

get_footer(); 
?>


						
						