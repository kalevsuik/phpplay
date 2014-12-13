<?php 
error_reporting(E_ALL);//saad veateateid
ini_set('display_errors', 1);

session_start();

require_once 'classes/Front.class.php';
require_once 'classes/View.class.php';

require_once 'models/GalleryPictures.class.php';
require_once 'models/Users.class.php';
require_once 'functions.php';

//define('SITE_URL', 'http://enos.itcollege.ee/~ksaadi/Kodutoo');


$routes = array(

	'gallery' => 'Gallery',
	'vote' => 'Vote',
	'main' => 'Main',
	'login' => 'Login',
	'logout' => 'Logout',
	'result' => 'Result',
	'register' => 'Register',
	'feedback' => 'Feedback'
);

$front = new Front($routes);
$front->setControllerDir('controllers/');
$front->setDefaultController('Main');
$front->dispatch();
