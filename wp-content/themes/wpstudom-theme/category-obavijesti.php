<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php the_title(); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <?php the_custom_logo(); ?>

		<?php wp_head(); ?>

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
							<p>Obavijesti</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="feature">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="section-header left">
                                <p>Obavijesti</p>
                                <h2>Budite u toku</h2>
                            </div>
                            <p>
                            Studentski dom Virovitica otvoren je 30. kolovoza 2017. godine. Kapacitet Doma, ukupne veličine 2.287,87 m2 je 108 ležajeva. Investitor projekta je Visoka škola za menadžment u turizmu i informatici u Virovitici, a financiranje se temelji na Ugovoru o dodjeli bespovratnih sredstava za projekte financirane iz Europskih strukturnih i investicijskih fondova.

                            Korisnicima Studentskog doma Virovitica smještaj je omogućen u jednokrevetnim i dvokrevetnim sobama. Na raspolaganju su boravak za zajedničko druženje korisnika, informatička učionica te besplatni WiFi u svim prostorijama. Studentski dom Virovitica opremljen je profesionalnim perilicama i sušilicama rublja te uređajima za glačanje.</p>
                            <a class="btn" href="http://localhost/studom">Studom</a>
                        </div>
                        <div class="col-md-7">
                            <?php
                
                            echo GetObavijesti();
                                                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            

			<?php get_footer(); ?>