<?php

class Fournisseurs extends Personnes implements CRUD {
	// attributes
	protected $_comptable ;

	// constructor -- none
	// setters -- extends
	// getters -- extends
	// methods

	// this function needs a very specific associative array, then inserts the data to the table
	public function dataNew(array $data) {
		get_database($data['DATABASE'])->insert(Constants::TABLE_FOURNISSEURS, [
			Constants::TABLE_FOURNISSEURS_NAME => $data['NAME'],
			Constants::TABLE_FOURNISSEURS_SURNAME => $data['SURNAME'],
			Constants::TABLE_FOURNISSEURS_EMAIL => $data['EMAIL'],
			Constants::TABLE_FOURNISSEURS_ADDRESS => $data['ADDRESS'],
			Constants::TABLE_FOURNISSEURS_POSTAL => $data['POSTAL'],
			Constants::TABLE_FOURNISSEURS_TOWN => $data['TOWN'],
			Constants::TABLE_FOURNISSEURS_BIRTHDAY => $data['BIRTHDAY'],
			Constants::TABLE_FOURNISSEURS_COMPTABLE => $data['COMPTABLE']
		]) ;
		$id = get_database($data['DATABASE'])->id();
		return isset($id);

	}

	// in this class we want to get a data line from multiple parameters (ex : secu and email), so we take an associative array with KEY and VALUE to request the right item. In this configuration, it is impossible to use the Constants::, so $data['KEY'] should be equal to the exact name of table field.
	// the __set method is used to attribute the implemented data to my instance, for use in further operations
	public function dataRead(array $data) {
		$res = get_database($data['DATABASE'])->get(Constants::TABLE_FOURNISSEURS, [
			Constants::TABLE_FOURNISSEURS_ID,
			Constants::TABLE_FOURNISSEURS_NAME,
			Constants::TABLE_FOURNISSEURS_SURNAME,
			Constants::TABLE_FOURNISSEURS_EMAIL,
			Constants::TABLE_FOURNISSEURS_ADDRESS,
			Constants::TABLE_FOURNISSEURS_POSTAL,
			Constants::TABLE_FOURNISSEURS_TOWN,
			Constants::TABLE_FOURNISSEURS_BIRTHDAY,
			Constants::TABLE_FOURNISSEURS_COMPTABLE
			], [ // WHERE
			$data['KEY'] => $data['VALUE']
		]) ;
		parent::__set('_id',$res[Constants::TABLE_FOURNISSEURS_ID]);
		parent::__set('_name',$res[Constants::TABLE_FOURNISSEURS_NAME]);
		parent::__set('_surname',$res[Constants::TABLE_FOURNISSEURS_SURNAME]);
		parent::__set('_email',$res[Constants::TABLE_FOURNISSEURS_EMAIL]);
		parent::__set('_address',$res[Constants::TABLE_FOURNISSEURS_ADDRESS]);
		parent::__set('_postal',$res[Constants::TABLE_FOURNISSEURS_POSTAL]);
		parent::__set('_town',$res[Constants::TABLE_FOURNISSEURS_TOWN]);
		parent::__set('_birthday',$res[Constants::TABLE_FOURNISSEURS_BIRTHDAY]);
		parent::__set('_comptable',$res[Constants::TABLE_FOURNISSEURS_COMPTABLE]);
		return $res ;
	}

	public static function dataReadAll($database) {
		$array = get_database($database)->select(Constants::TABLE_FOURNISSEURS, "*") ;
		return $array ;
	}

	// delete the requested data line. The $data['ID'] can be retrieved from instance Employes after a dataRead()
	public function dataDelete(array $data) {
		$res = get_database($data['DATABASE'])->delete(Constants::TABLE_FOURNISSEURS, [
			Constants::TABLE_FOURNISSEURS_ID => $data['ID']
		]);
			return isset($res) ;
	}

	// a different system than in dataNew, since we do NOT want to trigger an error whenever a field is missing. The fact of adding an array and to treat it with foreach, will onl affect the relative fields.
	public function dataUpdate(array $data) {
		$res=array();
		foreach ($data['ARRAY_UPD'] as $key => $item) {
			$res[]=get_database($data['DATABASE'])->update(Constants::TABLE_FOURNISSEURS, [
			$key => $data['ARRAY_UPD'][$key]
			], [
				Constants::TABLE_FOURNISSEURS_ID => $data['ID']
			]) ;
		}
			return isset($res) ;
	}

}
