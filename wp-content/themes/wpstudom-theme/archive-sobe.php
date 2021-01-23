<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<script>
		
		function openFloor(kat) {
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
				<h1>fdsafdas</h1>
			</section>

			<div class="tab">
            	<button class="tablinks" id="sve" onclick="openFloor('Sve');">Sve Sobe</button>
            	<button class="tablinks" onclick="openFloor('Prizemlje');">Prizemlje</button>
            	<button class="tablinks" onclick="openFloor('PrviKat');">Prvi Kat</button>
            	<button class="tablinks" onclick="openFloor('DrugiKat');">Drugi Kat</button>
            	<button class="tablinks" onclick="openFloor('Administracija');">Sve sobe Tablica</button>
         	</div>

			<?php /* echo DajSobe(); */ ?>



<?php 
    get_footer(); 
?>