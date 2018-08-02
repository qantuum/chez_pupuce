<?php

		/*************************** treatment delete Client form ****************************/
		if  (isset($_POST['connected_employe_delete_account']) && !empty($_POST['connected_employe_delete_account'])) {
			// I start session on this page
			session_start() ;
			$employe = new Employes() ;
			// I retrieve all my info from session email to client instance
			$employe->dataRead(array('DATABASE'=>$database, 'KEY'=>'pupuce_employe_mail', 'VALUE'=>$_SESSION['EMPLOYE']->_email)) ;
			// I delete the relative data from my database
			$employe->dataDelete(array('DATABASE'=>$database, 'ID'=>$employe->__get('_id'))) ;
			// nullify session 'USER' content
			$_SESSION['EMPLOYE'] = null ;
			// destroy session
			session_destroy() ;
			echo '<div class="alert alert-success">account()::deleted,<a href="../../index.php">back</a></div>';
		}