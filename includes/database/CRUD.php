<?php

// interface forcing classes to have read, write, update, delete database methods ---
interface CRUD {

	public function dataNew(array $data) ;
	public function dataUpdate(array $data);
	public function dataRead(array $data) ;
	public function dataDelete(array $data) ;
}