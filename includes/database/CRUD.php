<?php

// interface forcing classes to have read, write, update, delete database methods ---
interface CRUD {
	// all CRUD functions take array $data as an argument, since we want to cover all kinds of cases
	// it should be an associative array taking the right indexes to work correctly
	public function dataNew(array $data) ;
	public function dataUpdate(array $data);
	public function dataRead(array $data) ;
	public function dataDelete(array $data) ;
}