<?php

//tentative to factor basic form checkings (???)

class FormChecks {

	//methods
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




}