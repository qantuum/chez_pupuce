<?php

		/*************************** treatment update Client form ****************************/
		if  (isset($_POST['update_client_values']) && !empty($_POST['update_client_values'])) {
			// I start session on this page
			session_start() ;
			// I set my client instance as well as checkings variables
			$client = new Clients() ;
			$pswd_ok = 0 ;
			$new_email_ok = 0 ;
			$postal_ok = 0 ;
			// this is the array I will be using as argument for my update method !
			$data = array('DATABASE'=>$database, 'ID'=>$_SESSION['USER']->_id, 'ARRAY_UPD'=>array()) ;
			// I retrieve all my info from session email to client instance
			$client->dataRead(array('DATABASE'=>$database, 'EMAIL'=>$_SESSION['USER']->_email)) ;
			// I start some checkings about my Client
			// now for passwords : if no new password is here, do not update
			if (empty($_POST['update_client_pswd1']) && empty($_POST['update_client_pswd2'])) {
				$pswd_ok = 1;
			} 
			else {
				// check password1 = password2
				$forms = new FormChecks() ;
				if ($forms->passChecks($_POST['update_client_pswd1'],$_POST['update_client_pswd2'])==1) {
					// I push my new password into the update array
					$data['ARRAY_UPD']['pupuce_client_pass']=password_hash($_POST['update_client_pswd2'], PASSWORD_BCRYPT) ;
					$pswd_ok=1;
				}
				else {
					echo '<div class="alert alert-danger">error()::'.$forms->passChecks($_POST['update_client_pswd1'],$_POST['update_client_pswd2']).',<a href="../../index.php">back</a></div>' ;
				}
			}
			// now for e-mails : I still have to check that the new e-mail does not exist at all in my db
			// if e-mail field is empty, or if existing e-mail and form e-mail are same, I do not change e-mail
			if (empty($_POST['update_client_email'])) {
				echo '<div class="alert alert-danger">error()::client_email_must_be_filled,<a href="../../index.php">back</a></div>';
			}
			else {
				if ($_POST['update_client_email']==$_SESSION['USER']->_email) {
					$new_email_ok = 1 ;
				}
				else {
					// check if e-mail address does not already exists !!! uses dataRead() method
					if ($client->dataRead(array('DATABASE'=>$database,'EMAIL'=>$_POST['update_client_email']))) {
						echo '<div class="alert alert-danger">error()::client_email_already_exists,<a href="../../index.php">back</a></div>';
					}
					else {
						$data['ARRAY_UPD']['pupuce_client_mail']=$_POST['update_client_email'] ;
						$new_email_ok=1 ;
					}
				}
			}
			// for the other items, checkings are not that necessary, I need the same ones as what was done in creation... to buff up a bit I guess
			if (!empty($_POST['update_client_nom']) || $_POST['update_client_name']!=$_SESSION['USER']->_name) {
				$data['ARRAY_UPD']['pupuce_client_prenom']=$_POST['update_client_name'] ;
			}
			if (!empty($_POST['update_client_surname']) || $_POST['update_client_surname']!=$_SESSION['USER']->_surname) {
				$data['ARRAY_UPD']['pupuce_client_nom']=$_POST['update_client_surname'] ;
			}
			if (!empty($_POST['update_client_address']) || $_POST['update_client_address']!=$_SESSION['USER']->_address) {
				$data['ARRAY_UPD']['pupuce_client_adresse']=$_POST['update_client_address'] ;
			}
			if (!empty($_POST['update_client_postal']) || $_POST['update_client_postal']!=$_SESSION['USER']->_postal) {
				// adding this little test, that the postal code must be 5 characters long...
				if (strlen($_POST['update_client_postal'])!=5) {
					echo '<div class="alert alert-danger">error()::postal_code_not_recognized,<a href="../../index.php">back</a></div>';
				}
				else {
					$postal_ok = 1 ;
					$data['ARRAY_UPD']['pupuce_client_cp']=$_POST['update_client_postal'] ;
				}
			}
			else {
				$postal_ok = 1 ;
			}
			if (!empty($_POST['update_client_town']) || $_POST['update_client_town']!=$_SESSION['USER']->_town) {
				$data['ARRAY_UPD']['pupuce_client_ville']=$_POST['update_client_town'] ;
			}
			if (!empty($_POST['update_client_birthday']) || $_POST['update_client_birthday']!=$_SESSION['USER']->_birthday) {
				$data['ARRAY_UPD']['pupuce_client_naissance']=$_POST['update_client_birthday'] ;
			}
			if ($pswd_ok==1 && $new_email_ok==1 && $postal_ok==1) {
				// the following lines stand for debug ~ check if the $data array argument is set correctly
				// echo '<pre>' ;
				// var_dump($data) ;
				// echo '</pre>' ;
				// echo $data['ARRAY_UPD']['SURNAME'] ;

				echo '<div class="alert alert-success">OK()::update_ok,';
				echo '<br />Added()::client_saved,<a href="../../index.php">back</a></div>' ;
				// method for updating my line
				$client->dataUpdate($data) ;
				// push new database line into client instance
				$client->dataRead(array('DATABASE'=>$database, 'EMAIL'=>$_POST['update_client_email'])) ;
				// update session info with object content
				$_SESSION['USER']=$client ;
			}
		}