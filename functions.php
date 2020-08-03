<?php
function wpm_enqueue_styles(){
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpm_enqueue_styles' );

// Remove verision gen
function remove_version() {
    return '';
}
add_filter('the_generator', 'remove_version');

// Desactive l'ecriture de fichier
define('DISALLOW_FILE_EDIT', true);

// Windows Live Writer remove
remove_action('wp_head', 'wlwmanifest_link');

remove_action('wp_head', 'rsd_link');

add_filter('xmlrpc_enabled', '__return_false');

//Api Remove
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// X-Content
header('X-Content-Type-Options: nosniff');
// X-Frame
header('X-Frame-Options: SAMEORIGIN');
// X-XSS-Pro
header('X-XSS-Protection: 1; mode=block');
//Referrer
header('Referrer-Policy: same-origin');