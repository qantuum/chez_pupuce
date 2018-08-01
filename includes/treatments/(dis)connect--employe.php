<?php

		/*************************** treatment connect Client form ****************************/
		if  (isset($_POST['auth_employe_check_btn']) && !empty($_POST['auth_employe_check_btn'])) {
			// init Client object
			$employe = new Employe() ;
			// the dataRead function puts Client info from database to instance attributes
			$employe->dataRead(array('DATABASE'=>$database, 'KEY'=>'EMAIL','VALUE'=>$_POST['auth_employe_email'])) ;
			// check authentification with password_verify
			if ($employe->authentification($_POST['auth_employe_secu'])) {
				// start session and give instance info to session at index 'USER'
				session_start() ;
				// the object is not serialized oO
				$_SESSION['EMPLOYE']= $employe;
				echo '<div class="alert alert-success">account()::connected,<a href="../../index.php">back</a></div>';
			}
			else {
				echo '<div class="alert alert-danger">error()::bad_authentification<a href="../../index.php">back</a></div>';
			}
		}

		/*************************** treatment disconnect Client form ****************************/
		if  (isset($_POST['connected_employe_disconnect']) && !empty($_POST['connected_employe_disconnect'])) {
			// I start session on this page
			session_start() ;
			// I destroy the session
			session_destroy() ;
			echo '<div class="alert alert-success">account()::disconnected,<a href="../../index.php">back</a></div>';
		}