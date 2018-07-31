<?php

require __DIR__.'/Personnes.php' ;

class Clients extends Personnes implements CRUD {
	// attributes
	protected $_creation, $_hashed_pswd ;

	// getters -- extends

	// setters -- extends

	// methods
	public function getCreation() {
		return $this->_creation ;
	}

	// all CRUD functions take array $data as an argument, since we want to cover all kinds of cases
	// it should be an associative array taking the right indexes to work correctly
	public function dataRead(array $data) {
		$res = get_database($data['DATABASE'])->get(Constants::TABLE_CLIENTS, [
			Constants::TABLE_CLIENTS_ID,
			Constants::TABLE_CLIENTS_NAME,
			Constants::TABLE_CLIENTS_SURNAME,
			Constants::TABLE_CLIENTS_EMAIL,
			Constants::TABLE_CLIENTS_ADDRESS,
			Constants::TABLE_CLIENTS_POSTAL,
			Constants::TABLE_CLIENTS_TOWN,
			Constants::TABLE_CLIENTS_BIRTHDAY,
			Constants::TABLE_CLIENTS_CREATE,
			Constants::TABLE_CLIENTS_PASS
			], [
			Constants::TABLE_CLIENTS_EMAIL => $data['EMAIL']]) ;
		parent::__set('_id',$res[Constants::TABLE_CLIENTS_ID]);
		parent::__set('_name',$res[Constants::TABLE_CLIENTS_NAME]);
		parent::__set('_surname',$res[Constants::TABLE_CLIENTS_SURNAME]);
		parent::__set('_email',$res[Constants::TABLE_CLIENTS_EMAIL]);
		parent::__set('_address',$res[Constants::TABLE_CLIENTS_ADDRESS]);
		parent::__set('_postal',$res[Constants::TABLE_CLIENTS_POSTAL]);
		parent::__set('_town',$res[Constants::TABLE_CLIENTS_TOWN]);
		parent::__set('_birthday',$res[Constants::TABLE_CLIENTS_BIRTHDAY]);
		parent::__set('_creation',$res[Constants::TABLE_CLIENTS_CREATE]);
		parent::__set('_hashed_pswd',$res[Constants::TABLE_CLIENTS_PASS]);
		return $res ;
	}

	public function dataNew(array $data) {
		get_database($data['DATABASE'])->insert(Constants::TABLE_CLIENTS, [
			Constants::TABLE_CLIENTS_NAME => $data['NAME'],
			Constants::TABLE_CLIENTS_SURNAME => $data['SURNAME'],
			Constants::TABLE_CLIENTS_EMAIL => $data['EMAIL'],
			Constants::TABLE_CLIENTS_ADDRESS => $data['ADDRESS'],
			Constants::TABLE_CLIENTS_POSTAL => $data['POSTAL'],
			Constants::TABLE_CLIENTS_TOWN => $data['TOWN'],
			Constants::TABLE_CLIENTS_BIRTHDAY => $data['BIRTHDAY'],
			Constants::TABLE_CLIENTS_CREATE => $data['CREATE'],
			Constants::TABLE_CLIENTS_PASS => $data['PASS']
		]) ;
		$id = get_database($data['DATABASE'])->id();
		return isset($id);

	}

	public function dataUpdate(array $data) {
		$res=array();
		foreach ($data['ARRAY_UPD'] as $key => $item) {
			$res[]=get_database($data['DATABASE'])->update(Constants::TABLE_CLIENTS, [
			$key => $data['ARRAY_UPD'][$key]
			], [
				Constants::TABLE_CLIENTS_ID => $data['ID']
			]) ;
		}
			return isset($res) ;
	}

	public function dataDelete(array $data) {
		$res = get_database($data['DATABASE'])->delete(Constants::TABLE_CLIENTS, [
			Constants::TABLE_CLIENTS_ID => $data['ID']
		]);
			return isset($res) ;
	}

	public function authentification($pswd) {
		if (password_verify($pswd, $this->_hashed_pswd)) {
			return true ;
		}
		else {
			return false ;
		}
	}
}