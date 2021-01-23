<?php

/*
Template Name: Sobe
*/

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<script>
		
		function openFloor(kat) {
			console.log(kat);
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(kat).style.display = "block";
		}
		
		</script>
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
				<h1>Sobe</h1>
			</section>
			<section id="three" class="wrapper special">
				<div class="inner">
					<div class="flex flex-2">
						<div class="tab">
            				<button style="margin-left:10px; margin-top:10px;" class="tablinks" id="sve" onclick="openFloor('Sve');">Sve Sobe</button>
            				<button style="margin-left:10px; margin-top:10px;" class="tablinks" onclick="openFloor('Prizemlje');">Prizemlje</button>
            				<button style="margin-left:10px; margin-top:10px;" class="tablinks" onclick="openFloor('PrviKat');">Prvi Kat</button>
            				<button style="margin-left:10px; margin-top:10px;" class="tablinks" onclick="openFloor('DrugiKat');">Drugi Kat</button>
            				<button style="margin-left:10px; margin-top:10px;" class="tablinks" onclick="openFloor('Tablica');">Tablica</button>
            			</div>
					</div>
				</div>
			</section>

			<div id="Sve" class="tabcontent">
			<?php DajSobePoKatu(3); ?>
			</div>
			<div id="Prizemlje" class="tabcontent">
			<?php DajSobePoKatu(1); ?>
			</div>
			<div id="PrviKat" class="tabcontent">

			<?php DajSobePoKatu(2); ?>

			</div>
			<div id="DrugiKat" class="tabcontent">
			<?php DajSobePoKatu(3); ?>
			</div>
			<div id="Tablica" class="tabcontent">
			<?php /* DajSobe(); */ ?>
			</div>



<?php 
    get_footer(); 
?>