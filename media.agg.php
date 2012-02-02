<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php do_action('admin_xml_ns'); ?> <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title><?php bloginfo('name') ?> &rsaquo; <?php _e('Add Github Gist'); ?> &#8212; <?php _e('WordPress'); ?></title>
<?php
wp_enqueue_style( 'global' );
wp_enqueue_style( 'wp-admin' );
wp_enqueue_style( 'colors' );
// Check callback name for 'media'
if ( ( is_array( $content_func ) && ! empty( $content_func[1] ) && 0 === strpos( (string) $content_func[1], 'media' ) ) || 0 === strpos( $content_func, 'media' ) )
	wp_enqueue_style( 'media' );
wp_enqueue_style( 'ie' );
?>
<script type="text/javascript">
//<![CDATA[
addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
//]]>
</script>
<?php
do_action('admin_enqueue_scripts', 'media-upload-popup');
do_action('admin_print_styles-media-upload-popup');
do_action('admin_print_styles');
do_action('admin_print_scripts-media-upload-popup');
do_action('admin_print_scripts');
do_action('admin_head-media-upload-popup');
do_action('admin_head');
//addExtImage.insert()
?>
<link rel='stylesheet' id='colors-css'  href='<?php echo WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__))?>style.css?ver=1' type='text/css' media='all' />
<script type="text/javascript">
//<![CDATA[
var addExtGist = {
	insert : function() {
		var t = this, html, f = document.forms[0], cls, title = '', alt = '', caption = '';

		if ( '' == f.gist.value){
			return false;
		}

		html = '[gist id="'+f.gist.value+'"]';

		
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor(html);
		return false;
	},
}
//]]>
</script>
</head>
<body<?php if ( isset($GLOBALS['body_id']) ) echo ' id="' . $GLOBALS['body_id'] . '"'; ?> class="agg">
<div class="clear"></div>
<h2><?php _e('Add Github Gist'); ?></h2>
<?php
	do_action('admin_print_footer_scripts');
?>
<form action="<?php echo esc_url( get_upload_iframe_src("gist") ) ?>" method="post">
<input type="text" name="gist" id="gist-input" />

<input type="submit" value="invia" onclick="addExtGist.insert()" />
</form>
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>
