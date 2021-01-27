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
                            <a class="btn" href="http://localhost/studom">STUDOM</a>,
							<p>Sobe</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio">
                <div class="container">
                    <div class="section-header">
                        <h2>Naše sobe</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul id="portfolio-flters">
                                <li data-filter="*" >Sve</li>
                                <li data-filter=".prizemlje" >Prizemlje</li>
                                <li data-filter=".prvi" class="filter-active">Prvi kat</li>
                                <li data-filter=".drugi" >Drugi kat</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row portfolio-container">
                    <?php

                        $lSobe = array();

                        $args = array(
                            'posts_per_page' => - 1,
                            'post_type' => 'soba',
                            'post_status' => 'publish'
                        );
                    
                        $lSobe = get_posts($args);
                    
                        $sKat='';
                        $sThumbnailSoba = '';

                        $sHtml = '';

                        $sImageUrl = get_template_directory_uri().'/images/JednokrevetnaA/thumb.png';

                        $stringYellow = 'background-color:yellow';
                        $stringRed = 'background-color:red';
                        $stringGreen = 'background-color:green';
                        $colorString='';

                        $sKatSobe ='';

                        foreach ($lSobe as $soba)
                        {
                            $lKat = wp_get_post_terms($soba->ID, 'kat');
                            foreach ($lKat as $kat)
                            {
                                $sKatSobe = $kat->name;
                            }

                            $status = ProvjeriKapacitetSobe($soba);
                            if($status == 0){
                                $colorString = $stringGreen;
                            }
                            
                            if($status == 1 && strtolower($soba->tip_sobe) == 'jednokrevetna'){
                                $colorString = $stringRed;
                            }

                            if($status == 1 && strtolower($soba->tip_sobe) == 'dvokrevetna'){
                                $colorString = $stringYellow;
                            }
                            if($status == 2 && strtolower($soba->tip_sobe) == 'dvokrevetna'){
                                $colorString = $stringRed;
                            }
                            if(strtolower($soba->tip_sobe) == 'jednokrevetna'){
                                $sImageUrl = get_template_directory_uri().'/images/JednokrevetnaA/thumb.png';
                            }
                            if(strtolower($soba->tip_sobe) == 'dvokrevetna'){
                                $sImageUrl = get_template_directory_uri().'/images/DvokrevetnaA/thumb.png';
                            }
                                $sHtml .= '<div class="col-lg-4 col-md-6 col-sm-12 portfolio-item ' . strtolower($sKatSobe) . '">
                                                <div class="portfolio-wrap">
                                                    <figure>
                                                        <img src="'.$sImageUrl.'" alt="">
                                                        <a href="' . $sImageUrl . '" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                                        <a href="' . $soba->guid . '" class="link-details"><i class="fa fa-link"></i></a>
                                                        <a style="'.$colorString.';" class="portfolio-title" href' . $soba->guid . '">' . $soba->post_title . ' - ' . $sKatSobe . '</a>
                                                        <p>Tip sobe: ' . $soba->tip_kupaonice . '</p>
                                                        <p>Broj kreveta ' . $soba->tip_sobe . '</p>
                                                    </figure>
                                                </div>
                                            </div>';
                        }
                        echo $sHtml;

                        ?>

                    </div>
                </div>
            </div>
			<?php get_footer(); ?>