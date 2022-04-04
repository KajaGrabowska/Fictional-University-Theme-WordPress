<?php

/*
  Plugin Name: Word Count Plugin 
	Description: A truly amazing plugin.
	Version: 1.0
	Author: Kaja
*/

class WordCountAndTimePlugin {
	function __construct() {
		add_action('admin_menu', array($this, 'adminPage'));
	}

	//add_options_page - Add submenu page to the Settings main menu. 
	// 1st argument - the title of the page that we want to create
	// 2nd argument - the title of the page that will be used in the Settings menu
	// 3rd argument - what permissions the user needs to have to see this page
	// 4th argument - slug, must be unique! 
	// 5th argument - function that will output the HTML content onto the new page
	function adminPage() {
		add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array($this, 'ourHTML'));
	}

	function ourHTML() { ?>
		<div class="wrap">
			<h1>Word Count Settings</h1>
		</div>	
	<?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();
