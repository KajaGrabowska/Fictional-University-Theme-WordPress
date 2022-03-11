<?php 

add_action('rest_api_init', 'universityLikeRoutes'); 

function universityLikeRoutes() {
  register_rest_route('university/v1', 'manageLike', array(
    'methods' => 'POST',
    'callback' => 'createLike' // callback is the function we want to run when a request is send to the url 
  ));

  register_rest_route('university/v1', 'manageLike', array(
    'methods' => 'DELETE',
    'callback' => 'deleteLike'
  ));
}

function createLike() {
  return 'Thanks for trying to create a like.';
}

function deleteLike() {
  return 'Thanks for trying to delete a like';
}