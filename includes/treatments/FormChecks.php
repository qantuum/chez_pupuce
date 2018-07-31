<?php

//tentative to factor basic form checkings (???)

class FormChecks {

	//methods

	// function responsible for password checks -- now it checks that pass1 and pass2 are the same
	// future implementations : conditions on passwords (special chars, numbers, capital letters, ...)
	public function passChecks($pass1, $pass2) {
		$pass_filter = null ;
		if ($pass1==$pass2) {
			$pass_filter = 1 ;
		}
		else {
			$pass_filter = 'passwords_do_not_match' ;
		}
		return $pass_filter ;
	}

	public function mailChecks($data, $table, $email) {

	}

	public function postalChecks($postal) {

	}

	// function avoiding to hack HTML <select> in the Employe suscription form
	public function employePositionChecks($val) {
		$status_filter = null ;
		if($val!="Employé" && $val!="Cadre" && $val!="Technicien" && $val!="Gestionnaire" && $val!="Directeur") {
			$status_filter = 'employe_position::'.$val.'_not_standardized_in_the_system' ;
		}
		else {
			$status_filter = 1 ;
		}
		return $status_filter ;
	}




}