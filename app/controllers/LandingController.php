
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
			$data['emailMessage'] = $this->emailMessage;
		}

		if ($this->passwordMessage != '') {
			$data['passwordMessage'] = $this->passwordMessage;
		}

		echo $plates->render('landing', $data);
	}

	private function validateRegistrationForm() {

		$totalErrors = 0;

		//Validate email
		if ( $_POST['email'] == '' ) {
			$this->emailMessage =  'Invalid Email';
			$totalErrors++;
		}

		//insure email is unique
		$filteredEmail = $this->dbc->real_escape_string( $_POST['email'] );

		$sql = "SELECT email 
				FROM users
				WHERE email = '$filteredEmail' ";

		$result = $this->dbc->query($sql);

		//if the query failed or there is a result
		if ( !$result || $result->num_rows > 0 ) {
			$this->emailMessage =  'Email in use';
			$totalErrors++;
		}


		if ( strlen ( $_POST['password']) < 8 ) {
			//Password is too short
			$this->passwordMessage = 'Must be at least 8 characters';
			$totalErrors++;
		}

		if ($totalErrors == 0) {
			//validation passed

			//filter user data
			

			//Hash password
			$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			//prepare the SQL
			$sql = "INSERT INTO users (email, password) VALUES ('$filteredEmail', '$hash')";


			$this->dbc->query($sql);

			$_SESSION['id'] = $this->dbc->insert_id;

			//Autolog in & redirect to stream page
			header('Location: index.php?page=stream');
		}

	}
}


?>