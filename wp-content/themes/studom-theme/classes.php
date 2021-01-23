<?php
    /*  CLASS STUDENT
        $this_new_student->set_student_post_id(null);
        $this_new_student->set_student_url(null);
        $this_new_student->set_slika_url(null);
        $this_new_student->set_ime_prezime(null);
        $this_new_student->set_opis(null);
        $this_new_student->set_ime(null);
        $this_new_student->set_prezime(null);
        $this_new_student->set_datum_rodenja(null);
        $this_new_student->set_adresa(null);
        $this_new_student->set_grad(null);
        $this_new_student->set_broj_mobitela(null);
        $this_new_student->set_email(null);
        $this_new_student->set_godina(null);
        $this_new_student->set_program(null);
        $this_new_student->set_ects(null);
        $this_new_student->set_prosjek(null);
        $this_new_student->set_jmbag(null);
        $this_new_student->set_student_soba(null);
    */

    /*  CLASS OSOBLJE
        $this_new_osoblje->set_osoblje_post_id(null);
        $this_new_osoblje->set_osoblje_url(null);
        $this_new_osoblje->set_slika_url(null);
        $this_new_osoblje->set_ime_prezime(null);
        $this_new_osoblje->set_opis(null);
        $this_new_osoblje->set_ime(null);
        $this_new_osoblje->set_prezime(null);
        $this_new_osoblje->set_datum_rodenja(null);
        $this_new_osoblje->set_adresa(null);
        $this_new_osoblje->set_grad(null);
        $this_new_osoblje->set_broj_mobitela(null);
        $this_new_osoblje->set_email(null);
        $this_new_osoblje->set_mjesto_rada(null);
        $this_new_osoblje->set_od_vrijeme(null);
        $this_new_osoblje->set_do_vrijeme(null);
        $this_new_osoblje->set_od_dana(null);
        $this_new_osoblje->set_do_dana(null);
        $this_new_osoblje->set_kat_dezurstva(null); 
    */

    /*  CLASS SOBA
        $this_new_soba->set_soba_post_id(null);
        $this_new_soba->set_soba_url(null);
        $this_new_soba->set_slika_url(null);
        $this_new_soba->set_naslov(null);
        $this_new_soba->set_opis(null);
        $this_new_soba->set_broj_sobe(null);
        $this_new_soba->set_soba_kat(null);
        $this_new_soba->set_tip_sobe(null);
        $this_new_soba->set_broj_kreveta(null);
        $this_new_soba->set_zauzece(null);
    */

class oStudent {
    public $student_post_id;
    public $student_url;
    public $slika_url;
    public $ime_prezime;
    public $opis;
    public $ime;
    public $prezime;
    public $datum_rodenja;
    public $adresa;
    public $grad;
    public $broj_mobitela;
    public $email;
    public $godina;
    public $program;
    public $ects;
    public $prosjek;
    public $jmbag;
    public $student_soba;
    public $student_zaporka;

    //STUDENT GETTERS AND SETTERS

    function set_student_post_id($student_post_id){
        $this->student_post_id = $student_post_id;
      }
    function get_student_post_id() {
      return $this->student_post_id;
    }
    function set_student_url($student_url){
        $this->student_url = $student_url;
      }
    function get_student_url() {
      return $this->student_url;
    }
    function set_slika_url($slika_url){
        $this->slika_url = $slika_url;
      }
    function get_slika_url() {
      return $this->slika_url;
    }
    function set_ime_prezime($ime_prezime){
        $this->ime_prezime = $ime_prezime;
      }
    function get_ime_prezime() {
      return $this->ime_prezime;
    }
    function set_opis($opis){
        $this->opis = $opis;
      }
    function get_opis() {
      return $this->opis;
    }
    function set_ime($ime){
        $this->ime = $ime;
      }
    function get_ime() {
      return $this->ime;
    }
    function set_prezime($prezime){
        $this->prezime = $prezime;
      }
    function get_prezime() {
      return $this->prezime;
    }
    function set_datum_rodenja($datum_rodenja){
        $this->datum_rodenja = $datum_rodenja;
      }
    function get_datum_rodenja() {
      return $this->datum_rodenja;
    }
    function set_adresa($adresa){
        $this->adresa = $adresa;
      }
    function get_adresa() {
      return $this->adresa;
    }
    function set_grad($grad){
        $this->grad = $grad;
      }
    function get_grad() {
      return $this->grad;
    }
    function set_broj_mobitela($broj_mobitela){
        $this->broj_mobitela = $broj_mobitela;
      }
    function get_broj_mobitela() {
      return $this->broj_mobitela;
    }
    function set_email($email){
        $this->email = $email;
      }
    function get_email() {
      return $this->email;
    }
    function set_godina($godina){
        $this->godina = $godina;
      }
    function get_godina() {
      return $this->godina;
    }
    function set_program($program){
        $this->program = $program;
      }
    function get_program() {
      return $this->program;
    }
    function set_ects($ects){
        $this->ects = $ects;
      }
    function get_ects() {
      return $this->ects;
    }
    function set_prosjek($prosjek){
        $this->prosjek = $prosjek;
      }
    function get_prosjek() {
      return $this->prosjek;
    }
    function set_jmbag($jmbag){
        $this->jmbag = $jmbag;
      }
    function get_jmbag() {
      return $this->jmbag;
    }
    function set_student_soba($student_soba){
        $this->student_soba = $student_soba;
      }
    function get_student_soba() {
      return $this->student_soba;
    }
    function set_student_zaporka($student_zaporka){
        $this->student_soba = $student_zaporka;
      }
    function get_student_zaporka() {
      return $this->student_zaporka;
    }
}

class oOsoblje {
    public $osoblje_post_id;
    public $osoblje_url;
    public $slika_url;
    public $ime_prezime;
    public $opis;
    public $ime;
    public $prezime;
    public $datum_rodenja;
    public $adresa;
    public $grad;
    public $broj_mobitela;
    public $email;
    public $mjesto_rada;
    public $od_vrijeme;
    public $do_vrijeme;
    public $od_dana;
    public $do_dana;
    public $kat_dezurstva;

    //OSOBLJE GETTERS AND SETTERS

    function set_osoblje_post_id($osoblje_post_id){
        $this->osoblje_post_id = $osoblje_post_id;
      }
    function get_osoblje_post_id() {
      return $this->osoblje_post_id;
    }
    function set_osoblje_url($osoblje_url){
        $this->osoblje_url = $osoblje_url;
      }
    function get_osoblje_url() {
      return $this->osoblje_url;
    }
    function set_slika_url($slika_url){
        $this->slika_url = $slika_url;
      }
    function get_slika_url() {
      return $this->slika_url;
    }
    function set_ime_prezime($ime_prezime){
        $this->ime_prezime = $ime_prezime;
      }
    function get_ime_prezime() {
      return $this->ime_prezime;
    }
    function set_opis($opis){
        $this->opis = $opis;
      }
    function get_opis() {
      return $this->opis;
    }
    function set_ime($ime){
        $this->ime = $ime;
      }
    function get_ime() {
      return $this->ime;
    }
    function set_prezime($prezime){
        $this->prezime = $prezime;
      }
    function get_prezime() {
      return $this->prezime;
    }
    function set_datum_rodenja($datum_rodenja){
        $this->datum_rodenja = $datum_rodenja;
      }
    function get_datum_rodenja() {
      return $this->datum_rodenja;
    }
    function set_adresa($adresa){
        $this->adresa = $adresa;
      }
    function get_adresa() {
      return $this->adresa;
    }
    function set_grad($grad){
        $this->grad = $grad;
      }
    function get_grad() {
      return $this->grad;
    }
    function set_broj_mobitela($broj_mobitela){
        $this->broj_mobitela = $broj_mobitela;
      }
    function get_broj_mobitela() {
      return $this->broj_mobitela;
    }
    function set_email($email){
        $this->email = $email;
      }
    function get_email() {
      return $this->email;
    }
    function set_mjesto_rada($mjesto_rada){
        $this->mjesto_rada = $mjesto_rada;
      }
    function get_mjesto_rada() {
      return $this->mjesto_rada;
    }
    function set_od_vrijeme($od_vrijeme){
        $this->od_vrijeme = $od_vrijeme;
      }
    function get_od_vrijeme() {
      return $this->od_vrijeme;
    }
    function set_do_vrijeme($do_vrijeme){
        $this->do_vrijeme = $do_vrijeme;
      }
    function get_do_vrijeme() {
      return $this->do_vrijeme;
    }
    function set_od_dana($od_dana){
        $this->od_dana = $od_dana;
      }
    function get_od_dana() {
      return $this->od_dana;
    }
    function set_do_dana($do_dana){
        $this->do_dana = $do_dana;
      }
    function get_do_dana() {
      return $this->do_dana;
    }
    function set_kat_dezurstva($kat_dezurstva){
        $this->kat_dezurstva = $kat_dezurstva;
      }
    function get_kat_dezurstva() {
      return $this->kat_dezurstva;
    }
}

class oSoba{
    public $soba_post_id;
    public $soba_url;
    public $slika_url;
    public $naslov;
    public $opis;
    public $broj_sobe;
    public $soba_kat;
    public $tip_sobe;
    public $broj_kreveta;
    public $zauzece;

    function set_soba_post_id($soba_post_id){
      $this->soba_post_id = $soba_post_id;
    }
    function get_soba_post_id() {
      return $this->soba_post_id;
    }
    function set_soba_url($soba_url){
      $this->soba_url = $soba_url;
    }
    function get_soba_url() {
      return $this->soba_url;
    }
    function set_slika_url($slika_url){
      $this->slika_url = $slika_url;
    }
    function get_slika_url() {
      return $this->slika_url;
    }
    function set_naslov($naslov){
      $this->naslov = $naslov;
    }
    function get_naslov() {
      return $this->naslov;
    }
    function set_opis($opis){
      $this->opis = $opis;
    }
    function get_opis() {
      return $this->opis;
    }
    function set_broj_sobe($broj_sobe){
      $this->broj_sobe = $broj_sobe;
    }
    function get_broj_sobe() {
      return $this->broj_sobe;
    }
    function set_soba_kat($soba_kat){
      $this->soba_kat = $soba_kat;
    }
    function get_soba_kat() {
      return $this->soba_kat;
    }
    function set_tip_sobe($tip_sobe){
      $this->tip_sobe = $tip_sobe;
    }
    function get_tip_sobe() {
      return $this->tip_sobe;
    }
    function set_broj_kreveta($broj_kreveta){
      $this->broj_kreveta = $broj_kreveta;
    }
    function get_broj_kreveta() {
      return $this->broj_kreveta;
    }
    function set_zauzece($zauzece){
      $this->zauzece = $zauzece;
    }
    function get_zauzece() {
      return $this->zauzece;
    }
}

?>