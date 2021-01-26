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


get_header();
?>

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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <form>
                                    <div class="form-group">
                                    <label for="registerEmail">Email</label>
                    	                <input id="registerEmail" type="email" class="form-control" placeholder="Email" required="required" />
                    	            </div>
									<div class="form-group">
                    	            <div class="form-group">
                                    <label for="registerZaporka">Zaporka</label>
                    	                <input  id="registerZaporka" type="password"class="form-control" rows="6" placeholder="Zaporka" required="required" ></input>
                    	            </div>
                                    <div><button class="btn" type="submit">Prijava</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php get_footer(); ?>


            
            


            