<?php

//importing db credentials and medoo framework
require __DIR__."/credentials.php" ;
require  __DIR__."/Medoo-master/src/Medoo.php" ;


// Using Medoo namespace
use Medoo\Medoo ;

// init var database --- similar to PHP PDO statement
$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'chez_pupuce',
	'server' => 'localhost',
	'username' => $id,
	'password' => $pass
]) ;

// function to get this database medoo object
function get_database($database) {
	$database->query('SET NAMES UTF8') ;
	return $database ;
}

// constant names
class Constants {
	const TABLE_CLIENTS = "pupuce_client" ;
	const TABLE_CLIENTS_ID = "pupuce_client_id" ;
	const TABLE_CLIENTS_SURNAME = "pupuce_client_nom" ;
	const TABLE_CLIENTS_NAME = "pupuce_client_prenom" ;
	const TABLE_CLIENTS_EMAIL = "pupuce_client_mail" ;
	const TABLE_CLIENTS_ADDRESS = "pupuce_client_adresse" ;
	const TABLE_CLIENTS_POSTAL = "pupuce_client_cp" ;
	const TABLE_CLIENTS_TOWN = "pupuce_client_ville" ;
	const TABLE_CLIENTS_BIRTHDAY = "pupuce_client_naissance" ;
	const TABLE_CLIENTS_CREATE = "pupuce_client_creation" ;
	const TABLE_CLIENTS_PASS = "pupuce_client_pass" ;

	const TABLE_EMPLOYES = "pupuce_employe" ;
	const TABLE_EMPLOYES_ID = "pupuce_employe_id" ;
	const TABLE_EMPLOYES_SURNAME = "pupuce_employe_nom" ;
	const TABLE_EMPLOYES_NAME = "pupuce_employe_prenom" ;
	const TABLE_EMPLOYES_EMAIL = "pupuce_employe_mail" ;
	const TABLE_EMPLOYES_ADDRESS = "pupuce_employe_adresse" ;
	const TABLE_EMPLOYES_POSTAL = "pupuce_employe_cp" ;
	const TABLE_EMPLOYES_TOWN = "pupuce_employe_ville" ;
	const TABLE_EMPLOYES_BIRTHDAY = "pupuce_employe_naissance" ;
	const TABLE_EMPLOYES_POSITION = "pupuce_employe_fonction" ;
	const TABLE_EMPLOYES_WAGES = "pupuce_employe_salaire" ;
	const TABLE_EMPLOYES_BOSS_ID = "pupuce_employe_id_boss" ;
	const TABLE_EMPLOYES_SECU = "pupuce_employe_secu" ;

}

/************************(unused) Encryption system for sensible data****************************/

$peremption_purge = 365 ; // en jours
$encryption_key = "ujT|%`'?v]J~`QoY]h+[!re.`z2Kq~";


function encrypt($pure_string)
{
	global $encryption_key ;
	return openssl_encrypt($pure_string,"AES-128-ECB",$encryption_key);
}

/**
 * Returns decrypted original string
 */
function decrypt($encrypted_string)
{
	global $encryption_key ;
	return openssl_decrypt($encrypted_string,"AES-128-ECB",$encryption_key);
}

