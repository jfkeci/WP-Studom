<?php
/*
Plugin Name: Dodatak - podaci studij
Plugin URI: https://github.com/jfkeci
Description: Dodatak za dodavanje informacija o broju ECTS-a u protekloj godini i prosjeku ocjena
Version: 1.0
Author: Jakov Filip Saboliček
Author URI: https://github.com/jfkeci
Text Domain: studom_vt
*/

function obrisi_post_meta_student_podaci_studij()
{
    delete_post_meta_by_key('student_podaci_studij');
}
register_deactivation_hook(__FILE__, 'obrisi_post_meta_student_podaci_studij');
function add_meta_box_student_podaci_studij()
{
    add_meta_box('vsmti_studom_student_podaci_studij', 'Podaci studij', 'html_meta_box_student_podaci_studij', 'student');
}
function html_meta_box_student_podaci_studij($post)
{
    wp_nonce_field('spremi_student_ects_bodovi', 'ects_bodovi_nonce');
    wp_nonce_field('spremi_student_prosjek_ocjena', 'prosjek_ocjena_nonce');
    wp_nonce_field('spremi_student_prosjek_ocjena', 'jmbag_nonce');

    $ects_bodovi = get_post_meta($post->ID, 'ects_bodovi', true);
    $prosjek_ocjena = get_post_meta($post->ID, 'prosjek_ocjena', true);
    $jmbag = get_post_meta($post->ID, 'jmbag', true);

    echo '<div>
                <table>
                        <tr>
                            <td><!--ECTS--><label for="ects_bodovi">ECTS bodovi u protekloj godini: </label> </td>
                            <td><input type="number" id="ects_bodovi" min="20" max="72" name="ects_bodovi" value="'.$ects_bodovi.'" /> </td>
                        </tr>
                        <tr>
                            <td><!--PROSJEK--> <label for="prosjek_ocjena">Prosjek ocjena u protekloj godini: </label>  </td>
                            <td><input type="number" id="prosjek_ocjena" min="2" max="5" step="0.01" name="prosjek_ocjena" value="'.$prosjek_ocjena.'" /> </td>
                        </tr>
                        <tr>
                            <td><!--JMBAG--> <label for="jmbag">Jmbag: </label>  </td>
                            <td><input type="number" id="jmbag" name="jmbag" value="'.$jmbag.'" /> </td>
                        </tr>
                </table>
        </div>';
}
function spremi_student_podaci_studij($post_id)
{
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);

    $is_valid_nonce_ects_bodovi = (isset($_POST['ects_bodovi_nonce']) && wp_verify_nonce($_POST['ects_bodovi_nonce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_prosjek_ocjena = (isset($_POST['prosjek_ocjena_nonce']) && wp_verify_nonce($_POST['prosjek_ocjena_nonce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_jmbag = (isset($_POST['jmbag_nonce']) && wp_verify_nonce($_POST['jmbag_nonce'], basename(__FILE__))) ? 'true' : 'false';
    
    if ($is_autosave || $is_revision || !$is_valid_nonce_ects_bodovi || !$is_valid_nonce_prosjek_ocjena || !$is_valid_nonce_jmbag)
    {
        return;
    }
    if (!empty($_POST['ects_bodovi']))
    {
        update_post_meta($post_id, 'ects_bodovi', $_POST['ects_bodovi']);
    }
    else
    {
        delete_post_meta($post_id, 'ects_bodovi');
    }
    if (!empty($_POST['prosjek_ocjena']))
    {
        update_post_meta($post_id, 'prosjek_ocjena', $_POST['prosjek_ocjena']);
    }
    else
    {
        delete_post_meta($post_id, 'prosjek_ocjena');
    }
    if (!empty($_POST['jmbag']))
    {
        update_post_meta($post_id, 'jmbag', $_POST['jmbag']);
    }
    else
    {
        delete_post_meta($post_id, 'jmbag');
    }
}
add_action('add_meta_boxes', 'add_meta_box_student_podaci_studij');
add_action('save_post', 'spremi_student_podaci_studij');

?>
