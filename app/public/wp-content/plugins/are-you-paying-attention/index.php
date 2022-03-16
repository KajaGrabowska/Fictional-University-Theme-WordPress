<?php

/*
  Plugin Name: Are You Paying Attention Quiz
  Description: Give your readers a multiple choice question.
  Version: 1.0
  Author: Kaja
*/

//prevents people from triggering our code by visiting the url for this php file. 
if ( ! defined( 'ABSPATH' ) ) exit; 

class AreYouPayingAttention {
  function __construct() {
    add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
  }

  function adminAssets() {
    // wp_enqueue_script functions enqueues a javascript file
    // it takes 3 arguments
    // - 1st argument is the name we're giving to that JS file so that WordPress can identify it
    // -2nd argument is the URL that points to our JS file
    // -3rd argument is the list of dependencies
    wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
  }

}

$areYouPayingAttention = new AreYouPayingAttention();