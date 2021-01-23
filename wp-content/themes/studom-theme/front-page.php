<?php get_header(); ?>

	
<!-- One -->
	<section id="one" class="wrapper">
		<div class="inner">
            <header>
				<h2>Obavijesti</h2>
			</header>
			<div class="flex flex-3">
				<?php echo GetNumObavijesti(3); ?>
			</div>
		</div>
	</section>

	<section id="two" class="wrapper style1 special">
		<div class="inner">
			<header>
				<h2>Osoblje</h2>
				<p>Naš tim</p>
			</header>
			<div class="flex flex-4">
				<?php echo GetNumOsoblje(4); ?>
			</div>
		</div>
    </section>

    <section id="three" class="wrapper special">
		<div class="inner">
			<header class="align-center">
				<h2>Studom</h2>
				<p>VŠMTI</p>
			</header>
			<?php echo GetNumNovosti(4); ?>
		</div>
	</section>

	<section id="two" class="wrapper style1 special">
		<div class="inner">
			<header>
				<h2>Dodatni sadržaji</h2>
			</header>
			<div class="flex flex-4">
				<?php echo GetNumSadrzaj(4); ?>
			</div>
		</div>
    </section>


<?php get_footer(); ?>
         