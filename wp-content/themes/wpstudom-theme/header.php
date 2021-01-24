<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php the_title(); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <!-- Favicon -->
        <?php the_custom_logo(); ?>

		<?php wp_head(); ?>

    </head>

    <body>
        <div class="wrapper">
            <!-- Header Start -->
            <div class="header home">
                <div class="container-fluid">
                    <div class="header-top row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand">
                                <!-- <a href="index.html">
                                    CleanMe
                                   <img src="img/logo.png" alt="Logo">
                                </a> -->
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
                                <div class="topbar-col">
                                    <div class="topbar-social">
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-youtube"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
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
                                <!-- <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav ml-auto">
                                        <a href="index.html" class="nav-item nav-link active">Home</a>
                                        <a href="about.html" class="nav-item nav-link">About</a>
                                        <a href="service.html" class="nav-item nav-link">Service</a>
                                        <a href="portfolio.html" class="nav-item nav-link">Project</a>
                                        <a href="single.html" class="nav-item nav-link">Single</a>
                                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Sub Item 1</a>
                                                <a href="#" class="dropdown-item">Sub Item 2</a>
                                            </div>
                                        </div>
                                        <a href="#" class="btn">Login</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                            <h2>Studentski dom</h2>
                            <h2><span>Virovitica</span></h2>
                            <p>Visoka škola za menadžment u turizmu  informatici</p>
                            <a class="btn" href="http://localhost/studom">STUDOM</a>
                        </div>
                        <!-- <div class="col-md-5">
                            <div class="form">
                                <h3>Get A Quote</h3>
                                <form>
                                    <input class="form-control" type="text" placeholder="Your Name">
                                    <input class="form-control" type="text" placeholder="Mobile Number">
                                    <div class="control-group">
                                        <select class="custom-select">
                                            <option selected>Choose a service</option>
                                            <option value="1">House Cleaning</option>
                                            <option value="2">Apartment Cleaning</option>
                                            <option value="3">Office Cleaning</option>
                                        </select>
                                    </div>
                                    <textarea class="form-control" placeholder="Comment"></textarea>
                                    <button class="btn btn-block">Get A Quote</button>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- Header End -->