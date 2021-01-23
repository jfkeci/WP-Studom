<?php
/*
Template Name: Login
*/

if (isset($_COOKIE["osoba"]))
{
    //
}

$poruka = '';
$passStatus = 0;
$userStatus = 0;

$lStudenti = DajListuStudenata();
//$lOsoblje = DajListuOsoblja();

if (isset($_POST["login"]))
{
    if (empty($_POST["user_email"]) || empty($_POST["user_password"]))
    {
        $poruka = "<div class='alert alert-danger'>Morate popuniti oba polja</div>";
    }else
    {
        foreach($lStudenti as $student){
            if ($_POST["user_email"] == $student->get_email())
            {
                $userStatus = 1;
            }
            if ($_POST["user_password"] == $student->get_student_zaporka())
            {
                $passStatus = 1;
            }
            if ($userStatus == 1)
            {
                if($passStatus==1){
                    SetMyCookie($student->get_student_post_id());
                    $passStatus = 0;
                    $userStatus = 0;
                break;
                }
            }
        }
        /* foreach($lOsoblje as $clan){
            if ($_POST["user_email"] == $clan->get_email())
            {
                $userStatus = 1;
            }
            if ($_POST["user_password"] == $clan->get_student_zaporka())
            {
                $passStatus = 1;
            }
            if ($userStatus == 1)
            {
                if($passStatus==1){
                    setcookie("osoba", $clan->get_student_post_id(), time() + 3600);
                    $passStatus = 0;
                    $userStatus = 0;
                break;
                }
            }
        } */
        if ($userStatus == 0)
        {
            $poruka = "<div class='alert alert-danger'>Pogrešno korisničko ime</div>";
        }
        if ($passStatus == 0)
        {
            $poruka = "<div class='alert alert-danger'>Pogrešna zaporka</div>";
        }
        if ($passStatus == 0 && $userStatus == 0)
        {
            $poruka = "<div class='alert alert-danger'>Pogrešni podaci</div>";
        }
    }
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php wp_head(); ?>
	</head>
	<body>
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
			<h1>Prijava</h1>
        </section>
        <section id="three" class="wrapper special">
			<div class="inner">
				<header class="align-center">
					<h2>Dobrodošli</h2>
				</header>
				<div class="flex flex-2">
					<article>
                        <!-- <div class="image fit">
							<img src="images/logo.png" alt="Pic 02" />
						</div> -->
						<header>
							<h3>Login</h3>
						</header>
                        <span><?php echo $poruka; ?></span>
                        <form method="post">
                              <label>Email:</label>
                              <input type="text" name="user_email" id="user_email" class="MyInput" />
                           
                              <label>Lozinka:</label>
                              <input type="password" name="user_password" id="user_password" class="MyInput" />
                              <a style="margin-top:10px" href="#" type="submit" name="login" id="login" class="button special">Prijava</a>
                        </form>
					</article>
					<article>
                        <div class="image fit">
							<img src="images/pic02.jpg" alt="Pic 02" />
						</div>
						<header>
							<h3>Kontakt</h3>
						</header>
						    <p>Studentski dom Virovitica</p>
						    <p>Matije Gupca 78/4</p>
						    <p>33000 Virovitica</p>
						<footer>
							<p>Telefon: 033 628 817</p>
							<p>Mail: studom@vsmti.hr</p>
						</footer>
					</article>
				</div>
			</div>
		</section>

            
            <?php get_footer(); ?>


            
            


            