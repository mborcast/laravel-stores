<?php
Route::get('/', function() {
  return view('home');
});

require('Stores/routes.php');
require('Customers/routes.php');
require('Products/routes.php');
require('Sales/routes.php');
