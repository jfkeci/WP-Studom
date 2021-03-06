<?php
/*
Template Name: Login
*/

session_start();



if (isset($_POST["loginEmail"]) && isset($_POST["loginZaporka"])){

    $poruka = '';
    if (empty($_POST["loginEmail"]) || empty($_POST["loginZaporka"])){
        $poruka = "Morate popuniti oba polja";
        echo "<script type='text/javascript'>alert('$poruka');</script>";
    }
    else{
        $id=doAction(0, $_POST['loginEmail'], $_POST['loginZaporka'], 'login');
        if($id != null){
            $_SESSION['osoba'] = $id;
            header("location: http://localhost/studom/profil/");
        }
    }
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
                                                        'menu_id' => 'mainMenu',
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
                        </div>
                    </div>
                </div>
            </div>


            <div class="contact">
                <div class="container">
                    <div class="section-header">
                        <h2>Prijava</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section-header left">
                                <p>VSMTI</p>
                                <h2>Studentski dom</h2>
                            </div>
                            <div>
                                <p>Studentski dom Virovitica</p>
						        <p>Matije Gupca 78/4</p>
						        <p>33000 Virovitica</p>
                            </div>
                            <div>
                                <p>Telefon: 033 628 817</p>
							    <p>Mail: studom@vsmti.hr</p>
							    <p> <?php echo $zaporka;  ?> </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <label for="loginEmail">Email</label>
                    	                <input id="loginEmail" name="loginEmail" type="email" class="form-control" placeholder="Email" required="required" />
									</div>
                    	            <div class="form-group">
                                    <label for="loginZaporka">Zaporka</label>
                    	                <input  id="loginZaporka" name="loginZaporka" type="password"class="form-control" rows="6" placeholder="Zaporka" required="required" ></input>
                    	            </div>
                                    <div>
                                        <button class="btn" type="submit">Prijava</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php get_footer(); ?>


            
            


            