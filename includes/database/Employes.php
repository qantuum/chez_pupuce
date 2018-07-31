<?php

class Employes extends Personnes implements CRUD {

	// attributes
	protected $_secu, $_fonction, $_salaire, $_id_superieur ;

	// constructor -- none
	// setters -- extends
	// getters -- extends
	// methods
	public function dataRead(array $data) {
		$res = get_database($data['DATABASE'])->get(Constants::TABLE_CLIENTS, [
			Constants::TABLE_EMPLOYES_ID,
			Constants::TABLE_EMPLOYES_NAME,
			Constants::TABLE_EMPLOYES_SURNAME,
			Constants::TABLE_EMPLOYES_EMAIL,
			Constants::TABLE_EMPLOYES_ADDRESS,
			Constants::TABLE_EMPLOYES_POSTAL,
			Constants::TABLE_EMPLOYES_TOWN,
			Constants::TABLE_EMPLOYES_BIRTHDAY,
			Constants::TABLE_EMPLOYES_SECU,
			Constants::TABLE_EMPLOYES_POSITION,
			Constants::TABLE_EMPLOYES_WAGES,
			Constants::TABLE_EMPLOYES_BOSS_ID
			], [ // WHERE
			$data['KEY'] => $data['VALUE']]) ;
		parent::__set('_id',$res[Constants::TABLE_EMPLOYES_ID]);
		parent::__set('_name',$res[Constants::TABLE_EMPLOYES_NAME]);
		parent::__set('_surname',$res[Constants::TABLE_EMPLOYES_SURNAME]);
		parent::__set('_email',$res[Constants::TABLE_EMPLOYES_EMAIL]);
		parent::__set('_address',$res[Constants::TABLE_EMPLOYES_ADDRESS]);
		parent::__set('_postal',$res[Constants::TABLE_EMPLOYES_POSTAL]);
		parent::__set('_town',$res[Constants::TABLE_EMPLOYES_TOWN]);
		parent::__set('_birthday',$res[Constants::TABLE_EMPLOYES_BIRTHDAY]);
		parent::__set('_creation',$res[Constants::TABLE_EMPLOYES_SECU]);
		parent::__set('_hashed_pswd',$res[Constants::TABLE_EMPLOYES_POSITION]);
		parent::__set('_hashed_pswd',$res[Constants::TABLE_EMPLOYES_WAGES]);
		parent::__set('_hashed_pswd',$res[Constants::TABLE_EMPLOYES_BOSS_ID]);
		return $res ;
	}

	public function dataNew(array $data) {
		get_database($data['DATABASE'])->insert(Constants::TABLE_EMPLOYES, [
			Constants::TABLE_EMPLOYES_NAME => $data['NAME'],
			Constants::TABLE_EMPLOYES_SURNAME => $data['SURNAME'],
			Constants::TABLE_EMPLOYES_EMAIL => $data['EMAIL'],
			Constants::TABLE_EMPLOYES_ADDRESS => $data['ADDRESS'],
			Constants::TABLE_EMPLOYES_POSTAL => $data['POSTAL'],
			Constants::TABLE_EMPLOYES_TOWN => $data['TOWN'],
			Constants::TABLE_EMPLOYES_BIRTHDAY => $data['BIRTHDAY'],
			Constants::TABLE_EMPLOYES_SECU => $data['SECU'],
			Constants::TABLE_EMPLOYES_POSITION => $data['POSITION'],
			Constants::TABLE_EMPLOYES_WAGES => $data['WAGES'],
			Constants::TABLE_EMPLOYES_BOSS_ID => $data['BOSS_ID']
		]) ;
		$id = get_database($data['DATABASE'])->id();
		return isset($id);

	}

	public function dataUpdate(array $data) {
		$res=array();
		foreach ($data['ARRAY_UPD'] as $key => $item) {
			$res[]=get_database($data['DATABASE'])->update(Constants::TABLE_EMPLOYES, [
			$key => $data['ARRAY_UPD'][$key]
			], [
				Constants::TABLE_EMPLOYES_ID => $data['ID']
			]) ;
		}
			return isset($res) ;
	}

	public function dataDelete(array $data) {
		$res = get_database($data['DATABASE'])->delete(Constants::TABLE_EMPLOYES, [
			Constants::TABLE_EMPLOYES_ID => $data['ID']
		]);
			return isset($res) ;
	}

	public function getCadres(array $data) {
		$res = get_database($data['DATABASE'])->select(Constants::TABLE_EMPLOYES, [
				Constants::TABLE_EMPLOYES_ID
			], [ // WHERE
				Constants::TABLE_EMPLOYES_POSITION=>'Cadre']) ;
		return $res ;
	}

	public function promotion(array $data) {
		if ($data['CONDITION']) { // somewhat condition for the promotion to happen
			$res=get_database($data['DATABASE'])->update(Constants::TABLE_EMPLOYES, [
				Constants::TABLE_EMPLOYES_POSITION => $data['NEW_POSITION'],
				Constants::TABLE_EMPLOYES_WAGES => $data['NEW_WAGES']
			], [ // WHERE
				Constants::TABLE_EMPLOYES_SECU => $data['SECU']]) ;
			return $res ;
		}
	}

	public function authentification($secu) {
		if ($secu==$this->_secu) {
			return true ;
		}
		else {
			return false ;
		}
	}
}