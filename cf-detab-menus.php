<?php
/*
Plugin Name: De-Tabbify Admin Menu UI 
Plugin URI:  
Description: Oh the humanity! 
Version: 1.0.1 
Author: Crowd Favorite
Author URI: http://crowdfavorite.com
*/

// ini_set('display_errors', '1'); ini_set('error_reporting', E_ALL);

load_plugin_textdomain('cf-detab-menus-nav');

function cf_detab_menu_nav() {
?>
<style type="text/css">
#menu-management .nav-tabs-nav {
	margin: 0;
}
#menu-management .nav-tabs .nav-tabs-arrow,
#menu-management .nav-tabs span,
#menu-management .nav-tabs a {
	visibility: hidden;
}
#menu-management .cf-detab {
	padding-bottom: 10px;
	position: relative;
}
#menu-management .cf-detab a.new {
	float: right;
	padding-right: 5px;
}
#menu-management .cf-detab a.toggle {
	background: url(<?php echo admin_url('images/screen-options-toggle.gif'); ?>) top right no-repeat;
	padding: 5px 17px 5px 5px;
}
#menu-management .cf-detab ul {
	background: #fff;
	border: 1px solid #ccc;
	border-radius: 6px;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-top-left-radius: 0;
	-moz-border-top-left-radius: 0;
	-webkit-border-top-left-radius: 0;
	display: none;
	left: 5px;
	margin: 0;
	min-width: 150px;
	padding: 0;
	position: absolute;
	z-index: 100;
}
#menu-management .cf-detab ul li {
	margin: 0;
	padding: 0;
}
#menu-management .cf-detab ul li a {
	border-bottom: 1px solid #ccc;
	display: block;
	padding: 6px 10px;
}
#menu-management .cf-detab ul li.last a {
	border: 0;
	padding-bottom: 7px;
}
#menu-management .cf-detab ul li a:hover {
	background: #f1f1f1;
}
</style>
<script type="text/javascript">
jQuery(function($) {
	var $menu = $('#menu-management');
	var html = '<ul>';
	$menu.find('.nav-tabs a.nav-tab').not('.menu-add-new').each(function() {
		html += '<li><a href="' + $(this).attr('href') + '">' + $(this).html() + '</a></li>';
	});
	html += '</ul>';
	var newLink = '';
	$menu.find('.nav-tabs a.menu-add-new').each(function() {
		newLink += '<a href="' + $(this).attr('href') + '" class="new"><?php _e('New', 'cf-detab-menus-nav'); ?></a>';
	}).end().find('.nav-tabs-nav').html('<div class="cf-detab">' + newLink + '<a href="#" class="toggle"><?php _e('Select Menu', 'cf-detab-menus-nav'); ?></a>' + html + '</div>').end().find('.cf-detab a.toggle').click(function() {
		$menu.find('.cf-detab ul').toggle();
		return false;
	}).end().find('.cf-detab ul li:last').addClass('last');
});
</script>
<?php
}
if (is_admin() && $pagenow == 'nav-menus.php') {
	add_action('admin_head', 'cf_detab_menu_nav');
}

//a:23:{s:11:"plugin_name";s:24:"De-Tabbify Admin Menu UI";s:10:"plugin_uri";N;s:18:"plugin_description";s:16:"Oh the humanity!";s:14:"plugin_version";s:3:"1.0";s:6:"prefix";s:5:"cfdtm";s:12:"localization";s:13:"cf-detab-menu";s:14:"settings_title";N;s:13:"settings_link";N;s:4:"init";b:0;s:7:"install";b:0;s:9:"post_edit";b:0;s:12:"comment_edit";b:0;s:6:"jquery";b:0;s:6:"wp_css";b:0;s:5:"wp_js";b:0;s:9:"admin_css";s:1:"1";s:8:"admin_js";s:1:"1";s:8:"meta_box";b:0;s:15:"request_handler";b:0;s:6:"snoopy";b:0;s:11:"setting_cat";b:0;s:14:"setting_author";b:0;s:11:"custom_urls";b:0;}

?>