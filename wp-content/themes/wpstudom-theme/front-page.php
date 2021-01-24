<?php
get_header();
?>
            
            
            <!-- About Start -->
            <div class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <!-- <img src="img/about.jpg" alt="Image"> -->
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="about-text">
                                <!-- <h2><span>10</span> Years Experience</h2> -->
                                <p>
									Studentski dom Virovitica otvoren je 30. kolovoza 2017. godine. Kapacitet Doma, ukupne veličine 2.287,87 m2 je 108 ležajeva. Investitor projekta je Visoka škola za menadžment u turizmu i informatici u Virovitici, a financiranje se temelji na Ugovoru o dodjeli bespovratnih sredstava za projekte financirane iz Europskih strukturnih i investicijskih fondova.
								</p>
								<p>
									Korisnicima Studentskog doma Virovitica smještaj je omogućen u jednokrevetnim i dvokrevetnim sobama. Na raspolaganju su boravak za zajedničko druženje korisnika, informatička učionica te besplatni WiFi u svim prostorijama. Studentski dom Virovitica opremljen je profesionalnim perilicama i sušilicama rublja te uređajima za glačanje.
								</p>
                                <a class="btn" href="">Vidi više</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service">
                <div class="container">
                    <div class="section-header">
                        <p>Novosti</p>
                        <h2>Budite u toku</h2>
                    </div>
                    <div class="row">
                        <?php echo GetNumNovosti(4);?>
                    </div>
                </div>
            </div>

            <div class="team">
                <div class="container">
                    <div class="section-header">
                        <p>Naš Tim</p>
                        <h2>Osoblje</h2>
                    </div>
                    <div class="row">

					<?php  echo GetNumOsoblje(4); ?>
                        
                    </div>
                </div>
            </div>

            <div class="faqs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="section-header left">
                                <p>Ovo bi mogle biti obavijesti</p>
                                <h2>Ali ne šljaka</h2>
                            </div>
                            <img src="img/faqs.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                            <span>1</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                            <span>2</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                            <span>3</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                            <span>4</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                            <span>5</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <a class="btn" href="">Vidi više</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team">
                <div class="container">
                    <div class="section-header">
                        <h2>Dodatni sadržaj</h2>
                    </div>
                    <div class="row">

					<?php  echo GetNumSadrzaj(4); ?>
                        
                    </div>
                </div>
            </div>
            
            <div class="call-to-action">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h2>Zanima vas Visoka Škola?</h2>
                            <p>
                                Posjetite link
                            </p>
                        </div>
                        <div class="col-md-3">
                            <a class="btn" href="https://vsmti.hr/">Ovdje</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blog">
                <div class="container">
                    <div class="section-header">
                        <p>Obavijesti</p>
                        <h2>Budite u toku</h2>
                    </div>
                    <div class="row">
                        
						<?php
						echo GetNumObavijesti(3);
						?>

                    </div>
                </div>
            </div>

<?php

get_footer();

?>
