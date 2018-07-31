<?php

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