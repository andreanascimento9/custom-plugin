<?php
/*
Plugin Name: Custom Plugin
Description: [custom-plugin]
Author: Kai Global School - Platty - André Nascimento
Version: 1.0
*/
function assets($image) {
	return plugin_dir_url(__FILE__)."assets/$image";
}

// Função para enfileirar os arquivos de script e estilo
function enqueue_custom_assets_custom_plugin() {

	// Enqueue the JavaScript files
	wp_enqueue_script('custom-script-custom-plugin', plugin_dir_url(__FILE__) . 'assets/custom-plugin.js', array('jquery'), null, true);
	
	// Enqueue the CSS styles
	wp_enqueue_style('custom-style-custom-plugin', plugin_dir_url(__FILE__) . 'assets/custom-plugin.css', array(), null, 'all');

	// //bin for ajax security
	// $nonce = wp_create_nonce('kai_ajax_nonce');
	// //locate ajax file
	// wp_localize_script('custom-script-custom-plugin', 'script_ajax', array(
	// 		'ajax_url' => admin_url("admin-ajax.php"),
	// 		'ajax_nonce' => $nonce,
	// ));
}

// Action to enqueue the files on the 'wp_enqueue_scripts' hook
add_action('wp_enqueue_scripts', 'enqueue_custom_assets_custom_plugin');

//Gerar Shortcode
function add_shortcode_custom_plugin() {
	ob_start(); 
	// Caminho para o arquivo de template dentro do seu plugin
	$template_path = plugin_dir_path(__FILE__) . 'template.php';

	// Verifica se o arquivo de template existe
	if (file_exists($template_path)) {
		include $template_path; // Inclui o arquivo de template
	} 

	return ob_get_clean();
}

add_shortcode('custom-plugin', 'add_shortcode_custom_plugin');
