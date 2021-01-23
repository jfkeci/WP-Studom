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
								'menu' => 'korisnicki-menu',
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
			<h1><?php the_title(); ?></h1>
			<h3>VŠMTI</h3>
		</section>
			
