<?php

/*
  Plugin Name: Word Filter Plugin 
  Description: Replaces a list of words.
	Author: Kaja
*/

if ( ! defined( 'ABSPATH' ) ) exit;	//Exit if accessed directly

class WordFilterPlugin {
	function __construct() {
		add_action('admin_menu', array($this, 'ourMenu'));
	}

	function ourMenu() {
		//1st arg - document title
		//2nd arg - the text that will show up in the admin side bar
		//3rd arg - capability
		//4th arg - slug/short name
		//5th arg - function that outputs the HTML for the actual page itself 
		//6th arg - menu icon
		//7th arg - the number that controls where the menu will appear in the side bar, the bigger the number the lower the position 
		add_menu_page('Words To Filter', 'Word Filter', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'), 'dashicons-smiley', 100);
		//1st arg - menu you want to add the subpage to (slug/short name)
		//2nd arg - document title
		//3rd arg - the text you'll see in the admin side bar 
		//4th arg - capability
		//5th arg - slug name
		//6th arg - functions that outputs the HTML for the page 
		add_submenu_page('ourwordfilter', 'Words To Filter', 'Words List', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'));
		add_submenu_page('ourwordfilter', 'Word Filter Options', 'Options', 'manage_options', 'word-filter-options', array($this, 'optionsSubPage'));
	}

	function wordFilterPage() { ?>
		Hello world.
	<?php }

	function optionsSubPage() { ?>
		Hello world from the options page. 
	<?php }
}

$wordFilterPlugin = new WordFilterPlugin();