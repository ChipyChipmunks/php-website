

<?php
	
	require 'vendor/autoload.php'; //Make everything in the vendor folder available to the project


	// if ( isset($_GET['page'] ) ){
	// 	$page = $_GET['page'];
	// }
	// else {
	// 	$page = 'landing';
	// }

	//check the data in $_GET['page']
	$page = isset( $_GET['page'] ) ? $_GET['page'] : 'landing';

	//connect to database
	$dbc = new mysqli( 'localhost', 'root', '', 'pinterest_liam' );


	/*
		take the data in the $page = $_GET['page'] and render the appropreate file
	*/

	switch ($page) {
		case 'landing' :
			require 'app/controllers/LandingController.php';
			$controller = new LandingController($dbc);
		break;

		case 'login':
			require 'app/controllers/LoginController.php';
			$controller = new LoginController();
		break;

		case 'stream':
			echo $plates -> render('stream');
		break;
		
		default:
			require 'app/controllers/LandingController.php';
			$controller = new LandingController();
		break;
	}

	$controller->buildHTML();
?>