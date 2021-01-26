<?php

function DajListuSoba()
{
    $lSobe = array();

    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'soba',
        'post_status' => 'publish',
    );

    $sobe = get_posts($args);

    $sKat='';
    $sThumbnailSoba = '';
    foreach ($sobe as $soba)
    {
        if (get_the_post_thumbnail_url($soba->ID))
        {
            $sThumbnailSoba = get_the_post_thumbnail_url($soba->ID);
        }
        else
        {
            $sThumbnailSoba = get_template_directory_uri() . '/images/profile.png';
        }

        $lKat = wp_get_post_terms($soba->ID, 'kat');
        foreach ($lKat as $kat)
        {
            $sKat = $kat->name;
        }

        $newSoba = new oSoba();

        $newSoba->set_soba_post_id($soba->ID);
        $newSoba->set_soba_url($soba->guid);
        $newSoba->set_slika_url($sThumbnailSoba);
        $newSoba->set_naslov($soba->post_title);
        $newSoba->set_opis($soba->post_content);
        $newSoba->set_broj_sobe($soba->broj_sobe);
        $newSoba->set_soba_kat($sKat);
        $newSoba->set_tip_sobe($soba->tip_kupaonice);
        $newSoba->set_broj_kreveta($soba->tip_sobe);
        $newSoba->set_zauzece(null);

        array_push($lSobe, $newSoba);

    }

    return $lSobe;
}


function DajListuStudenata()
{
    $prog = null;
    $god = null;
    $lStudenti = array();

    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'student',
        'post_status' => 'publish',
    );

    $studenti = get_posts($args);

    $sThumbnailStudent = '';

    foreach ($studenti as $stud)
    {

        $soba_studenta = get_post_meta($stud->ID, 'soba_student', true);

        $lGodStudija = wp_get_post_terms($stud->ID, 'godine_studija');
        foreach ($lGodStudija as $godina)
        {
            $god = $godina->name;
        }

        $lStudProgram = wp_get_post_terms($stud->ID, 'studijski_program');
        foreach ($lStudProgram as $program)
        {
            $prog = $program->name;
        }

        if (get_the_post_thumbnail_url($stud->ID))
        {
            $sThumbnailStudent = get_the_post_thumbnail_url($stud->ID);
        }
        else
        {
            $sThumbnailStudent = get_template_directory_uri() . '/images/profile.png';
        }

        $newStudent = new oStudent();

        $newStudent->set_student_post_id($stud->ID);
        $newStudent->set_student_url($stud->guid);
        $newStudent->set_slika_url($sThumbnailStudent);
        $newStudent->set_ime_prezime($stud->post_title); // Ime i prezime studenta
        $newStudent->set_opis($stud->post_content);
        $newStudent->set_ime($stud->ime_studenta);
        $newStudent->set_prezime($stud->prezime_studenta);
        $newStudent->set_datum_rodenja($stud->datum_rodenja_studenta);
        $newStudent->set_adresa($stud->adresa_studenta);
        $newStudent->set_grad($stud->grad_studenta);
        $newStudent->set_broj_mobitela($stud->broj_mobitela_studenta);
        $newStudent->set_email($stud->email_studenta);
        $newStudent->set_godina($god);
        $newStudent->set_program($prog);
        $newStudent->set_ects($stud->ects_bodovi);
        $newStudent->set_prosjek($stud->prosjek_ocjena);
        $newStudent->set_jmbag($stud->jmbag);
        $newStudent->set_student_soba($soba_studenta);
        $newStudent->set_student_zaporka($stud->student_zaporka);

        array_push($lStudenti, $newStudent);

    }

    return $lStudenti;
}

function GetNovosti()
{
    $sHtml = "";
    $args = array(
        'posts_per_page' => - 1,
        'category_name' => 'novosti'
    );

    $oResults = get_posts($args);
    $sThumbnailNovosti = "";

    foreach ($oResults as $result)
    {

        if (get_the_post_thumbnail_url($result->ID))
        {
            $sThumbnailNovosti = get_the_post_thumbnail_url($result->ID);
        }
        else
        {
            $sThumbnailNovosti = get_template_directory_uri() . '/images/logo.png';
        }

        $sUrl = get_permalink($result->ID);
        $sResultTitle = $result->post_title;

        $sHtml .= '<div class="row align-items-center feature-item">
                        <div class="col-5">
                            <img src="' . $sThumbnailNovosti . '" alt="">
                        </div>
                        <div class="col-7">
                            <a href="' . $sUrl . '" class=""><h3>' . $sResultTitle . '</h3></a>
                            <p>
                               
                            </p>
                        </div>
                    </div>';
    }

    return $sHtml;
}

function GetObavijesti()
{
    $sHtml = "";
    $args = array(
        'posts_per_page' => - 1,
        'category_name' => 'obavijesti'
    );

    $oResults = get_posts($args);
    $sThumbnailObavijesti = "";

    foreach ($oResults as $result)
    {

        if (get_the_post_thumbnail_url($result->ID))
        {
            $sThumbnailObavijesti = get_the_post_thumbnail_url($result->ID);
        }
        else
        {
            $sThumbnailObavijesti = get_template_directory_uri() . '/images/logo.png';
        }

        $sUrl = get_permalink($result->ID);
        $sResultTitle = $result->post_title;
        $ResultContent = $result->post_content;

        $shortened = shortenContent($ResultContent);

        $sHtml .= '<div class="row align-items-center feature-item">
                        <div class="col-5">
                            <img src="' . $sThumbnailObavijesti . '" alt="">
                        </div>
                        <div class="col-7">
                            <a href="' . $sUrl . '" class=""><h3>' . $sResultTitle . '</h3></a>
                            <p>
                                '.$shortened.' 
                            </p>
                        </div>
                    </div>';
    }

    return $sHtml;
}

function GetNumNovosti($n)
{
    $counter = 0;
    $rowCounter = $counter / 2;

    $args = array(
        'posts_per_page' => - 1,
        'category_name' => 'novosti'
    );

    $oResults = get_posts($args);

    $sResultThumbnail = "";

    $sHtml = '';

    foreach ($oResults as $result)
    {
        $sResultThumbnail = "";
        if ($counter < $n)
        {
            if (get_the_post_thumbnail_url($result->ID))
            {
                $sResultThumbnail = get_the_post_thumbnail_url($result->ID);
            }

            $sUrl = get_permalink($result->ID);
            $sResultTitle = $result->post_title;

            $sHtml .= '<div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <img src="' . $sResultThumbnail . '" alt="">
                                <a href="' . $sUrl . '" class=""><h3>' . $sResultTitle . '</h3></a>
                                <p>
                                    '. the_excerpt().'
                                </p>
                                <a class="btn" href="' . $sUrl . '">Vidi više</a>
                            </div>
                        </div>';

            $counter += 1;
        }
    }
    $sHtml .= '</div>';
    return $sHtml;
}

function GetNumOsoblje($n)
{
    $sHtml = "";
    $counter = 0;
    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'osoblje',
        'post_status' => 'publish'
    );

    $sThumbnailOsoblje = "";
    $sOsobljeRadnoMjesto="";
    $lOsoblje = get_posts($args);
    

    foreach ($lOsoblje as $clan)
    {

        if ($counter < $n)
        {

            if (get_the_post_thumbnail_url($clan->ID))
            {
                $sThumbnailOsoblje = get_the_post_thumbnail_url($clan->ID);
            }
            else
            {
                $sThumbnailOsoblje = get_template_directory_uri() . '/images/profile.png';
            }

            $lMjestaRada = wp_get_post_terms($clan->ID, 'mjesto_rada');
            foreach ($lMjestaRada as $mjesta_rada)
            {
                $sOsobljeRadnoMjesto = $mjesta_rada->name;
            }

            $sUrl = get_permalink($clan->ID);
            $sOsobljeNaziv = $clan->post_title;
            

            $sHtml .= '<div class="testimonial-item">
                            <div class="testimonial-img">
                                <img href="' . $sUrl . '" src="' . $sThumbnailOsoblje . '" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>
                                ' . $sOsobljeRadnoMjesto . '
                                </p>
                                <a href="' . $sUrl . '" class=""><h3>' . $sOsobljeNaziv . '</h3></a>
                            </div>
                        </div>';
        
            $counter ++;

        }
    }

    return $sHtml;
}


function GetNumSadrzaj($n)
{
    $sHtml = "";
    $counter = 0;
    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'dodatni_sadrzaj',
        'post_status' => 'publish'
    );

    $sThumbnailSadrzaj = "";
    $lSadrzaj = get_posts($args);

    foreach ($lSadrzaj as $sadrzaj)
    {

        if ($counter < $n)
        {

            if (get_the_post_thumbnail_url($sadrzaj->ID))
            {
                $sThumbnailSadrzaj = get_the_post_thumbnail_url($sadrzaj->ID);
            }
            else
            {
                $sThumbnailSadrzaj = get_template_directory_uri() . '/images/profile.png';
            }

            $sUrl = get_permalink($sadrzaj->ID);
            $sSadrzajNaziv = $sadrzaj->post_title;
            $sSadrzaj = $sadrzaj->post_content;

            $sHtml .= '<div class="col-lg-3 col-md-6">
                            <div class="team-item">
                                <div class="team-img">
                                    <img href="' . $sUrl . '" src="' . $sThumbnailSadrzaj . '" alt="' . $sSadrzajNaziv . '">
                                </div>
                                <div class="team-text">
                                    <a href="' . $sUrl . '" class=""><h2>' . $sSadrzajNaziv . '</h2></a>
                                    <h3>' . $sSadrzaj . '</h3>

                                </div>
                            </div>
                        </div>';
            $counter += 1;

        }
    }

    return $sHtml;
}
?>