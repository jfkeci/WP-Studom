<?php
session_start();

if(!isset($_SESSION['osoba'])){
    function add_last_nav_item($items) {
        return $items .= '<a class="btn" href="http://localhost/studom/login/">Prijava</a>
                            <a class="btn" href="http://localhost/studom/registracija/">Registracija</a>';
    }
    add_filter('wp_nav_menu_items','add_last_nav_item');
}if(isset($_SESSION['osoba'])){
    function add_last_nav_item($items) {
        return $items .= '<a class="btn" href="http://localhost/studom/profil/">Profil</a><a class="btn" href="http://localhost/studom/odjava/">Odjava</a>';
    }
    add_filter('wp_nav_menu_items','add_last_nav_item');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php the_title(); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <?php 
        
        wp_head(); 
        
        ?>

    </head>

    <body>
        <div class="wrapper">
            <div class="header home">
                <div class="container-fluid">
                    <div class="header-top row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="topbar">
                                <div class="topbar-col">
                                    <a href="tel:033 628 817"><i class="fa fa-phone-alt"></i>033 628 817</a>
                                </div>
                                <div class="topbar-col">
                                    <a href="studom@vsmti.hr"><i class="fa fa-envelope"></i>studom@vsmti.hr</a>
                                </div>
                            </div>
                            <div class="navbar navbar-expand-lg bg-light navbar-light">
                                <a href="#" class="navbar-brand">MENU</a>
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
									<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                	    <div class="navbar-nav ml-auto">
											<?php
												$menu_args=
													array(
														'menu' => 'glavni-menu',
														'menu_class' => 'nav-item nav-link', 
														'container' => false,
														'echo' => false,
														'items_wrap' => '%3$s',
														'depth' => 0
													);
													echo strip_tags(wp_nav_menu( $menu_args ), '<a>' );
											?>
										</div>
                                	</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                            <h2>Studentski dom</h2>
                            <h2><span>Virovitica</span></h2>
                            <p>Visoka škola za menadžment u turizmu  informatici</p>
                            <a class="btn" href="http://localhost/studom">STUDOM</a>
							<p>Soba</p>
                        </div>
                    </div>
                </div>
            </div>
			<div class="team">
                <div class="container">
                    <div class="row">
			<?php
			$id=0;
			if ( have_posts() )
			{
			    while ( have_posts() )
				{
					the_post();
					$id=$post->ID;
				}
			}

			?>
			
			<?php
			
			$sImageUrl = get_template_directory_uri().'/images/JednokrevetnaA/thumb.png';

            $sHtml = '<div class="about">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="about-img">
                                            <img src="' . $sImageUrl . '" alt="Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6">
                                        <div class="about-text">
                                            <p>Soba</p>
                                            <table class="table table-bordered">
                                            <thead>
                                                    <tr>
                                                        <th>Broj kreveta</th>
                                                        <th>Tip</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>' . $post->tip_sobe . '</td>
                                                        <td>' . $post->broj_kreveta . '</td>
                                                    </tr>
                                                </tbody>
                                        </table>
                                        '.DajPostKomentare(69,$post->ID).'
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';

            echo $sHtml;

			?>
            			
                    </div>
                </div>
            </div>


            <?php get_footer(); ?>