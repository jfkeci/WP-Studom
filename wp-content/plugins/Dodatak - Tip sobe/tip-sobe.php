<?php
/*
Plugin Name: Dodatak - tip sobe
Plugin URI: https://github.com/jfkeci
Description: Dodatak za dodavanje mogućnosti odabira tipa sobe jednokrevetna/dvokrevetna, zasebna kupaona/dijeljena kupaona
Version: 1.0
Author: Jakov Filip Saboliček
Author URI: https://github.com/jfkeci
Text Domain: studom_vt
*/

function obrisi_post_meta_tip_sobe()
{
    delete_post_meta_by_key('tip_sobe');
}
register_deactivation_hook(__FILE__, 'obrisi_post_meta_tip_sobe');
function add_meta_box_tip_sobe()
{
    add_meta_box('vsmti_studom_soba_tip', 'Tip sobe', 'html_meta_box_tip_sobe', 'soba');
}
function html_meta_box_tip_sobe($post)
{
    wp_nonce_field('spremi_tip_sobe', 'tip_sobe_nonce');
    wp_nonce_field('spremi_tip_sobe', 'tip_kupaonice_nonce');

    $tip_sobe = get_post_meta($post->ID, 'tip_sobe', true);
    $tip_kupaonice = get_post_meta($post->ID, 'tip_kupaonice', true);

    $sHtml ='';

    $sSelectedJednokrevetna="";
    $sSelectedDvokrevetna="";
    
    if($tip_sobe == "Jednokrevetna"){
        $sHtml = '';

        $sHtml = '<div>
        <p>Napomena, ako je soba Jednokrevetna, može imati samo zasebnu kupaonicu</p>
        <label for="tip_kupaonice">Tip kupaonice</label>
        <select id="tip_kupaonice" name="tip_kupaonice">
        <option value="Zasebna kupaonica" ' . (($tip_kupaonice == 'Zasebna kupaonica' || $tip_kupaonice == '') ? 'selected' : '') . '>Zasebna kupaonica</option>
        </select>
        </div>';

    }if($tip_sobe == "Dvokrevetna"){
        $sHtml = '';
        
        $sHtml = '<div>
        <label for="tip_kupaonice">Odaberite tip kupaonice </label>
        <select id="tip_kupaonice" name="tip_kupaonice">
        <option value="Zasebna kupaonica" ' . (($tip_kupaonice == 'Zasebna kupaonica' || $tip_kupaonice == '') ? 'selected' : '') 
        . '>Zasebna kupaonica</option> <option value="Dijeljena kupaonica" ' . (($tip_kupaonice == 'Dijeljena kupaonica') ? 'selected' : '') . '>Dijeljena kupaonica</option>
        </select>
        </div>';
    }


    echo '<div>
        <label for="tip_sobe">Odaberite koliko kreveta ima soba</label>
        <select id="tip_sobe" name="tip_sobe">
        <option value="Jednokrevetna" ' . (($tip_sobe == 'Jednokrevetna' || $tip_sobe == '') ? 'selected' : '') 
        . '>Jednokrevetna</option> <option value="Dvokrevetna" ' . (($tip_sobe == 'Dvokrevetna') ? 'selected' : '') . '>Dvokrevetna</option>
        </select>
        </div><br>'.$sHtml;
}
function spremi_tip_sobe($post_id)
{
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce_tip_sobe = (isset($_POST['tip_sobe_nonce']) && wp_verify_nonce($_POST['tip_sobe_nonce'], basename(__FILE__))) ? 'true' : 'false';
    $is_valid_nonce_tip_kupaonice = (isset($_POST['tip_kupaonice_nonce']) && wp_verify_nonce($_POST['tip_kupaonice_nonce'], basename(__FILE__))) ? 'true' : 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce_tip_sobe || !$is_valid_nonce_tip_kupaonice)
    {
        return;
    }
    if (!empty($_POST['tip_sobe']))
    {
        update_post_meta($post_id, 'tip_sobe', $_POST['tip_sobe']);
    }
    else
    {
        delete_post_meta($post_id, 'tip_sobe');
    }
    if (!empty($_POST['tip_kupaonice']))
    {
        update_post_meta($post_id, 'tip_kupaonice', $_POST['tip_kupaonice']);
    }
    else
    {
        delete_post_meta($post_id, 'tip_kupaonice');
    }
}

add_action('add_meta_boxes', 'add_meta_box_tip_sobe');
add_action('save_post', 'spremi_tip_sobe');

?>
