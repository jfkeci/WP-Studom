<?php
session_start();

if(!isset($_SESSION['osoba'])){
    function add_last_nav_item($items) {
        return $items .= '<a class="btn" href="http://localhost/studom/login/">Prijava</a>
                            <a class="btn" href="http://localhost/studom/registracija/">Registracija</a>';
    }
    add_filter('wp_nav_menu_items','add_last_nav_item');
}if(isset($_SESSION['osoba']) && session_id() != ''){
    function add_last_nav_item($items) {
        return $items .= '<a class="btn" href="http://localhost/studom/profil/">Profil</a>';
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
							<p>Član osoblja</p>
                        </div>
                    </div>
                </div>
            </div>
                    
			<div class="team">
                <div class="container">
                    <div class="row">
								<?php
										if (have_posts())
										{
											while ( have_posts())
											{	
												$mjestoRada = '';
												$sThumbnailOsoblje = '';
												the_post();

												$sHtml = '';
												
												$lMjestoRada = wp_get_post_terms($post->ID, 'mjesto_rada');
        										foreach ($lMjestoRada as $mjesto)
        										{
        										    $mjestoRada = $mjesto->name;
                                                }
                                                
        										if (get_the_post_thumbnail_url($post->ID))
        										{
        										    $sThumbnailOsoblje = get_the_post_thumbnail_url($post->ID);
        										}
        										else
        										{
        										    $sThumbnailOsoblje = get_template_directory_uri() . '/images/profile.png';
        										}
													
    											$sHtml .= '<div class="col-md-6">
    											                <div class="section-header left">
    											                    <p>Student</p>
    											                    <table class="table table-bordered">
    											                    <thead>
    											                            <tr>
    											                                <th>Godina</th>
    											                                <th>Kat dežurstva</th>
    											                            </tr>
    											                        </thead>
    											                        <tbody>
    											                            <tr>
    											                                <td>' . $mjestoRada . '</td>
    											                                <td>' . $post->kat_dezurstva . '</td>
                                                                            </tr>
    											                        </tbody>
    											                    </table>
    											                </div>
    											            </div>
    											            <div class="col-lg-3 col-md-6">
    											                <div class="team-item">
    											                    <div class="team-img">
    											                        <img src="' . $sThumbnailOsoblje.'" alt="">
    											                    </div>
    											                    <div class="team-text">
    											                        <h3>' . $post->post_title . '</h3>
    											                        <p></p>
    											                        <p>Grad: ' . $post->grad_osoblja . '</p>
    											                    </div>
																</div>
																</div>
																</div>';

    											echo $sHtml;
											}
										}
								?> 
                        </div>
                    </div>
                </div>
            </div>



            <?php get_footer(); ?>