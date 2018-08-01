<?php

		/*************************** treatment suscribe Employe form ****************************/
		if (isset($_POST['employe_suscribe']) && !empty($_POST['employe_suscribe'])) {

			// init check variables to zero (base=none of conditions required are checked)
			$all_fill_ok=0 ;
			$postal_ok=0 ;
			$new_email_ok=0;
			$position_ok=0;
			$new_secu_ok=0;
			// create a new employe to be able to run methods anytime
			$employe= new Employes() ;

			// check empty fields -- the 'wages' and 'position' are an exception since sql associates a default value to empty fields
			if (empty($_POST['employe_surname']) || empty($_POST['employe_name']) || empty($_POST['employe_email']) || empty($_POST['employe_address']) || empty($_POST['employe_postal']) || empty($_POST['employe_town']) || empty($_POST['employe_birthday']) || empty($_POST['employe_secu']) || empty($_POST['employe_boss_id'])) {
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

			// check that no one tries to hack in with a position unknown to the work environment
			$forms = new FormChecks() ;
			if ($forms->employePositionChecks($_POST['employe_position'])==1) {
				$position_ok=1;
			}
			else {
				echo '<div class="alert alert-danger">error()::'.$forms->employePositionChecks($_POST['employe_position']).',<a href="../../index.php">back</a></div>' ;
			}


			// check postal code has 5 digits
			if (strlen($_POST['employe_postal'])!=5) {
				echo '<div class="alert alert-danger">error()::postal_code_not_recognized,<a href="../../index.php">back</a></div>';
			}
			else {
				$postal_ok=1;
			}

			// check if e-mail address does not already exists !!! uses dataRead() method
			if ($employe->dataRead(array('DATABASE'=>$database,'KEY'=>'pupuce_employe_mail','VALUE'=>$_POST['employe_email']))!=0) {
				echo '<div class="alert alert-danger">error()::employe_email_already_exists,<a href="../../index.php">back</a></div>';
			}
			else {
				$new_email_ok=1 ;
			}

			// check if n°secu does not already exists !!! uses dataRead() method
			if ($employe->dataRead(array('DATABASE'=>$database,'KEY'=>'pupuce_employe_secu','VALUE'=>$_POST['employe_secu']))!=0) {
				echo '<div class="alert alert-danger">error()::employe_secu_already_exists,<a href="../../index.php">back</a></div>';
			}
			else {
				$new_secu_ok=1 ;
			}

			//final check ::: if all conditions are set to 1, we can create the new employe using dataNew
			if ($position_ok==1 && $postal_ok==1 && $all_fill_ok==1 && $new_email_ok==1 && $new_secu_ok==1) {
				echo '<div class="alert alert-success">OK()::suscription_ok,';
				$employe->dataNew(array('NAME'=>$_POST['employe_name'],
										'SURNAME'=>$_POST['employe_surname'],
										'EMAIL'=>$_POST['employe_email'],
										'ADDRESS'=>$_POST['employe_address'],
										'POSTAL'=>$_POST['employe_postal'],
										'TOWN'=>$_POST['employe_town'],
										'BIRTHDAY'=>$_POST['employe_birthday'],
										'SECU'=>$_POST['employe_secu'],
										'WAGES'=>$_POST['employe_wages'],
										'POSITION'=>$_POST['employe_position'],
										'BOSS_ID'=>$_POST['employe_boss_id'],
										'DATABASE'=>$database)) ;
				echo '<br />Added()::employe_saved,<a href="../../index.php">back</a></div>' ;
			}
		}