<?php
/**
 * Plugin Name: 02 IMEI Verifier OFF
 * Plugin URI: https://webyblog.es/
 * Description: Un plugin para verificar números IMEI usando el shortcode [imei_verifier]
 * Version: alpha
 * Author: Juan Luis Martel
 * Author URI: https://webyblog.es/
 * License: GPL2
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


function imei_verifier_register_scripts() {
  wp_register_style('imei-verifier-css', plugin_dir_url(__FILE__) . 'styles.css');
  wp_register_script('imei-verifier-js', plugin_dir_url(__FILE__) . 'imei.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'imei_verifier_register_scripts');

function imei_verifier_shortcode() {
  wp_enqueue_style('imei-verifier-css');
  wp_enqueue_script('imei-verifier-js');

  ob_start();
  ?>
  <div class="jl-form-imei">
	  <form onsubmit="event.preventDefault(); validarIMEI();">
	    <label for="imei">Número de IMEI:</label>
	    <input type="text" id="imei" name="imei" pattern="\d{15}" maxlength="15" required>
	    <button type="submit">Verificar IMEI</button>
	  </form>
	  <div id="result" class="result"></div>
  </div>
  <?php
  return ob_get_clean();
}

add_shortcode('imei_verifier', 'imei_verifier_shortcode');
