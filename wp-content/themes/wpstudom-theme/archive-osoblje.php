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
				<h1>Osoblje</h1>
			</section>

            <section id="two" class="wrapper style1 special">
	        	<div class="inner">
	        		<header>
	        			<h2>Uprava</h2>
	        		</header>
	        		<div class="flex flex-4">                    
                    <?php echo DajOsoblje('upravitelj'); ?>
                    </div>
	        	</div>
            </section>
            <section id="two" class="wrapper special">
	        	<div class="inner">
	        		<header>
	        			<h2>Domari</h2>
	        		</header>
	        		<div class="flex flex-4">                    
                    <?php echo DajOsoblje('domar'); ?>
                    </div>
	        	</div>
            </section>
            <section id="two" class="wrapper style1 special">
	        	<div class="inner">
	        		<header>
	        			<h2>Zaštitari</h2>
	        		</header>
	        		<div class="flex flex-4">                    
                    <?php echo DajOsoblje('zastitar'); ?>
                    </div>
	        	</div>
            </section>
            <section id="two" class="wrapper special">
	        	<div class="inner">
	        		<header>
	        			<h2>Čistači</h2>
	        		</header>
	        		<div class="flex flex-4">                    
                    <?php echo DajOsoblje('cistacica'); ?>
                    </div>
	        	</div>
            </section>


<?php 
    get_footer(); 
?>