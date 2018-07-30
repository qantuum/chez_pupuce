<!DOCTYPE html>
<!--language of the page set in French-->
<html lang="fr">

	<head>
		<!-- title -->
		<title>validation</title>
		<!-- favicon -->
		<link rel="icon" href="#">
		<meta charset="utf-8">
		<!--Bootstrap init; sets the viewport-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<!-- Standard CDN version of Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<!-- FontAwesome CDN -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<!-- Custom styles -->
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body><section class="container-fluid">

		<div class="row"><div class="col-md-12">
			<div class="jumbotron">
				<h3 class="h3 text-center">TRAITEMENTS FORMULAIRES</h3>
			</div>
		</div></div>

		<?php

		include_once '../database/Clients.php' ;
		require dirname(__DIR__).'/medoo_init.php';
		include_once __DIR__.'/FormChecks.php';

		/*************************** treatment suscribe form ****************************/
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
										'CREATE'=>date("Y-m-d"),'PASS'=>password_hash($_POST['client_pswd2'], PASSWORD_BCRYPT),
										'DATABASE'=>$database)) ;
				echo '<br />Added()::client_saved,<a href="../../index.php">back</a></div>' ;
			}
		}




		/*************************** treatment connect Client form ****************************/
		if  (isset($_POST['auth_client_check_btn']) && !empty($_POST['auth_client_check_btn'])) {
			// init Client object
			$client = new Clients() ;
			// the dataRead function puts Client info from database to instance attributes
			$client->dataRead(array('DATABASE'=>$database, 'EMAIL'=>$_POST['auth_client_email'])) ;
			// check authentification with password_verify
			if ($client->authentification($_POST['auth_client_pswd'])) {
				// start session and give instance info to session at index 'USER'
				session_start() ;
				// the object is not serialized oO
				$_SESSION['USER']= $client;
				echo '<div class="alert alert-success">account()::connected,<a href="../../index.php">back</a></div>';
			}
			else {
				echo '<div class="alert alert-danger">error()::bad_authentification<a href="../../index.php">back</a></div>';
			}
		}



		/*************************** treatment disconnect Client form ****************************/
		if  (isset($_POST['connected_client_disconnect']) && !empty($_POST['connected_client_disconnect'])) {
			// I start session on this page
			session_start() ;
			// I destroy the session
			session_destroy() ;
			echo '<div class="alert alert-success">account()::disconnected,<a href="../../index.php">back</a></div>';
		}

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



		/*************************** treatment delete Client form ****************************/
		if  (isset($_POST['connected_client_delete_account']) && !empty($_POST['connected_client_delete_account'])) {
			// I start session on this page
			session_start() ;
			$client = new Clients() ;
			// I retrieve all my info from session email to client instance
			$client->dataRead(array('DATABASE'=>$database, 'EMAIL'=>$_SESSION['USER']->_email)) ;
			// I delete the relative data from my database
			$client->dataDelete(array('DATABASE'=>$database, 'ID'=>$client->__get('_id'))) ;
			// nullify session 'USER' content
			$_SESSION['USER'] = null ;
			// destroy session
			session_destroy() ;
			echo '<div class="alert alert-success">account()::deleted,<a href="../../index.php">back</a></div>';
		}

		?>

	</section></body>
</html>




