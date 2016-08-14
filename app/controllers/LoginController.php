
<?php


class LoginController {

	public function registerAccount() {
		//validate data

		//check the database to see if email is in use

		//check the strength of the password
	}

	public function buildHTML() {

		$plates = new League\Plates\Engine('app/templates');

		echo $plates -> render('login');
	}
}


?>