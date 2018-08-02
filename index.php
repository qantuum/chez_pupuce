<!DOCTYPE html>
<!--language of the page set in French-->
<html lang="fr">
	<head>
		<!-- title -->
		<title>pupuce</title>
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
		<!-- tentative to use dataTables framework --- does not work へ‿(ツ)‿ㄏ -->
		<link href='cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet'>
		<!-- Custom styles -->
		<!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
	</head>

	<?php include_once __DIR__.'/includes/database/Clients.php' ;
	include_once __DIR__.'/includes/database/Employes.php' ;
	include_once __DIR__.'/includes/database/Fournisseurs.php' ;
	require __DIR__.'/includes/medoo_init.php' ; //__DIR__ iz the name of the source directory
	session_start() ; ?>

	<body>
		<!-- bootstrap layout in container -->
		<section class="container-fluid">

		<!-- title bar -->
		<div class="row"><div class="col-md-12">
			<div class="jumbotron">
				<h3 class="h3 text-center" style="font-family:'Berkshire Swash', Sans-serif;">CHEZ PUPUCE</h3>
			</div>
		</div></div>

		<?php if (!isset($_SESSION['USER']) && empty($_SESSION['USER']) &&!isset($_SESSION['EMPLOYE']) && empty($_SESSION['EMPLOYE'])) { ?>
			<div class="row">
				<!-- form to create a Client. All IDs are unique! -->
				<div class="col-md-6 list-group-item-info">
					<?php include __DIR__.'/includes/htmlParts/client_register.php' ; ?>
				</div>
				<!-- form to connect an existing Client using his password -->
				<div class="col-md-6 list-group-item-success">
					<?php include __DIR__.'/includes/htmlParts/client_connect.php' ; ?>
				</div>
			</div>
			<div class="row">
				<!-- form to create an Employe. All IDs are unique! -->
				<div class="col-md-6 list-group-item-dark">
					<?php include __DIR__.'/includes/htmlParts/employe_register.php' ; ?>
				</div>
				<div class="col-md-6 list-group-item-danger">
					<?php include __DIR__.'/includes/htmlParts/employe_connect.php' ; ?>
				</div>
			</div>
		<?php } ?>

		<?php if (isset($_SESSION['USER']) && !empty($_SESSION['USER'])) { 
			include __DIR__.'/includes/htmlParts/client_panel.php' ;
		}

		if (isset($_SESSION['EMPLOYE']) && !empty($_SESSION['EMPLOYE'])) {
			include __DIR__.'/includes/htmlParts/employe_panel.php' ;
		} ?>


		</section>
		<!-- tentative to use dataTables framework --- does not work へ‿(ツ)‿ㄏ -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src='cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
	</body>
</html>







