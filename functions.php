<?php

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

add_action('wp_enqueue_scripts', 'site_scripts');
function site_scripts() {
  $version = '0.0.0.0';
  
  wp_dequeue_style( 'wp-block-library' ); //remove block-library
  
  wp_enqueue_style('main-style', get_stylesheet_uri(), [], $version);
  
  wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/app.js',[], $version, true);
  
  wp_localize_script('main-js', 'WPJS', [
    'ajaxUrl' => admin_url('admin-ajax.php'),
  ]);
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields() {
  require_once('includes/carbon-fields-options/theme-options.php');
  require_once('includes/carbon-fields-options/post-meta.php');
}

add_action('init', 'create_global_variable');
function create_global_variable() {
  global $rost23ru;
  $rost23ru = [
    'phone' => carbon_get_theme_option('site_phone'),
    'phone_digits' => carbon_get_theme_option('site_phone_digits'),
    'second_phone' => carbon_get_theme_option('site_second_phone'),
    'second_phone_digits' => carbon_get_theme_option('site_second_phone_digits'),
    'address' => carbon_get_theme_option('site_address'),
    'email' => carbon_get_theme_option('site_email'),
    'vk_url' => carbon_get_theme_option('site_vk_url'),
    'logo_text' => carbon_get_theme_option('site_logo_text'),
  ];
}

function convertToWebpSrc($src) {
  $src_webp = $src . '.webp';
  return  $src_webp;
}

//отправка формы
add_action( 'wp_ajax_send_email', 'rost23ru_send_email' );
add_action( 'wp_ajax_nopriv_send_email', 'rost23ru_send_email' );

function rost23ru_send_email() {
  $method = $_SERVER['REQUEST_METHOD'];
  if ($method !== 'POST') {
    exit();
  }

  $admin_email = 'name@.tmweb.ru';
  $form_subject = 'Заявка с сайта rost-23.ru';
  $message = '';

  $color_counter = 1;

  foreach ($_POST as $key => $value) {
    if ($value === '') {
      continue;
    }
    $color = $color_counter % 2 === 0 ? '#fff' : '#f8f8f8';
    $message .= "
      <tr style='background-color: $color;'>
        <td style='padding: 10px; border: 1px solid #e9e9e9;'>$key</td>
        <td style='padding: 10px; border: 1px solid #e9e9e9;'>$value</td>
      </tr>";

    $color_counter++;
  }

  function adopt($text) {
    return '=?utf-8?B?'.base64_encode($text).'?=';
  }

  $message = "<table style='width: 100%;'>$message</table>";

  $headers  = "MIME-Version: 1.0\r\n"; 
  $headers .= "Content-type: text/html; charset=utf-8\r\n";
  $headers .= "From:" . adopt($form_subject) . " <$admin_email>\r\n";

  $success_send = wp_mail($admin_email, adopt($form_subject), $message, $headers);

  if ($success_send) {
    echo 'success';
  } else {
    echo 'error';
  }
    
    wp_die();
}
