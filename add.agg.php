<?php
/*
Plugin Name: Add GitHub Gist
Plugin URI: 
Description: 
Version: 0.1
Author: tDi
*/

add_action('init', 'agg_init');

function agg_init() {
	add_action('admin_menu', 'agg_config_page');
	add_action( 'media_buttons', 'agg_append',12, 2 );
	add_filter('plugin_action_links', 'agg_actions', 10, 2 );
 	add_shortcode('gist', 'agg_shortcode');
	add_action('media_upload_gist','agg_media');
}

function agg_config_page() {
	if ( function_exists('add_options_page') )
		add_options_page('AGG Options', 'Add GitHub Gist', 8, 'agg', 'agg_administrator');
}

function agg_actions($links, $file){
	$this_plugin = plugin_basename(__FILE__);
	
	if ( $file == $this_plugin ){
		$settings_link = '<a href="options-general.php?page=agg">' . __('Use') . '</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}
function agg_append(){
	$title = __('Add Github Gist');
	$icon = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__))."/images/media-button-gist.gif?ver=1"; 
	$type = 'gist';
	
	echo "<a href='" . esc_url( get_upload_iframe_src($type) ) . "' id='add_$type' class='thickbox' title='$title'><img src='" . esc_url(  $icon ) . "' alt='$title' /></a>";
}

function agg_media(){
	include(dirname(__FILE__)."/media.agg.php");
}
function agg_shortcode($atts, $content = null){
	extract(shortcode_atts(array('id' => null,'file' => null), $atts)); 

    if($file){
		$file_append = "?file=".trim($file);
    }
    $return =  '<script src="http://gist.github.com/'.trim($id).'.js'.$file_append.'"></script>';
    return $return;
}


function agg_administrator(){
	include(dirname(__FILE__)."/admin.agg.php");
}