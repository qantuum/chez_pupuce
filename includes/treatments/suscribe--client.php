<?php

		/*************************** treatment suscribe Client form ****************************/
		if (isset($_POST['client_suscribe']) && !empty($_POST['client_suscribe'])) {

			// init check variables to zero (base=none of conditions required are checked)
			$all_fill_ok=0 ;
			$pswd_ok=0 ;
			$postal_ok=0 ;
			$new_email_ok=0;
			// create a new client to be able to run methods anytime
			$client= new Clients() ;

			// check empty fields
			if (empty($_POST['client_surname']) || empty($_POST['client_name']) || empty($_POST['client_email']) || empty($_POST['client_address']) || empty($_POST['client_postal']) || empty($_POST['client_town']) || empty($_POST['client_birthday']) || empty($_POST['client_pswd1']) || empty($_POST['client_pswd2'])) {
				echo '<div class="alert alert-warning">missing fields()::';
				foreach ($_POST as $key=>$field) {
					if (empty($field)) {
						echo $key.',';
					}
				}
				echo '<a href="../../index.php">back</a></div>';
			}
			else {
				$all_fill_ok=1;
			}

			// check password1 = password2
			// the FormChecks is a class containing checks methods. I create one FormChecks object for each form treatment...
			$forms = new FormChecks() ;
			if ($forms->passChecks($_POST['client_pswd1'],$_POST['client_pswd2'])==1) {
				$pswd_ok=1;
			}
			else {
				echo '<div class="alert alert-danger">error()::'.$forms->passChecks($_POST['client_pswd1'],$_POST['client_pswd2']).',<a href="../../index.php">back</a></div>' ;
			}


			// check postal code has 5 digits
			if (strlen($_POST['client_postal'])!=5) {
				echo '<div class="alert alert-danger">error()::postal_code_not_recognized,<a href="../../index.php">back</a></div>';
			}
			else {
				$postal_ok=1;
			}

			// check if e-mail address does not already exists !!! uses dataRead() method
			if ($client->dataRead(array('DATABASE'=>$database,'EMAIL'=>$_POST['client_email']))) {
				echo '<div class="alert alert-danger">error()::client_email_already_exists,<a href="../../index.php">back</a></div>';
			}
			else {
				$new_email_ok=1 ;
			}

			//final check ::: if all conditions are set to 1, we can create the new Client using dataNew
			if ($pswd_ok==1 && $postal_ok==1 && $all_fill_ok=1 && $new_email_ok==1) {
				echo '<div class="alert alert-success">OK()::suscription_ok,';
				$client->dataNew(array('NAME'=>$_POST['client_name'],
										'SURNAME'=>$_POST['client_surname'],
										'EMAIL'=>$_POST['client_email'],
										'ADDRESS'=>$_POST['client_address'],
										'POSTAL'=>$_POST['client_postal'],
										'TOWN'=>$_POST['client_town'],
										'BIRTHDAY'=>$_POST['client_birthday'],
										'CREATE'=>date("Y-m-d"),
										'PASS'=>password_hash($_POST['client_pswd2'], PASSWORD_BCRYPT),
										'DATABASE'=>$database)) ;
				echo '<br />Added()::client_saved,<a href="../../index.php">back</a></div>' ;
			}
		}