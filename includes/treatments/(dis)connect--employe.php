<?php

		/*************************** treatment connect Client form ****************************/
		if  (isset($_POST['auth_employe_check_btn']) && !empty($_POST['auth_employe_check_btn'])) {
			// init Client object
			$employe = new Employes() ;
			// the dataRead function puts Employe info from database to instance attributes
			$employe->dataRead(array('DATABASE'=>$database, 'KEY'=>'pupuce_employe_mail','VALUE'=>$_POST['auth_employe_email'])) ;
			// check authentification
			if ($employe->authentification($_POST['auth_employe_secu'])==1) {
				// start session and give instance info to session at index 'EMPLOYE'
				session_start() ;
				// the object is not serialized oO
				$_SESSION['EMPLOYE']= $employe;
				echo '<div class="alert alert-success">account()::connected,<a href="../../index.php">back</a></div>';
			}
			else {
				echo '<div class="alert alert-danger">error()::bad_authentification,<a href="../../index.php">back</a></div>';
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