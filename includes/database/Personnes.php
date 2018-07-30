<?php

require __DIR__.'/CRUD.php' ;

abstract class Personnes {

	// attributes
	protected $_id, $_name, $_surname, $_email, $_address, $_postal, $_town, $_birthday, $_database ;

	// getters
	public function __get($attr) {
		return $this->$attr ;
	}

	// setters
	public function __set($attr, $val) {
		$this->$attr = $val ;
	}

	// methods
	public function modifInfos(array $infos) {
		foreach ($infos as $key=>$info) {
			$this->__set($key, $info) ;
		}
	}

}