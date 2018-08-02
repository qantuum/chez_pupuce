<?php

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
				echo '<div class="alert alert-danger">error()::bad_authentification,<a href="../../index.php">back</a></div>';
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