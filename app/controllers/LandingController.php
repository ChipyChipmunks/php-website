
<?php


class LandingController {

	private $emailMessage;
	private $passwordMessage;
	private $dbc;

	public function __construct($dbc) {

		//save database connection
		$this->dbc = $dbc;

		if ( isset( $_POST['new-account'] ) ) {
			$this -> validateRegistrationForm();
		}

	}

	public function registerAccount() {
		//validate data

		//check the database to see if email is in use

		//check the strength of the password
	}

	public function buildHTML() {

		$plates = new League\Plates\Engine('app/templates');

		$data = [];

		if ( $this->emailMessage != '' ) {
			$data['emailError'] = $this->emailMessage;
		}

		echo $plates -> render('landing', $data);
	}

	private function validateRegistrationForm() {

		$totalErrors = 0;

		//Validate email
		if ( $_POST['email'] != '' ) {
			$this->emailMessage = 'validation: invalid';
			$totalErrors++;
		}

		if ( strlen( $_POST['password'] ) < 8 ) {
			$this->passwordMessage = 'Must be at least 8 characters';
			$totalErrors++;
		}

		if ($totalErrors == 0) {
			//validation passed

			//filter user data
			$filteredEmail = $this->dbc->cubrid_real_escape_string( $_POST['email'] );

			die($filteredEmail);
		}

	}
}


?>