<?php
/*
Template Name: Register
*/
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- <link rel="stylesheet" href="assets/css/main.css" /> -->
        
        <?php wp_head(); ?>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<nav id="nav">

						<?php
							$menu_args=
								array(
									'container' => false,
									'echo' => false,
									'items_wrap' => '%3$s',
									'depth' => 0
								
								);
							
								echo strip_tags(wp_nav_menu( $menu_args ), '<a>' );
						?>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
            </header>
            <!-- Banner -->
			<section id="banner">
				<h1>Registracija</h1>
            </section>
            <section id="three" class="wrapper special">
				<div class="inner">
					<header class="align-center">
						<h2>Dobrodošli</h2>
					</header>
					<div class="flex flex-2">
						<article>
							<header>
								<h3>Registracija</h3>
							</header>
                            <span><?php /* echo $poruka; */ ?></span>
                            <form method="post">
                                <label>Ime:</label>
                                <input type="text" name="username" id="username" class="MyInput" />
                               
                                <label>Prezime:</label>
                                <input type="password" name="user_password" id="user_password" class="MyInput" />

                                <label>Lozinka</label>
                                <input type="text" name="ime" id="ime" class="form-control" />

                                <label>Adresa:</label>
                                <input type="text" name="ime" id="ime" class="form-control" />

                                <label>Grad:</label>
                                <input type="text" name="ime" id="ime" class="form-control" />

                                <label>Jmbag:</label>
                                <input type="text" name="ime" id="ime" class="form-control" />

                                <label>Ime</label>
                                <input type="text" name="ime" id="ime" class="form-control" />

                                <a style="margin-top:10px" href="#" type="submit" name="login" id="login" class="button special">Registracija</a>
                            </form>
                            <footer>
								
							</footer>
						</article>
						<article>
							<header>
								<h3>Kontakt</h3>
							</header>
							    <p>Studentski dom Virovitica</p>
							    <p>Matije Gupca 78/4</p>
							    <p>33000 Virovitica</p>
							<footer>
								<p>Telefon: 033 628 817</p>
                                <p>Mail: studom@vsmti.hr</p>
                                <?php
                                if ( function_exists( 'the_custom_logo' ) ) {
                                    the_custom_logo();
                                }
                                ?>
							</footer>
						</article>
					</div>
				</div>
            </section>
            
            
            <?php get_footer(); ?>
            


            