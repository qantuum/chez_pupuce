<!DOCTYPE html>
<!--language of the page set in French-->
<html lang="fr">

	<head>
		<!-- title -->
		<title>validation</title>
		<!-- favicon -->
		<link rel="icon" href="#">
		<meta charset="utf-8">
		<!--Bootstrap init; sets the viewport-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<!-- Standard CDN version of Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<!-- FontAwesome CDN -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
		<!-- Custom styles -->
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body><section class="container-fluid">

		<div class="row"><div class="col-md-12">
			<div class="jumbotron">
				<h3 class="h3 text-center" style="font-family:'Berkshire Swash', Sans-serif;">TRAITEMENTS FORMULAIRES</h3>
			</div>
		</div></div>

		<?php
		require dirname(__DIR__).'/medoo_init.php'; // dirname is the name of the parent directory of the source directory
		include_once '../database/Clients.php' ;
		include_once '../database/Employes.php';
		include_once __DIR__.'/FormChecks.php';

		
		/*************************** in case client refreshes the page ****************************/
		if (!isset($_POST) || empty($_POST)) {
			echo '<div class="alert alert-warning">notice()::please_do_not_refresh_this_page,<a href="../../index.php">back</a></div>';
		}

		/*************************** treatment suscribe Client form ****************************/
		include_once __DIR__.'/suscribe--client.php';

		/*************************** treatment connect/disconnect Client form ****************************/
		include_once __DIR__.'/(dis)connect--client.php';

		/*************************** treatment update Client form ****************************/
		include_once __DIR__.'/update--client.php';

		/*************************** treatment delete Client form ****************************/
		include_once __DIR__.'/delete--client.php';

		/*************************** treatment suscribe Employe form ****************************/
		include_once __DIR__.'/suscribe--employe.php';

		/*************************** treatment connect/disconnect Employe form ****************************/
		include_once __DIR__.'/(dis)connect--employe.php';

		/*************************** treatment delete Employe form ****************************/
		include_once __DIR__.'/delete--employe.php';

		?>

	</section></body>
</html>




