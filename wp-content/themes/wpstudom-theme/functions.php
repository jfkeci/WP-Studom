<?php

class Komentar{
    public $komentar_id="N/A";
    public $user_id="N/A";
    public $post_id="N/A";
    public $datum_vrijeme="N/A";
    public $sadrzaj="N/A";

    public function __construct($kId=null,$uid=null,$pid=null,$dvk=null,$content=null)
	{
		if($kId) $this->komentar_id=$kId;
		if($uid) $this->user_id=$uid;
		if($pid) $this->post_id=$pid;
        if($dvk) $this->datum_vrijeme=$dvk;
        if($content) $this->sadrzaj=$content;
	}
}

//---------------------------------------------------------------------------
//THEME INIT
//---------------------------------------------------------------------------
if (!function_exists('initialize_studom_theme'))
{
    function initialize_studom_theme()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_post_type_support( 'page', 'excerpt' );

        register_nav_menus(array(
            'glavni-menu' => "Glavni navigacijski izbornik",
            'korisnicki-menu' => "Korisnički navigacijski izbornik"
        ));

        add_theme_support('customize-selective-refresh-widgets');

    }
}

add_action('after_setup_theme', 'initialize_studom_theme');

function wpse156165_menu_add_class( $atts, $item, $args ) {
    $class = 'nav-item nav-link';
    $atts['class'] = $class;
    $atts['item'] = '<a>';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );


/* if (isset($_COOKIE["osoba"]))
{
    function add_last_nav_item($items) {
        return $items .= '<a class="btn" href="http://localhost/studom/profil/">Profil</a>';
    }
    add_filter('wp_nav_menu_items','add_last_nav_item');
}if (!isset($_COOKIE["osoba"])){
    function add_last_nav_item($items) {
        return $items .= '<a class="btn" href="http://localhost/studom/login/">Prijava</a>
                            <a class="btn" href="http://localhost/studom/registracija/">Registracija</a>';
    }
    add_filter('wp_nav_menu_items','add_last_nav_item');
} */


function initialize_my_sidebars(){
    register_sidebar(array(
        'name' => "Main sidebar",
        'id' => 'main-sidebar',
        'description' => "Main sidebar",
        'before_widget' => '<div>',
        'after_widget' => "</div>",
        'before_title' => '<h3">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => "Footer sidebar 1",
        'id' => 'footer-sidebar1',
        'description' => "Footer sidebar 1",
        'before_widget' => '<div>',
        'after_widget' => "</div>",
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => "Footer sidebar 2",
        'id' => 'footer-sidebar2',
        'description' => "Footer sidebar 2",
        'before_widget' => '<div>',
        'after_widget' => "</div>",
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => "Footer sidebar 3",
        'id' => 'footer-sidebar3',
        'description' => "Footer sidebar 3",
        'before_widget' => '<div>',
        'after_widget' => "</div>",
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => "Footer sidebar 4",
        'id' => 'footer-sidebar4',
        'description' => "Footer sidebar 4",
        'before_widget' => '<div>',
        'after_widget' => "</div>",
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

//CPT-OVI STUDENT, SOBA, OSOBLJE, DODATNI SADRŽAJ

//CPT STUDENT
function registriraj_studenta_cpt(){
    $labels = array(
        'name' => _x('Studenti', 'Post Type General Name', 'studom_vt') ,
        'singular_name' => _x('Student', 'Post Type Singular Name', 'studom_vt') ,
        'menu_name' => __('Studenti', 'studom_vt') ,
        'name_admin_bar' => __('Studenti', 'studom_vt') ,
        'archives' => __('Studenti arhiva', 'studom_vt') ,
        'attributes' => __('Atributi', 'studom_vt') ,
        'parent_item_colon' => __('Roditeljski element', 'studom_vt') ,
        'all_items' => __('Svi Studenti', 'studom_vt') ,
        'add_new_item' => __('Dodaj novoga Studenta', 'studom_vt') ,
        'add_new' => __('Dodaj novi', 'studom_vt') ,
        'new_item' => __('Novi Student', 'studom_vt') ,
        'edit_item' => __('Uredi Studenta', 'studom_vt') ,
        'update_item' => __('Ažuriraj Studenta', 'studom_vt') ,
        'view_item' => __('Pogledaj Studenta', 'studom_vt') ,
        'view_items' => __('Pogledaj Studente', 'studom_vt') ,
        'search_items' => __('Pretraži Studente', 'studom_vt') ,
        'not_found' => __('Nije pronađeno', 'studom_vt') ,
        'not_found_in_trash' => __('Nije pronađeno u smeću', 'studom_vt') ,
        'featured_image' => __('Glavna slika', 'studom_vt') ,
        'set_featured_image' => __('Postavi glavnu sliku', 'studom_vt') ,
        'remove_featured_image' => __('Ukloni glavnu sliku', 'studom_vt') ,
        'use_featured_image' => __('Postavi za glavnu sliku', 'studom_vt') ,
        'insert_into_item' => __('Umentni', 'studom_vt') ,
        'uploaded_to_this_item' => __('Preneseno', 'studom_vt') ,
        'items_list' => __('Lista', 'studom_vt') ,
        'items_list_navigation' => __('Navigacija među studentima', 'studom_vt') ,
        'filter_items_list' => __('Filtriranje studenata', 'studom_vt') ,
    );
    $args = array(
        'label' => __('Student', 'studom_vt') ,
        'description' => __('Student post type', 'studom_vt') ,
        'labels' => $labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions'
        ),
        'taxonomies' => array('godine_studija', 'studijski_program'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('student', $args);
}
//CPT SOBA
function registriraj_sobu_cpt(){
    $labels = array(
        'name' => _x('Sobe', 'Post Type General Name', 'studom_vt') ,
        'singular_name' => _x('Soba', 'Post Type Singular Name', 'studom_vt') ,
        'menu_name' => __('Sobe', 'studom_vt') ,
        'name_admin_bar' => __('Sobe', 'studom_vt') ,
        'archives' => __('Sobe arhiva', 'studom_vt') ,
        'attributes' => __('Atributi', 'studom_vt') ,
        'parent_item_colon' => __('Roditeljski element', 'studom_vt') ,
        'all_items' => __('Sve Sobe', 'studom_vt') ,
        'add_new_item' => __('Dodaj novu Sobu', 'studom_vt') ,
        'add_new' => __('Dodaj novu', 'studom_vt') ,
        'new_item' => __('Nova Soba', 'studom_vt') ,
        'edit_item' => __('Uredi Sobu', 'studom_vt') ,
        'update_item' => __('Ažuriraj Sobu', 'studom_vt') ,
        'view_item' => __('Pogledaj Sobu', 'studom_vt') ,
        'view_items' => __('Pogledaj Sobe', 'studom_vt') ,
        'search_items' => __('Pretraži Sobe', 'studom_vt') ,
        'not_found' => __('Nije pronađeno', 'studom_vt') ,
        'not_found_in_trash' => __('Nije pronađeno u smeću', 'studom_vt') ,
        'featured_image' => __('Glavna slika', 'studom_vt') ,
        'set_featured_image' => __('Postavi glavnu sliku', 'studom_vt') ,
        'remove_featured_image' => __('Ukloni glavnu sliku', 'studom_vt') ,
        'use_featured_image' => __('Postavi za glavnu sliku', 'studom_vt') ,
        'insert_into_item' => __('Umentni', 'studom_vt') ,
        'uploaded_to_this_item' => __('Preneseno', 'studom_vt') ,
        'items_list' => __('Lista', 'studom_vt') ,
        'items_list_navigation' => __('Navigacija među sobama', 'studom_vt') ,
        'filter_items_list' => __('Filtriranje soba', 'studom_vt') ,
    );
    $args = array(
        'label' => __('Soba', 'studom_vt') ,
        'description' => __('Soba post type', 'studom_vt') ,
        'labels' => $labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions'
        ),
        'taxonomies' => array('kat'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('soba', $args);
}
//CPT OSOBLJE
function registriraj_osoblje_cpt(){
    $labels = array(
        'name' => _x('Osoblje', 'Post Type General Name', 'studom_vt') ,
        'singular_name' => _x('Osoblje', 'Post Type Singular Name', 'studom_vt') ,
        'menu_name' => __('Osoblje', 'studom_vt') ,
        'name_admin_bar' => __('Osoblje', 'studom_vt') ,
        'archives' => __('Osoblje arhiva', 'studom_vt') ,
        'attributes' => __('Atributi', 'studom_vt') ,
        'parent_item_colon' => __('Roditeljski element', 'studom_vt') ,
        'all_items' => __('Svo Osoblje', 'studom_vt') ,
        'add_new_item' => __('Dodaj novog člana osoblja', 'studom_vt') ,
        'add_new' => __('Dodaj novog člana osoblja', 'studom_vt') ,
        'new_item' => __('Novi član Osoblja', 'studom_vt') ,
        'edit_item' => __('Uredi Osoblje', 'studom_vt') ,
        'update_item' => __('Ažuriraj Osoblje', 'studom_vt') ,
        'view_item' => __('Pogledaj Osoblje', 'studom_vt') ,
        'view_items' => __('Pogledaj Osoblje', 'studom_vt') ,
        'search_items' => __('Pretraži Osoblje', 'studom_vt') ,
        'not_found' => __('Nije pronađeno', 'studom_vt') ,
        'not_found_in_trash' => __('Nije pronađeno u smeću', 'studom_vt') ,
        'featured_image' => __('Glavna slika', 'studom_vt') ,
        'set_featured_image' => __('Postavi glavnu sliku', 'studom_vt') ,
        'remove_featured_image' => __('Ukloni glavnu sliku', 'studom_vt') ,
        'use_featured_image' => __('Postavi za glavnu sliku', 'studom_vt') ,
        'insert_into_item' => __('Umentni', 'studom_vt') ,
        'uploaded_to_this_item' => __('Preneseno', 'studom_vt') ,
        'items_list' => __('Lista', 'studom_vt') ,
        'items_list_navigation' => __('Navigacija među Osobljem', 'studom_vt') ,
        'filter_items_list' => __('Filtriranje Osoblja', 'studom_vt') ,
    );
    $args = array(
        'label' => __('Osoblje', 'studom_vt') ,
        'description' => __('Osoblje post type', 'studom_vt') ,
        'labels' => $labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions'
        ),
        'taxonomiew' => array('mjesto_rada'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('osoblje', $args);
}
//CPT DODATNI SADRŽAJ
function registriraj_dodatni_sadrzaj_cpt(){
    $labels = array(
        'name' => _x('Dodatni sadržaji', 'Post Type General Name', 'studom_vt') ,
        'singular_name' => _x('Dodatni sadržaj', 'Post Type Singular Name', 'studom_vt') ,
        'menu_name' => __('Dodatni sadržaji', 'studom_vt') ,
        'name_admin_bar' => __('Dodatni sadržaji', 'studom_vt') ,
        'archives' => __('Dodatni sadržaji arhiva', 'studom_vt') ,
        'attributes' => __('Atributi', 'studom_vt') ,
        'parent_item_colon' => __('Roditeljski element', 'studom_vt') ,
        'all_items' => __('Svi dodatni sadržaji', 'studom_vt') ,
        'add_new_item' => __('Dodaj novi dodatni sadržaj', 'studom_vt') ,
        'add_new' => __('Dodaj novi', 'studom_vt') ,
        'new_item' => __('Novi dodatni sadržaj', 'studom_vt') ,
        'edit_item' => __('Uredi dodatni sadržaj', 'studom_vt') ,
        'update_item' => __('Ažuriraj dodatni sadržaj', 'studom_vt') ,
        'view_item' => __('Pogledaj dodatni sadržaj', 'studom_vt') ,
        'view_items' => __('Pogledaj dodatne sadržaje', 'studom_vt') ,
        'search_items' => __('Pretraži dodatne sadržaje', 'studom_vt') ,
        'not_found' => __('Nije pronađeno', 'studom_vt') ,
        'not_found_in_trash' => __('Nije pronađeno u smeću', 'studom_vt') ,
        'featured_image' => __('Glavna slika', 'studom_vt') ,
        'set_featured_image' => __('Postavi glavnu sliku', 'studom_vt') ,
        'remove_featured_image' => __('Ukloni glavnu sliku', 'studom_vt') ,
        'use_featured_image' => __('Postavi za glavnu sliku', 'studom_vt') ,
        'insert_into_item' => __('Umentni', 'studom_vt') ,
        'uploaded_to_this_item' => __('Preneseno', 'studom_vt') ,
        'items_list' => __('Lista', 'studom_vt') ,
        'items_list_navigation' => __('Navigacija među dodatnim sadržajima', 'studom_vt') ,
        'filter_items_list' => __('Filtriranje dodatnih sadržaja', 'studom_vt') ,
    );
    $args = array(
        'label' => __('Dodatni sadržaj', 'studom_vt') ,
        'description' => __('Dodatni sadržaj post type', 'studom_vt') ,
        'labels' => $labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions'
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('dodatni_sadrzaj', $args);
}


//---------------------------------------------------------------------------
//STUDENTI TAKSONOMIJE I META BOXES
//---------------------------------------------------------------------------
function registriraj_taksonomiju_studijski_programi(){
    $labels = array(
        'name' => _x('Studijski programi', 'Taxonomy General Name', 'studom_vt') ,
        'singular_name' => _x('Studijski program', 'Taxonomy Singular Name', 'studom_vt') ,
        'menu_name' => __('Studijski programi', 'studom_vt') ,
        'all_items' => __('Svi studijski programi', 'studom_vt') ,
        'parent_item' => __('Roditeljsko zvanje', 'studom_vt') ,
        'parent_item_colon' => __('Roditeljsko zvanje', 'studom_vt') ,
        'new_item_name' => __('Novi studijski program', 'studom_vt') ,
        'add_new_item' => __('Dodaj novi studijski program', 'studom_vt') ,
        'edit_item' => __('Uredi studijski program', 'studom_vt') ,
        'update_item' => __('Ažuiriraj studijski program', 'studom_vt') ,
        'view_item' => __('Pogledaj studijski program', 'studom_vt') ,
        'separate_items_with_commas' => __('Odvojite programe sa zarezima', 'studom_vt') ,
        'add_or_remove_items' => __('Dodaj ili ukloni studijski program', 'studom_vt') ,
        'choose_from_most_used' => __('Odaberi među najčešće korištenima', 'studom_vt') ,
        'popular_items' => __('Popularni studijski programi', 'studom_vt') ,
        'search_items' => __('Pretraga', 'studom_vt') ,
        'not_found' => __('Nema rezultata', 'studom_vt') ,
        'no_terms' => __('Nema studijskih programa', 'studom_vt') ,
        'items_list' => __('Lista studijskih programa', 'studom_vt') ,
        'items_list_navigation' => __('Navigacija', 'studom_vt') ,
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('studijski_program', array(
        'student'
    ) , $args);
}
function registriraj_taksonomiju_godina(){
    $labels = array(
        'name' => _x('Godina studija', 'Taxonomy General Name', 'studom_vt') ,
        'singular_name' => _x('Godina studija', 'Taxonomy Singular Name', 'studom_vt') ,
        'menu_name' => __('Godina', 'studom_vt') ,
        'all_items' => __('Sve godine', 'studom_vt') ,
        'parent_item' => __('Godina', 'studom_vt') ,
        'parent_item_colon' => __('Godina', 'studom_vt') ,
        'new_item_name' => __('Nova godina', 'studom_vt') ,
        'add_new_item' => __('Dodaj godinu', 'studom_vt') ,
        'edit_item' => __('Uredi godinu', 'studom_vt') ,
        'update_item' => __('Ažuriraj godinu', 'studom_vt') ,
        'view_item' => __('Pogledaj godinu', 'studom_vt') ,
        'separate_items_with_commas' => __('Odvojite godine točkom', 'studom_vt') ,
        'add_or_remove_items' => __('Dodaj ili ukloni godinu', 'studom_vt') ,
        'choose_from_most_used' => __('Odaberi među najčešće korištenima', 'studom_vt') ,
        'popular_items' => __('Popularne godine', 'studom_vt') ,
        'search_items' => __('Pretraga', 'studom_vt') ,
        'not_found' => __('Nema rezultata', 'studom_vt') ,
        'no_terms' => __('Nema godina', 'studom_vt') ,
        'items_list' => __('Lista godina', 'studom_vt') ,
        'items_list_navigation' => __('Navigacija', 'studom_vt') ,
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('godine_studija', array(
        'student'
    ) , $args);

}
function add_meta_box_osobni_podaci_studenta(){
    add_meta_box('studom_vsmti_student_osobni_podaci', 'Osobni podaci', 'html_meta_box_student_osobni_podaci', 'student');
}
function html_meta_box_student_osobni_podaci($post){
    wp_nonce_field('spremi_osobne_podatke_studenta', 'ime_studenta_nounce');
    wp_nonce_field('spremi_osobne_podatke_studenta', 'prezime_studenta_nounce');
    wp_nonce_field('spremi_osobne_podatke_studenta', 'datum_rodenja_studenta_nounce');
    wp_nonce_field('spremi_osobne_podatke_studenta', 'adresa_studenta_nounce');
    wp_nonce_field('spremi_osobne_podatke_studenta', 'grad_studenta_nounce');
    wp_nonce_field('spremi_osobne_podatke_studenta', 'broj_mobitela_studenta_nounce');
    wp_nonce_field('spremi_osobne_podatke_studenta', 'email_studenta_nounce');
    wp_nonce_field('spremi_osobne_podatke_studenta', 'student_zaporka_nounce');

    $ime = get_post_meta($post->ID, 'ime_studenta', true);
    $prezime = get_post_meta($post->ID, 'prezime_studenta', true);
    $datum_rodenja = get_post_meta($post->ID, 'datum_rodenja_studenta', true);
    $adresa = get_post_meta($post->ID, 'adresa_studenta', true);
    $grad = get_post_meta($post->ID, 'grad_studenta', true);
    $broj_mobitela = get_post_meta($post->ID, 'broj_mobitela_studenta', true);
    $email = get_post_meta($post->ID, 'email_studenta', true);
    $student_zaporka = get_post_meta($post->ID, 'student_zaporka', true);

    $student_zaporka = "test123";

    echo '<div>
                <table>
                        <tr>
                            <td><!--IME--><label for="ime_studenta">Ime: </label> </td>
                            <td><input type="text" id="ime_studenta" name="ime_studenta" value="' . $ime . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--PREZIME--> <label for="prezime_studenta">Prezime: </label>  </td>
                            <td><input type="text" id="prezime_studenta" name="prezime_studenta" value="' . $prezime . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--DATUM RODENJA--> <label for="datum_rodenja_studenta">Datum rođenja: </label> </td>
                            <td><input type="date" id="datum_rodenja_studenta" name="datum_rodenja_studenta" value="' . $datum_rodenja . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--ADRESA--> <label for="adresa_studenta">Adresa: </label> </td>
                            <td><input type="text" id="adresa_studenta" name="adresa_studenta" value="' . $adresa . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--MJESTO PREBIVALISTA--> <label for="grad_studenta">Grad: </label>  </td>
                            <td><input type="text" id="grad_studenta" name="grad_studenta" value="' . $grad . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--BROJ MOBITELA--> <label for="broj_mobitela_studenta">Broj mobitela: </label>  </td>
                            <td><input type="tel" placeholder="099-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="broj_mobitela_studenta" name="broj_mobitela_studenta" value="' . $broj_mobitela . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--MJESTO PREBIVALISTA--> <label for="email_studenta">E-mail: </label>  </td>
                            <td><input type="email" id="email_studenta" name="email_studenta" value="' . $email . '" /> </td>
                        </tr>
                        <input type="hidden" type="text" id="student_zaporka" name="student_zaporka" value="' . $student_zaporka . '" />
                </table>
        </div>';
}
function spremi_osobne_podatke_studenta($post_id){
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);

    $is_valid_nonce_ime = (isset($_POST['ime_studenta_nounce']) && wp_verify_nonce($_POST['ime_studenta_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_prezime = (isset($_POST['prezime_studenta_nounce']) && wp_verify_nonce($_POST['prezime_studenta_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_datum_rodenja = (isset($_POST['datum_rodenja_studenta_nounce']) && wp_verify_nonce($_POST['datum_rodenja_studenta_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_adresa = (isset($_POST['adresa_studenta_nounce']) && wp_verify_nonce($_POST['adresa_studenta_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_grad = (isset($_POST['grad_studenta_nounce']) && wp_verify_nonce($_POST['grad_studenta_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_broj_mobitela = (isset($_POST['broj_mobitela_studenta_nounce']) && wp_verify_nonce($_POST['broj_mobitela_studenta_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_email = (isset($_POST['email_studenta_nounce']) && wp_verify_nonce($_POST['email_studenta_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_student_zaporka = (isset($_POST['student_zaporka_nounce']) && wp_verify_nonce($_POST['student_zaporka_nounce'], basename(__FILE__))) ? 'true' : 'false';

    if ($is_autosave || $is_revision || !$is_valid_nonce_ime || !$is_valid_nonce_prezime || !$is_valid_nonce_datum_rodenja || !$is_valid_nonce_adresa || !$is_valid_nonce_grad || !$is_valid_nonce_broj_mobitela || !$is_valid_nonce_email || !$is_valid_nonce_student_zaporka)
    {
        return;
    }
    if (!empty($_POST['ime_studenta']))
    {
        update_post_meta($post_id, 'ime_studenta', $_POST['ime_studenta']);
    }
    else
    {
        delete_post_meta($post_id, 'ime_studenta');
    }
    if (!empty($_POST['prezime_studenta']))
    {
        update_post_meta($post_id, 'prezime_studenta', $_POST['prezime_studenta']);
    }
    else
    {
        delete_post_meta($post_id, 'prezime_studenta');
    }
    if (!empty($_POST['datum_rodenja_studenta']))
    {
        update_post_meta($post_id, 'datum_rodenja_studenta', $_POST['datum_rodenja_studenta']);
    }
    else
    {
        delete_post_meta($post_id, 'datum_rodenja_studenta');
    }
    if (!empty($_POST['adresa_studenta']))
    {
        update_post_meta($post_id, 'adresa_studenta', $_POST['adresa_studenta']);
    }
    else
    {
        delete_post_meta($post_id, 'adresa_studenta');
    }
    if (!empty($_POST['grad_studenta']))
    {
        update_post_meta($post_id, 'grad_studenta', $_POST['grad_studenta']);
    }
    else
    {
        delete_post_meta($post_id, 'grad_studenta');
    }
    if (!empty($_POST['broj_mobitela_studenta']))
    {
        update_post_meta($post_id, 'broj_mobitela_studenta', $_POST['broj_mobitela_studenta']);
    }
    else
    {
        delete_post_meta($post_id, 'broj_mobitela_studenta');
    }
    if (!empty($_POST['email_studenta']))
    {
        update_post_meta($post_id, 'email_studenta', $_POST['email_studenta']);
    }
    else
    {
        delete_post_meta($post_id, 'email_studenta');
    }
    if (!empty($_POST['student_zaporka']))
    {
        update_post_meta($post_id, 'student_zaporka', $_POST['student_zaporka']);
    }
    else
    {
        delete_post_meta($post_id, 'student_zaporka');
    }
}
function add_meta_box_soba_student(){
    add_meta_box('vsmti_studom_soba_student', 'Smjesti studenta u sobu:', 'html_meta_box_soba_student', 'student', 'side');
}
function html_meta_box_soba_student($post){
    wp_nonce_field('spremi_sobu_studenta', 'soba_student_nonce');

    $soba_student = get_post_meta($post->ID, 'soba_student', true);
    $sobaOdStudenta = explode(",", $soba_student);

    $lSobe = array();

    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'soba',
        'post_status' => 'publish',
    );

    $lSobe = get_posts($args);

    $sHtml = "";

    $noRoom = 0;
    $noRoomString = 'Nije odabrana';

    foreach ($lSobe as $soba)
    {
        $bedString = $soba->tip_sobe;
        $typeString = $soba->tip_kupaonice;
        $naslovString = $soba->post_title;

        $titleString = $naslovString . ", " . $typeString . ", " . $bedString;

        $sSelected = "";
        foreach ($sobaOdStudenta as $sobaKey => $sobaValue)
        {
            if ($sobaValue == $soba->ID)
            {
                $sSelected = 'selected="selected"';
            }
        }
        $sHtml .= '<option ' . $sSelected . ' value="' . $soba->ID . '">' . $titleString . '</option>';
    }

    echo ' <div>
				<div>
					<label for = "soba_student" > </label>
                    <select id="select2" name="student_u_sobi[]" >
                    <option  value="' . $noRoom . '">' . $noRoomString . '</option>
					' . $sHtml . '
					</select>
				</div><br/>
		</div>';
}
function spremi_sobu_studenta($post_id){
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce_soba_student = (isset($_POST['soba_student_nonce']) && wp_verify_nonce($_POST['soba_student_nonce'], basename(__FILE__))) ? 'true' : 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce_soba_student)
    {
        return;
    }
    // sobe
    if (!empty($_POST['student_u_sobi']))
    {
        $aSobe = implode(",", $_POST['student_u_sobi']);
        update_post_meta($post_id, 'soba_student', $aSobe);
    }
    else
    {
        delete_post_meta($post_id, 'student_u_sobi');
    } //sobe
    
}


//---------------------------------------------------------------------------
//REGISTRACIJA STUDENTA
//---------------------------------------------------------------------------


if(isset($_POST['registerEmail'])){

    $exists = false;
    $poruka = '';
    $porukaEmail = '<p>Unijeli ste postojeci EMAIL</p>';
    $porukaJmbag = '<p>Unijeli ste postojeci JMBAG</p>';
    $porukaZaporka = '<p>Zaporka pre kratka</p>';

    $registerIme = $_POST['registerIme'];
    $registerPrezime = $_POST['registerPrezime'];
    $registerEmail = $_POST['registerEmail'];
    $registerBrojMobitela = $_POST['registerBrojMobitela'];
    $registerZaporka = $_POST['registerZaporka'];
    $registerDatumRod = $_POST['registerDatumRođenja'];
    $registerGrad = $_POST['registerGrad'];
    $registerAdresa = $_POST['registerAdresa'];
    $registerJmbag = $_POST['registerJMBAG'];
    $registerProgram = $_POST['registerProgram'];
    $registerGodina = $_POST['registerGodina'];
    $registerProsjek = $_POST['registerProsjek'];
    $registerECTS = $_POST['registerECTS'];

    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'student',
        'post_status' => 'publish',
    );

    $studenti = get_posts($args);
    
    foreach($studenti as $student){
        if($student->email_studenta == $registerEmail && $student->jmbag == $registerJmbag){
            $exists = true;
        }
    }

    if($exists){

    }else{
        $ime_prezime = $registerIme . ' ' . $registerPrezime;
        $novi_student = array(
            'post_author' => $current_user->ID, 
            'post_type' => 'student',
            'post_title' => $ime_prezime,
            'post_content' => 'opis novog studenta',
            'post_status' => 'publish',
            'tax_input' => array( 
                'godine_studija' => '1'
            ),
            'meta_input' => array(
                    'ime_studenta'   => $registerIme,
                    'prezime_studenta' => $registerPrezime,
                    'datum_rodenja_studenta' => $registerDatumRod,
                    'adresa_studenta' => $registerAdresa,
                    'grad_studenta' => $registerGrad,
                    'broj_mobitela_studenta' => $registerBrojMobitela,
                    'email_studenta' => $registerEmail,
                    'student_zaporka' => $registerZaporka,
                    'ects_bodovi' => $registerECTS,
                    'prosjek_ocjena' => $registerProsjek,
                    'jmbag' => $registerJmbag
            )
        );


        wp_insert_post($novi_student);


        $studenti = get_posts($args);

        $student = $studenti[0];

        header('location: http://localhost/studom/login/');

        $termObj  = get_term_by( 'id', '1', 'godine_studija');
        wp_set_object_terms($student->ID, $termObj, $taxonomy);
    }
    
    

    
    die;
}
//---------------------------------------------------------------------------
//LOGIN STUDENT/OSOBLJE
//---------------------------------------------------------------------------





function doAction($uid, $uemail, $upass, $action){
    $login_id = null;


    class oOsoba{
        public $user_id="N/A";
        public $email="N/A";
        public $password="N/A";
    }

    try
    {
    	$oConnection = new PDO("mysql:host=localhost;dbname=wpstudom", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch (PDOException $pe)
    {
    	die("Could not connect to the database");
    }

    switch($action){
        case 'login':
            $users = array();

            $sQuery = $oConnection->prepare("SELECT * FROM registered_users WHERE user_email = ? AND user_password = ? LIMIT 1");
            $sQuery->execute(array($uemail,$upass));
            if($sQuery->rowCount() != 0) {
                $oRow = $sQuery->fetch(PDO::FETCH_BOTH);
                $login_id = $oRow['user_id'];
            }
            break;
        case 'register':
            $users = array();
            $sQuery = "SELECT * FROM registered_users";
            while ($oRow = $oRecord->fetch(PDO::FETCH_BOTH))
            {
                $oUser=new oOsoba(
			    	$oRow['user_id'],
			    	$oRow['user_email'],
			    	$oRow['user_password']
			    );
			    array_push($users, $oUser);
            }
            //$successfull = true;
            break;
    }

    return $login_id;
}

function DajPostKomentare($user_id, $post_id){

    //soba id 312
    //user id 69

    $sKomentarHTML='';
    $oKomentari = array();

    $commentStatus = 0;
    
    $oKomentar = array();
    
	try
    {
    	$oConnection = new PDO("mysql:host=localhost;dbname=wpstudom", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch (PDOException $pe)
    {
    	die("Could not connect to the database");
    }

    $sQuery = "SELECT * FROM user_messages WHERE post_id=" . $post_id;
	$oRecord = $oConnection->query($sQuery);

	while ($oRow = $oRecord->fetch(PDO::FETCH_BOTH))
	{
	    $hasComments = true;
	    if ($hasComments)
	    {
	        $oKomentar = new Komentar($oRow['message_id'], $oRow['user_id'], $oRow['post_id'], $oRow['date_time'], $oRow['content']);
	        array_push($oKomentari, $oKomentar);
	        $commentStatus = 1;
	    }
    }

    if($commentStatus == 1){
        $sKomentarHTML = '<table class="tableKomentari table-hover"><thead>
                                <tr>
                                    <th>Komentari</th>
                                    <th></th>
                                    <th>Objavljeno</th>
                                </tr>
                            </thead><tbody>';
        foreach($oKomentari as  $komentar){
            if($komentar->user_id == $user_id){
                
                $sKomentarHTML .='<tr>
                                    <td><h4><strong>'.DajUserTitlePoId($komentar->user_id).'</strong>, <br>'.$komentar->sadrzaj.'</h4></td>
                                    <td></td>
                                    <td><p>'.$komentar->datum_vrijeme.'</p></td></tr>';
            }
        }
    }else{
        $sKomentarHTML .= '<br><h4>Nema komentara</h4>';
    }

    $sKomentarHTML .='</tbody></table><br><div class="contact-form">
    <div>
        </div>
        <form  class="comments" onsubmit="AppendNewComment();SaveNewComment(); return false">
            <div class="form-group">
                <label for="postKomentar">Email</label>
                <input id="postKomentar" name="postKomentar" type="text" class="form-control" placeholder="komentar" required="required" />
            </div>
            <input id="postUid" name="postId" value="'.$post_id.'" type="hidden" />
                <button class="btn" type="submit">Pošalji</button>
        </form>
    </div>
    <script>
    
    function AppendNewComment(){
        var newComment=$("#postKomentar").val();
        if($("#postKomentar").val()==""){

        }
        else{
            var commentstring="<tr>"+
            "<td><b><br></b>"+newComment+"</td>"+
            "<td></td>"+
            "<td>' . DatumVrijeme(3) . '</td>"+
            "</tr>";
        $(".tableKomentari tbody").append(commentstring);
        $("#postKomentar").val("");
        }
    }
    
    </script>';
    
    return $sKomentarHTML;

}

$sActionID="";
if(isset($_POST['action_id']))
{
    try
    {
    	$oConnection = new PDO("mysql:host=localhost;dbname=wpstudom", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch (PDOException $pe)
    {
    	die("Could not connect to the database");
    }

    $sActionID=$_POST['action_id'];
    switch ($sActionID) 
    {
    case 'add_new_comment':
        $sQuery = "INSERT INTO user_messages (user_id, post_id, content) VALUES (:user_id, :post_id, :content )";
		$oStatement = $oConnection->prepare($sQuery);
		$oData = array(
		 'user_id' => $_COOKIE["user_id"],
		 'post_id' => $_POST['post_id'],
		 'content' => $_POST['content']
		);
		try
		{
			$oStatement=$oConnection->prepare($sQuery);
			$oStatement->execute($oData);
		}
		catch(PDOException $error)
		{
			echo $error;
		}
        break;
    }
}

function DatumVrijeme($n)
{
    $d = strtotime("now");
    if ($n == 2)
    {
        return date("Y-m-d H:i", $d);
    }
    if ($n == 3)
    {
        return date("Y-m-d H:i:s", $d);
    }
}

function DajUserTitlePoId($id){
    $args = array(
        'p' => $id,
        'post_type' => 'student',
        'post_status' => 'publish'
    );

    $studenti = get_posts($args);

    $ime_prezime = '';
    foreach($studenti as $student){
        $ime_prezime = $student->post_title;
    }
    return $ime_prezime;
}
function DajUserUrlPoId($id){
    $args = array(
        'p' => $id,
        'post_type' => 'student',
        'post_status' => 'publish'
    );

    $studenti = get_posts($args);

    $student_url = '';
    foreach($studenti as $student){
        $student_url = $student->guid;
    }
    return $student_url;
}

//---------------------------------------------------------------------------
//SOBE TAKSONOMIJE
//KAT SOBE
//---------------------------------------------------------------------------
function registriraj_taksonomiju_kat_sobe(){
    $labels = array(
        'name' => _x('Katovi ', 'Taxonomy General Name', 'studom_vt') ,
        'singular_name' => _x('Kat', 'Taxonomy Singular Name', 'studom_vt') ,
        'menu_name' => __('Katovi', 'studom_vt') ,
        'all_items' => __('Svi katovi', 'studom_vt') ,
        'parent_item' => __('Roditeljsko zvanje', 'studom_vt') ,
        'parent_item_colon' => __('Roditeljsko zvanje', 'studom_vt') ,
        'new_item_name' => __('Novi kat', 'studom_vt') ,
        'add_new_item' => __('Dodaj novi kat', 'studom_vt') ,
        'edit_item' => __('Uredi kat', 'studom_vt') ,
        'update_item' => __('Ažuiriraj kat', 'studom_vt') ,
        'view_item' => __('Pogledaj kat', 'studom_vt') ,
        'separate_items_with_commas' => __('Odvojite katove sa zarezima', 'studom_vt') ,
        'add_or_remove_items' => __('Dodaj ili ukloni kat', 'studom_vt') ,
        'choose_from_most_used' => __('Odaberi među najčešće korištenima', 'studom_vt') ,
        'popular_items' => __('Popularni katovi', 'studom_vt') ,
        'search_items' => __('Pretraga', 'studom_vt') ,
        'not_found' => __('Nema rezultata', 'studom_vt') ,
        'no_terms' => __('Nema katova', 'studom_vt') ,
        'items_list' => __('Lista katova', 'studom_vt') ,
        'items_list_navigation' => __('Navigacija', 'studom_vt') ,
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('kat', array(
        'soba'
    ) , $args);
}


//---------------------------------------------------------------------------
//SOBE META BOXES
//Studenti u sobi
//---------------------------------------------------------------------------
function add_meta_box_hidden_zauzece(){
    add_meta_box('studom_vsmti_hidden_zauzece', 'Zauzeće', 'html_meta_box_hidden_zauzece', 'soba', 'side');
}
function html_meta_box_hidden_zauzece($post)
{
    $sHtml = '';

    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'student',
        'post_status' => 'publish',
    );

    $studenti = get_posts($args);

    $hasStudents = false;
    $lMyStudents = array();

    foreach ($studenti as $student)
    {
        if ($student->soba_student == $post->ID)
        {
            array_push($lMyStudents, $student);
            $hasStudents = true;
        }
    }

    if ($hasStudents == true)
    {
        $rbr = 1;
        foreach ($lMyStudents as $student)
        {
            $id = $student->ID;
            $sHtml .= '<h4> Student ' . $rbr . ' : <a href="http://localhost/studom/wp-admin/post.php?post=' . $id . '&action=edit"> ' . $student->post_title . '</a> </h4>';
            $rbr++;
        }
    }
    if ($hasStudents == false)
    {
        $sHtml .= '<h4> Soba nema studenata</h4>';
    }

    echo '<div>
            <table>
                    <tr>
                        ' . $sHtml . '
                    </tr>
            </table>
    </div>';
}


//---------------------------------------------------------------------------
//SOBE META BOXES
//Broj sobe
//---------------------------------------------------------------------------
function add_meta_box_broj_sobe(){
    add_meta_box('studom_vsmti_broj_sobe', 'Broj sobe', 'html_meta_box_broj_sobe', 'soba');
}
function html_meta_box_broj_sobe($post){
    wp_nonce_field('spremi_broj_sobe', 'broj_sobe_nounce');

    $broj = get_post_meta($post->ID, 'broj_sobe', true);

    $naslov = get_the_title($post->ID);

    $broj = $naslov;

    echo '<div>
            <p>Broj sobe se automatski dodjeljuje na temelju samog naziva sobe u prvom gornjem obrascu</p>
            <table>
                    <tr>
                        <td><!--broj--><label for="fake_broj">Broj sobe: </label> </td>
                        <td><input type="text" id="fake_broj" name="fake_broj" value="' . $broj . '" /> </td>
                    </tr>
                    <input type="hidden" type="text" id="broj_sobe" name="broj_sobe" value="' . $broj . '" />
            </table>
    </div>';
}
function spremi_broj_sobe($post_id){
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);

    $is_valid_nonce_broj = (isset($_POST['broj_sobe_nounce']) && wp_verify_nonce($_POST['broj_sobe_nounce'], basename(__FILE__))) ? 'true' : 'false';

    if ($is_autosave || $is_revision || !$is_valid_nonce_broj)
    {
        return;
    }
    if (!empty($_POST['broj_sobe']))
    {
        update_post_meta($post_id, 'broj_sobe', $_POST['broj_sobe']);
    }
    else
    {
        delete_post_meta($post_id, 'broj_sobe');
    }
}





//---------------------------------------------------------------------------
//OSOBLJE TAKSONOMIJE
// Mjesto rada
//---------------------------------------------------------------------------
function registriraj_taksonomiju_mjesto_rada(){
    $labels = array(
        'name' => _x('Mjesto Rada', 'Taxonomy General Name', 'studom_vt') ,
        'singular_name' => _x('Mjesto Rada', 'Taxonomy Singular Name', 'studom_vt') ,
        'menu_name' => __('Mjesto Rada', 'studom_vt') ,
        'all_items' => __('Sva Mjesta Rada', 'studom_vt') ,
        'parent_item' => __('Mjesto Rada', 'studom_vt') ,
        'parent_item_colon' => __('Mjesto Rada', 'studom_vt') ,
        'new_item_name' => __('Novo Mjesto Rada', 'studom_vt') ,
        'add_new_item' => __('Dodaj Mjesto Rada', 'studom_vt') ,
        'edit_item' => __('Uredi Mjesto Rada', 'studom_vt') ,
        'update_item' => __('Ažuriraj Mjesto Rada', 'studom_vt') ,
        'view_item' => __('Pogledaj Mjesto Rada', 'studom_vt') ,
        'separate_items_with_commas' => __('Odvojite Mjesto Rada točkom', 'studom_vt') ,
        'add_or_remove_items' => __('Dodaj ili ukloni Mjesto Rada', 'studom_vt') ,
        'choose_from_most_used' => __('Odaberi među najčešće korištenima', 'studom_vt') ,
        'popular_items' => __('Popularna Mjesta Rada', 'studom_vt') ,
        'search_items' => __('Pretraga', 'studom_vt') ,
        'not_found' => __('Nema rezultata', 'studom_vt') ,
        'no_terms' => __('Nema Mjesta Rada', 'studom_vt') ,
        'items_list' => __('Lista Mjesta Rada', 'studom_vt') ,
        'items_list_navigation' => __('Navigacija', 'studom_vt') ,
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('mjesto_rada', array(
        'osoblje'
    ) , $args);

}


//---------------------------------------------------------------------------
//OSOBLJE META BOXES
// Radno vrijeme
//---------------------------------------------------------------------------
function add_meta_box_radno_vrijeme(){
    add_meta_box('studom_vsmti_osoblje_radno_vrijeme', 'Radno vrijeme', 'html_meta_box_osoblje', 'osoblje');
}
function html_meta_box_osoblje($post){
    wp_nonce_field('spremi_radno_vrijeme_osoblja', 'radno_vrijeme_od_nounce');
    wp_nonce_field('spremi_radno_vrijeme_osoblja', 'radno_vrijeme_do_nounce');
    wp_nonce_field('spremi_radno_vrijeme_osoblja', 'radni_dani_od_nounce');
    wp_nonce_field('spremi_radno_vrijeme_osoblja', 'radni_dani_do_nounce');

    $radno_vrijeme_od = get_post_meta($post->ID, 'radno_vrijeme_osoblja_od', true);
    $radno_vrijeme_do = get_post_meta($post->ID, 'radno_vrijeme_osoblja_do', true);
    $radni_dani_od = get_post_meta($post->ID, 'radni_dani_osoblja_od', true);
    $radni_dani_do = get_post_meta($post->ID, 'radni_dani_osoblja_do', true);

    echo '
        <div>
            <div>
                <!--VRIJEME-->
                <label for="radno_vrijeme_osoblja_od">Vrijeme od: </label>
                <input type="time" id="radno_vrijeme_osoblja_od"
                name="radno_vrijeme_osoblja_od" value="' . $radno_vrijeme_od . '" />

                <!--DANI-->
                <label for="radni_dani_osoblja_od">|   Od dana: </label>
                <input type="date" id="radni_dani_osoblja_od"
                name="radni_dani_osoblja_od" value="' . $radni_dani_od . '" />
            </div><br/>
            <div>
                <!--VRIJEME-->
                <label for="radno_vrijeme_osoblja_do">Vrijeme do: </label>
                <input type="time" id="radno_vrijeme_osoblja_do"
                name="radno_vrijeme_osoblja_do" value="' . $radno_vrijeme_do . '" />

                <!--DANI-->
                <label for="radni_dani_osoblja_do">|   Do dana: </label>
                <input type="date" id="radni_dani_osoblja_do"
                name="radni_dani_osoblja_do" value="' . $radni_dani_do . '" />
            </div><br/>
        </div>';
}
function spremi_radno_vrijeme_osoblja($post_id){
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);

    $is_valid_nonce_radno_vrijeme_od = (isset($_POST['radno_vrijeme_od_nounce']) && wp_verify_nonce($_POST['radno_vrijeme_od_nounce'], basename(__FILE__))) ? 'true' : 'false';

    $is_valid_nonce_radno_vrijeme_do = (isset($_POST['radno_vrijeme_do_nounce']) && wp_verify_nonce($_POST['radno_vrijeme_do_nounce'], basename(__FILE__))) ? 'true' : 'false';

    $is_valid_nonce_radni_dani_od = (isset($_POST['radni_dani_od_nounce']) && wp_verify_nonce($_POST['radni_dani_od_nounce'], basename(__FILE__))) ? 'true' : 'false';

    $is_valid_nonce_radni_dani_do = (isset($_POST['radni_dani_do_nounce']) && wp_verify_nonce($_POST['radni_dani_do_nounce'], basename(__FILE__))) ? 'true' : 'false';

    if ($is_autosave || $is_revision || !$is_valid_nonce_radno_vrijeme_od || !$is_valid_nonce_radno_vrijeme_do || !$is_valid_nonce_radni_dani_od || !$is_valid_nonce_radni_dani_do)
    {
        return;
    }
    if (!empty($_POST['radno_vrijeme_osoblja_od']))
    {
        update_post_meta($post_id, 'radno_vrijeme_osoblja_od', $_POST['radno_vrijeme_osoblja_od']);
    }
    else
    {
        delete_post_meta($post_id, 'radno_vrijeme_osoblja_od');
    }
    if (!empty($_POST['radno_vrijeme_osoblja_do']))
    {
        update_post_meta($post_id, 'radno_vrijeme_osoblja_do', $_POST['radno_vrijeme_osoblja_do']);
    }
    else
    {
        delete_post_meta($post_id, 'radno_vrijeme_osoblja_do');
    }
    if (!empty($_POST['radni_dani_osoblja_od']))
    {
        update_post_meta($post_id, 'radni_dani_osoblja_od', $_POST['radni_dani_osoblja_od']);
    }
    else
    {
        delete_post_meta($post_id, 'radni_dani_osoblja_od');
    }
    if (!empty($_POST['radni_dani_osoblja_do']))
    {
        update_post_meta($post_id, 'radni_dani_osoblja_do', $_POST['radni_dani_osoblja_do']);
    }
    else
    {
        delete_post_meta($post_id, 'radni_dani_osoblja_do');
    }
}


//---------------------------------------------------------------------------
//OSOBLJE META BOXES
// Osobni podaci
//---------------------------------------------------------------------------
function add_meta_box_osobni_podaci_osoblja(){
    add_meta_box('studom_vsmti_osoblje_osobni_podaci', 'Osobni podaci', 'html_meta_box_osoblje_osobni_podaci', 'osoblje', 'side');
}
function html_meta_box_osoblje_osobni_podaci($post){
    wp_nonce_field('spremi_osobne_podatke_osoblja', 'ime_osoblja_nounce');
    wp_nonce_field('spremi_osobne_podatke_osoblja', 'prezime_osoblja_nounce');
    wp_nonce_field('spremi_osobne_podatke_osoblja', 'datum_rodenja_osoblja_nounce');
    wp_nonce_field('spremi_osobne_podatke_osoblja', 'adresa_osoblja_nounce');
    wp_nonce_field('spremi_osobne_podatke_osoblja', 'grad_osoblja_nounce');
    wp_nonce_field('spremi_osobne_podatke_osoblja', 'broj_mobitela_osoblja_nounce');
    wp_nonce_field('spremi_osobne_podatke_osoblja', 'email_osoblja_nounce');
    wp_nonce_field('spremi_osobne_podatke_osoblja', 'osoblje_zaporka_nounce');

    $ime = get_post_meta($post->ID, 'ime_osoblja', true);
    $prezime = get_post_meta($post->ID, 'prezime_osoblja', true);
    $datum_rodenja = get_post_meta($post->ID, 'datum_rodenja_osoblja', true);
    $adresa = get_post_meta($post->ID, 'adresa_osoblja', true);
    $grad = get_post_meta($post->ID, 'grad_osoblja', true);
    $broj_mobitela = get_post_meta($post->ID, 'broj_mobitela_osoblja', true);
    $email_osoblja = get_post_meta($post->ID, 'email_osoblja', true);
    $osoblje_zaporka = get_post_meta($post->ID, 'osoblje_zaporka', true);

    $osoblje_zaporka = "test123";

    echo '<div>
                <table>
                        <tr>
                            <td><!--IME--><label for="ime_osoblja">Ime: </label> </td>
                            <td><input type="text" id="ime_osoblja" name="ime_osoblja" value="' . $ime . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--PREZIME--> <label for="prezime_osoblja">Prezime: </label>  </td>
                            <td><input type="text" id="prezime_osoblja" name="prezime_osoblja" value="' . $prezime . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--DATUM RODENJA--> <label for="datum_rodenja_osoblja">Datum rođenja: </label> </td>
                            <td><input type="date" id="datum_rodenja_osoblja" name="datum_rodenja_osoblja" value="' . $datum_rodenja . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--ADRESA--> <label for="adresa_osoblja">Adresa: </label> </td>
                            <td><input type="text" id="adresa_osoblja" name="adresa_osoblja" value="' . $adresa . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--MJESTO PREBIVALISTA--> <label for="grad_osoblja">Grad: </label>  </td>
                            <td><input type="text" id="grad_osoblja" name="grad_osoblja" value="' . $grad . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--BROJ MOBITELA--> <label for="broj_mobitela_osoblja">Broj mobitela: </label>  </td>
                            <td><input type="tel" placeholder="099-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="broj_mobitela_osoblja" name="broj_mobitela_osoblja" value="' . $broj_mobitela . '" /> </td>
                        </tr>
                        <tr>
                            <td><!--EMAIL--> <label for="email_osoblja">Email: </label>  </td>
                            <td><input type="email" id="email_osoblja" name="email_osoblja" value="' . $email_osoblja . '" /> </td>
                        </tr>
                        <input type="hidden" type="text" id="osoblje_zaporka" name="osoblje_zaporka" value="' . $osoblje_zaporka . '" />
                </table>
        </div>';
}
function spremi_osobne_podatke_osoblja($post_id){
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);

    $is_valid_nonce_ime = (isset($_POST['ime_osoblja_nounce']) && wp_verify_nonce($_POST['ime_osoblja_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_prezime = (isset($_POST['prezime_osoblja_nounce']) && wp_verify_nonce($_POST['prezime_osoblja_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_datum_rodenja = (isset($_POST['datum_rodenja_osoblja_nounce']) && wp_verify_nonce($_POST['datum_rodenja_osoblja_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_adresa = (isset($_POST['adresa_osoblja_nounce']) && wp_verify_nonce($_POST['adresa_osoblja_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_grad = (isset($_POST['grad_osoblja_nounce']) && wp_verify_nonce($_POST['grad_osoblja_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_broj_mobitela = (isset($_POST['broj_mobitela_osoblja_nounce']) && wp_verify_nonce($_POST['broj_mobitela_osoblja_nounce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_email_osoblja = (isset($_POST['email_osoblja_nonce']) && wp_verify_nonce($_POST['email_osoblja_nonce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_osoblje_zaporka = (isset($_POST['osoblje_zaporka_nonce']) && wp_verify_nonce($_POST['osoblje_zaporka_nonce'], basename(__FILE__))) ? 'true' : 'false';

    if ($is_autosave || $is_revision || !$is_valid_nonce_ime || !$is_valid_nonce_prezime || !$is_valid_nonce_datum_rodenja || !$is_valid_nonce_adresa || !$is_valid_nonce_grad || !$is_valid_nonce_broj_mobitela || !$is_valid_nonce_email_osoblja || !$is_valid_nonce_osoblje_zaporka)
    {
        return;
    }
    if (!empty($_POST['ime_osoblja']))
    {
        update_post_meta($post_id, 'ime_osoblja', $_POST['ime_osoblja']);
    }
    else
    {
        delete_post_meta($post_id, 'ime_osoblja');
    }
    if (!empty($_POST['prezime_osoblja']))
    {
        update_post_meta($post_id, 'prezime_osoblja', $_POST['prezime_osoblja']);
    }
    else
    {
        delete_post_meta($post_id, 'prezime_osoblja');
    }
    if (!empty($_POST['datum_rodenja_osoblja']))
    {
        update_post_meta($post_id, 'datum_rodenja_osoblja', $_POST['datum_rodenja_osoblja']);
    }
    else
    {
        delete_post_meta($post_id, 'datum_rodenja_osoblja');
    }
    if (!empty($_POST['adresa_osoblja']))
    {
        update_post_meta($post_id, 'adresa_osoblja', $_POST['adresa_osoblja']);
    }
    else
    {
        delete_post_meta($post_id, 'adresa_osoblja');
    }
    if (!empty($_POST['grad_osoblja']))
    {
        update_post_meta($post_id, 'grad_osoblja', $_POST['grad_osoblja']);
    }
    else
    {
        delete_post_meta($post_id, 'grad_osoblja');
    }
    if (!empty($_POST['broj_mobitela_osoblja']))
    {
        update_post_meta($post_id, 'broj_mobitela_osoblja', $_POST['broj_mobitela_osoblja']);
    }
    else
    {
        delete_post_meta($post_id, 'broj_mobitela_osoblja');
    }
    if (!empty($_POST['email_osoblja']))
    {
        update_post_meta($post_id, 'email_osoblja', $_POST['email_osoblja']);
    }
    else
    {
        delete_post_meta($post_id, 'email_osoblja');
    }
    if (!empty($_POST['osoblje_zaporka']))
    {
        update_post_meta($post_id, 'osoblje_zaporka', $_POST['osoblje_zaporka']);
    }
    else
    {
        delete_post_meta($post_id, 'osoblje_zaporka');
    }
}


//---------------------------------------------------------------------------
//OSOBLJE FUNCTIONS
//---------------------------------------------------------------------------
function DajOsoblje($slug)
{
    $sHtml = "";
    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'osoblje',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'mjesto_rada',
                'field' => 'slug',
                'terms' => $slug
            )
        )
    );
    $sThumbnailOsoblje = "";
    $lOsoblje = get_posts($args);

    foreach ($lOsoblje as $clan)
    {
        if (get_the_post_thumbnail_url($clan->ID))
        {
            $sThumbnailOsoblje = get_the_post_thumbnail_url($clan->ID);
        }
        else
        {
            $sThumbnailOsoblje = get_template_directory_uri() . '/images/profile.png';
        }
        $sOsobljeUrl = $clan->guid;
        $sOsobljeNaziv = $clan->post_title;
        $sHtml .= '<div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img href="' . $sOsobljeUrl . '" src="' . $sThumbnailOsoblje . '" alt="">
                            </div>
                            <div class="team-text">
                                <a href="' . $sOsobljeUrl . '" class=""><h2>' . $sOsobljeNaziv . '</h2></a>
                            </div>
                        </div>
                    </div>';
    }
    return $sHtml;
}

//---------------------------------------------------------------------------
//KATEGORIJE: NOVOSTI I OBAVIJESTI
//---------------------------------------------------------------------------


function DajStudenteSaSobama()
{
    $lStudentiSaSobama = array();

    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'student',
        'post_status' => 'publish',
    );

    $studenti = get_posts($args);


    foreach ($studenti as $student)
    {
        if ($student->soba_student != 0 && $student->soba_student != null)
        {
            array_push($lStudentiSaSobama, $student);
        }
    }

    return $lStudentiSaSobama;
}


function DajSobePoKatu($slug)
{
    $args = array(
        'post_type' => 'soba',
        'post_status' => 'publish',
        'tax_query' => array(
        array(
        'taxonomy' => 'kat',
        'field' => 'slug',
        'terms' => $slug
        )
        ));

        $lSobe = get_posts( $args );

    $n = 3;
    $counter = 0;

    $sHtml = '<section id="one" class="wrapper">
                <div class="inner">
                    <div class="flex flex-3">';

    foreach ($lSobe as $soba)
    {
            if ($counter < $n)
            {
                $sHtml .= '
                    <article>
                        <!--<div class="image fit">
		        			<img src="images/pic01.jpg" alt="Pic 01" />
		        		</div>-->
		        		<header>
		        			<h3>' . $soba->post_title  . '</h3>
		        		</header>
		        		<p>Tip sobe: ' . $soba->tip_kupaonice . '</p>
                        <p>Broj kreveta ' . $soba->tip_sobe . '</p>
		        		<footer>
		        			<a href="' . $soba->guid . '" class="button special">Vidi</a>
		        		</footer>
		        	</article>
                ';
                $counter++;
            }
            else
            {
                $sHtml .= '</div>
                            </div>
                                </section>
                                <section id="one" class="wrapper">
                            <div class="inner">
                        <div class="flex flex-3">';
                $n += 3;
            }
        
    }
    echo $sHtml;
}

function UpdateRoomContent(){

    $lSobe = array();

    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'soba',
        'post_status' => 'publish'
    );

    $sobe = get_posts($args);

    foreach ($sobe as $soba)
    {
        $id = $soba->ID;
        $stringContent = '';
    
        if(strtolower($soba->tip_sobe) == 'jednokrevetna'){

            $stringContent = '<p>Jednokrevetna soba s kupaonicom, mini kuhinjom, klimom, mini hladnjakom i TV – om</p>';

            $my_post = array(
                'post_type' => 'soba',
                'ID' => $id,
                'post_content' => $stringContent
            );
           
            wp_update_post( $my_post );

        }
        if(strtolower($soba->tip_sobe) == 'dvokrevetna'){

            $stringContent = '<p>dvokrevetna soba s kupaonicom, klimom, mini kuhinjom, mini hladnjakom i TV – om</p>';

            $my_post = array(
                'post_type' => 'soba',
                'ID' => $id,
                'post_content' => $stringContent
            );
           
            wp_update_post( $my_post );

        }
    }
}

function ProvjeriKapacitetSobe($soba){


    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'student',
        'post_status' => 'publish',
    );

    $lStudenti = get_posts($args);

    $status = 0;
    foreach($lStudenti as $student){
        $studentSoba = get_post_meta($student->ID, 'soba_student', true);
        if($soba->ID == $studentSoba){
            $status++;
        }
    }
    return $status;
}

function DajBrojSobePoId($id)
{
    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'soba',
        'post_status' => 'publish',
    );
    $sobe = get_posts($args);
    foreach ($sobe as $soba)
    {
        if ($soba->ID == $id)
        {
            return $soba->post_title;
        }
    }
}
function DajSobuPoId($id)
{
    $args = array(
        'posts_per_page' => - 1,
        'post_type' => 'soba',
        'post_status' => 'publish',
    );
    $sobe = get_posts($args);
    foreach ($sobe as $soba)
    {
        if ($soba->ID == $id)
        {
            return $soba;
        }
    }
}
function shortenContent($string){
    $myString=''; 
    if(strlen($string)<100){
        $myString = $string;
    }else{
        $mystring = substr($string, 0, 100);
    }

    return $myString;
}
    


add_action('init', 'registriraj_dodatni_sadrzaj_cpt', 0);
add_action('add_meta_boxes', 'add_meta_box_osobni_podaci_osoblja');
add_action('save_post', 'spremi_osobne_podatke_osoblja');
add_action('add_meta_boxes', 'add_meta_box_radno_vrijeme');
add_action('save_post', 'spremi_radno_vrijeme_osoblja');
add_action('init', 'registriraj_taksonomiju_mjesto_rada', 0);
add_action('init', 'registriraj_osoblje_cpt', 0);
add_action('add_meta_boxes', 'add_meta_box_soba_student');
add_action('save_post', 'spremi_sobu_studenta');
add_action('add_meta_boxes', 'add_meta_box_osobni_podaci_studenta');
add_action('save_post', 'spremi_osobne_podatke_studenta');
add_action('init', 'registriraj_taksonomiju_godina', 0);
add_action('init', 'registriraj_taksonomiju_studijski_programi', 0);
add_action('init', 'registriraj_studenta_cpt', 0);
add_action('add_meta_boxes', 'add_meta_box_broj_sobe');
add_action('save_post', 'spremi_broj_sobe');
add_action('add_meta_boxes', 'add_meta_box_hidden_zauzece');
add_action('widgets_init', 'initialize_my_sidebars');
add_action('init', 'registriraj_sobu_cpt', 0);
add_action('init', 'registriraj_taksonomiju_kat_sobe', 0);

//UCITAVANJE CSS DATOTEKA
function UcitajCssTeme()
{	
    wp_register_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), 1, 'all');
    wp_enqueue_style('bootstrap-css');
    wp_register_style( 'font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', array(), 1, 'all');
    wp_enqueue_style('font-awesome-css');
    wp_register_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap', array(), 1, 'all');
    wp_enqueue_style('google-font');
    wp_register_style( 'glavni-css', get_template_directory_uri() . '/assets/css/style.css', array(), 1, 'all');
    wp_enqueue_style('glavni-css');
    wp_register_style( 'override-css', get_template_directory_uri() . '/style.css', array(), 1, 'all');
    wp_enqueue_style('override-css');
    wp_register_style( 'lightbox-css', get_template_directory_uri() . '/assets/lib/lightbox/css/lightbox.css', array(), 1, 'all');
    wp_enqueue_style('lightbox-css');
    wp_register_style( 'lightbox-min-css', get_template_directory_uri() . '/assets/lib/lightbox/css/lightbox.min.css', array(), 1, 'all');
    wp_enqueue_style('lightbox-min-css');
    wp_register_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.css', array(), 1, 'all');
    wp_enqueue_style('owl-carousel-css');
    wp_register_style( 'owl-carousel-min-css', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css', array(), 1, 'all');
    wp_enqueue_style('owl-carousel-min-css');
    wp_register_style( 'owl-default-css', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.theme.default.css', array(), 1, 'all');
    wp_enqueue_style('owl-default-css');
    wp_register_style( 'owl-default-min-css', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.theme.default.min.css', array(), 1, 'all');
    wp_enqueue_style('owl-default-min-css');
    wp_register_style( 'owl-green-css', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.theme.green.css', array(), 1, 'all');
    wp_enqueue_style('owl-green-css');
    wp_register_style( 'owl-green-min-css', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.theme.green.min.css', array(), 1, 'all');
    wp_enqueue_style('owl-green-min-css');
}
add_action( 'wp_enqueue_scripts', 'UcitajCssTeme' );

//UCITAVANJE JS DATOTEKA
function UcitajJsTeme()
{		

    wp_enqueue_script('jquery-min-js', 'https://code.jquery.com/jquery-3.4.1.min.js', array('jquery'), true);	
    //wp_enqueue_script('jquery-min-js');
    wp_enqueue_script('easing-jquery-min-js', get_template_directory_uri().'/assets/lib/easing/easing.min.js',array('jquery'), true);	
    //wp_enqueue_script('easing-jquery-min-js');
    wp_enqueue_script('easing-jquery-js', get_template_directory_uri().'/assets/lib/easing/easing.js',array('jquery'), true);
    //wp_enqueue_script('easing-jquery-js');
    wp_enqueue_script('bootstrap-jquery-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js',array('jquery'), true);
    //wp_enqueue_script('bootstrap-jquery-js');
    wp_enqueue_script('isotope-jquery-min-js', get_template_directory_uri().'/assets/lib/isotope/isotope.pkgd.min.js',array('jquery'), true);
    //wp_enqueue_script('isotope-jquery-min-js');
    wp_enqueue_script('lightbox-jquery-min-js', get_template_directory_uri().'/assets/lib/lightbox/js/lightbox.min.js',array('jquery'), true);	
    //wp_enqueue_script('lightbox-jquery-min-js');
    wp_enqueue_script('lightbox-jquery-js', get_template_directory_uri().'/assets/lib/lightbox/js/lightbox.js',array('jquery'), true);	
    //wp_enqueue_script('lightbox-jquery-js');
    wp_enqueue_script('owl-carousel-js', get_template_directory_uri().'/assets/lib/owlcarousel/owl.carousel.js',array('jquery'), true);
    //wp_enqueue_script('owl-carousel-js');
    wp_enqueue_script('owl-carousel-min-js', get_template_directory_uri().'/assets/lib/owlcarousel/owl.carousel.min.js',array('jquery'), true);
    //wp_enqueue_script('owl-carousel-min-js');
    wp_enqueue_script( 'select2', get_template_directory_uri().'/assets/js/select2/select2.js', array('jquery'), true);
   // wp_enqueue_script('select2');
    wp_enqueue_script('main-js', get_template_directory_uri().'/assets/js/main.js',array('jquery') , true);
    //wp_enqueue_script('main-js');
}

add_action('wp_enqueue_scripts', 'UcitajJsTeme');


