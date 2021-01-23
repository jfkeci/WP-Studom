<?php
/*
Plugin Name: Dodatak - kat dežurstva osoblja
Plugin URI: https://github.com/jfkeci
Description: Dodatak za dodavanje mogućnosti odabira kata na kojem određeni član osoblja dežura (Prizemlje, Prvi kat, Drugi kat)
Version: 1.0
Author: Jakov Filip Saboliček
Author URI: https://github.com/jfkeci
Text Domain: studom_vt
*/

function obrisi_post_meta_kat_dezurstva()
{
    delete_post_meta_by_key('kat_dezurstva');
}
register_deactivation_hook(__FILE__, 'obrisi_post_meta_kat_dezurstva');
function add_meta_box_kat_dezurstva()
{
    add_meta_box('vsmti_studom_osoblje_kat', 'Kat dežurstva', 'html_meta_box_kat_dezurstva', 'osoblje');
}
function html_meta_box_kat_dezurstva($post)
{
    wp_nonce_field('spremi_kat_dezurstva', 'kat_dezurstva_nonce');

    $kat_dezurstva = get_post_meta($post->ID, 'kat_dezurstva', true);

    $sSelectedPrizemlje="";
    $sSelectedDrugiKat="";
    $sSelectedTreciKat="";
    if($kat_dezurstva == "prizemlje"){
        $sSelectedPrizemlje = "selected";
        $sSelectedDrugiKat="";
        $sSelectedTreciKat="";
    }if($kat_dezurstva == "prvi_kat"){
        $sSelectedPrizemlje = "";
        $sSelectedDrugiKat="selected";
        $sSelectedTreciKat="";
    }else{
        $sSelectedPrizemlje = "";
        $sSelectedDrugiKat="";
        $sSelectedTreciKat="selected";
    }

    echo '<div>
        <label for="kat_dezurstva">Odaberite na kojem katu član osoblja dežura: </label>
        <select id="kat_dezurstva" name="kat_dezurstva">
        <option value="obavezan" ' . (($kat_dezurstva == 'prizemlje' || $kat_dezurstva == '') ? 'selected' : '') . '>Prizemlje</option> <option value="prvi_kat" ' . (($kat_dezurstva == 'prvi_kat') ? 'selected' : '') . '>Prvi kat</option><option value="drugi_kat" ' . (($kat_dezurstva == 'drugi_kat') ? 'selected' : '') . '>Drugi Kat</option>
        </select>
        </div>';
}
function spremi_kat_dezurstva($post_id)
{
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce_kat_dezurstva = (isset($_POST['kat_dezurstva_nonce']) && wp_verify_nonce($_POST['kat_dezurstva_nonce'], basename(__FILE__))) ? 'true' : 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce_kat_dezurstva)
    {
        return;
    }
    if (!empty($_POST['kat_dezurstva']))
    {
        update_post_meta($post_id, 'kat_dezurstva', $_POST['kat_dezurstva']);
    }
    else
    {
        delete_post_meta($post_id, 'kat_dezurstva');
    }
}
add_action('add_meta_boxes', 'add_meta_box_kat_dezurstva');
add_action('save_post', 'spremi_kat_dezurstva');

?>
