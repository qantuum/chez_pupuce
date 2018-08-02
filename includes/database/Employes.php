<?php

class Employes extends Personnes implements CRUD {

	// attributes
	protected $_secu, $_fonction, $_salaire, $_id_superieur ;

	// constructor -- none
	// setters -- extends
	// getters -- extends
	// methods

	// this function needs a very specific associative array, then inserts the data to the table
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
		$id = get_database($data['DATABASE'])->id(); // returns the last created id in MeDoo
		return isset($id);

	}

	// in this class we want to get a data line from multiple parameters (ex : secu and email), so we take an associative array with KEY and VALUE to request the right item. In this configuration, it is impossible to use the Constants::, so $data['KEY'] should be equal to the exact name of table field.
	// the __set method is used to attribute the implemented data to my instance, for use in further operations
	public function dataRead(array $data) {
		$res = get_database($data['DATABASE'])->get(Constants::TABLE_EMPLOYES, [
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
			$data['KEY'] => $data['VALUE']
		]) ;
		parent::__set('_id',$res[Constants::TABLE_EMPLOYES_ID]);
		parent::__set('_name',$res[Constants::TABLE_EMPLOYES_NAME]);
		parent::__set('_surname',$res[Constants::TABLE_EMPLOYES_SURNAME]);
		parent::__set('_email',$res[Constants::TABLE_EMPLOYES_EMAIL]);
		parent::__set('_address',$res[Constants::TABLE_EMPLOYES_ADDRESS]);
		parent::__set('_postal',$res[Constants::TABLE_EMPLOYES_POSTAL]);
		parent::__set('_town',$res[Constants::TABLE_EMPLOYES_TOWN]);
		parent::__set('_birthday',$res[Constants::TABLE_EMPLOYES_BIRTHDAY]);
		parent::__set('_secu',$res[Constants::TABLE_EMPLOYES_SECU]);
		parent::__set('_fonction',$res[Constants::TABLE_EMPLOYES_POSITION]);
		parent::__set('_salaire',$res[Constants::TABLE_EMPLOYES_WAGES]);
		parent::__set('_id_superieur',$res[Constants::TABLE_EMPLOYES_BOSS_ID]);
		return $res ;
	}

	// delete the requested data line. The $data['ID'] can be retrieved from instance Employes after a dataRead()
	public function dataDelete(array $data) {
		$res = get_database($data['DATABASE'])->delete(Constants::TABLE_EMPLOYES, [
			Constants::TABLE_EMPLOYES_ID => $data['ID']
		]);
			return isset($res) ;
	}

	// a different system than in dataNew, since we do NOT want to trigger an error whenever a field is missing. The fact of adding an array and to treat it with foreach, will onl affect the relative fields.
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

	// authentifiates an Employe. A $secu is obtained from a form
	public function authentification($secu) {
		if ($secu==$this->_secu) {
			return 1 ;
		}
		else {
			return false ;
		}
	}

	// unused -- function would be designed to allow Cadres to manage their Techniciens or Employés --
	public function getCadres(array $data) {
		$res = get_database($data['DATABASE'])->select(Constants::TABLE_EMPLOYES, [
				Constants::TABLE_EMPLOYES_ID
			], [ // WHERE
				Constants::TABLE_EMPLOYES_POSITION=>'Cadre']) ;
		return $res ;
	}

	// unused -- function would allow superiors to give a raise to their minions when a specific condition is calculated true (ex : sales for the month > 30 000$) --
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
}