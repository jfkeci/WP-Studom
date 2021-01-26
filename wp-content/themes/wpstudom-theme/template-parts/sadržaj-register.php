<?php
get_header();

?>

            <div class="contact">
                <div class="container">
                    <div class="section-header">
                        <p>Ostvarite priliku stanovanja u našem studentskom domu</p>
                        <h2>Registrirajte se</h2>
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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                    	        <form method="post">
                    	            <div class="form-row">
                    	                <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Ime</label>
                    	                    <input name="registerIme" id="registerIme" type="text" class="form-control" placeholder="Ime"  />
                    	                </div>
                    	                <div class="form-group col-md-6">
                                        <label for="registerPrezime">Prezime</label>
                    	                    <input name="registerPrezime" id="registerPrezime" type="text" class="form-control" placeholder="Prezime"  />
                    	                </div>
                    	            </div>
                    	            <div class="form-group">
                                    <label for="registerEmail">Email</label>
                    	                <input name="registerEmail" id="registerEmail" type="email" class="form-control" placeholder="Email"  />
                    	            </div>
									<div class="form-group">
                                    <label for="registerBrojMobitela">BrojMobitela</label>
                    	                <input name="registerBrojMobitela" id="registerBrojMobitela" type="tel" placeholder="099-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" placeholder="Broj mobitela"  />
                    	            </div>
                    	            <div class="form-group">
                                    <label for="registerZaporka">Zaporka</label>
                    	                <input  name="registerZaporka" id="registerZaporka" type="password"class="form-control" rows="6" placeholder="Zaporka"  ></input>
                    	            </div>
									<div class="form-row">
                    	                <div class="form-group col-md-6">
                                        <label for="registerDatumRođenja">DatumRođenja</label>
                    	                    <input name="registerDatumRođenja" id="registerDatumRođenja" type="date" class="form-control"  />
                    	                </div>
                    	            </div>
									<div class="form-group">
                                    <label for="registerGrad">Grad</label>
                    	                <input  name="registerGrad" id="registerGrad" type="text"class="form-control" rows="6" placeholder="Grad"  ></input>
                    	            </div>
									<div class="form-group">
                                    <label for="registerAdresa">Adresa</label>
                    	                <input  name="registerAdresa" id="registerAdresa" type="text"class="form-control" rows="6" placeholder="Adresa"  ></input>
                    	            </div>
                                    <div class="form-group">
                                    <label for="registerJMBAG">JMBAG</label>
                                        <input name="registerJMBAG" id="registerJMBAG" type="number" class="form-control" placeholder="JMBAG"  />
                                    </div>
                                    <div class="form-group">
                                    <label for="registerProgram">Program</label>
                                        <input name="registerProgram" id="registerProgram" type="text" class="form-control" placeholder="Program"  />
                                    </div>
                                    <div class="form-group">
                                    <label for="registerGodina">Godina</label>
                                        <input name="registerGodina" id="registerGodina" type="number" min="1" max="6" class="form-control" placeholder="Godina"  />
                                    </div>
								    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="registerProsjek">Prosjek</label>
                                            <input name="registerProsjek" id="registerProsjek" min="2" max="5" step="0.01" type="number" class="form-control" placeholder="Prosjek"  />
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="registerECTS">ECTS</label>
                                            <input name="registerECTS" id="registerECTS" type="number" min="20" max="72" class="form-control" placeholder="Broj ECTS bodova"  />
                                        </div>
                                    </div>
                                    <button class="btn" type="submit">Registriraj se</button></div>
                                </form>
                    	    </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php get_footer(); ?>