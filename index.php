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
		<!-- Custom styles -->
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<?php include_once __DIR__.'/includes/database/Clients.php' ;
	require __DIR__.'/includes/medoo_init.php' ;
	session_start() ; ?>

	<body>
		<!-- bootstrap layout in container -->
		<section class="container-fluid">

		<!-- title bar -->
		<div class="row"><div class="col-md-12">
			<div class="jumbotron">
				<h3 class="h3 text-center">CHEZ PUPUCE</h3>
			</div>
		</div></div>

		<!-- (wrong order but still) : if user is disconnected ($_SESSION['USER'], set in formSubmit.php, display 1. Else, display 2) -->
		<?php if (!isset($_SESSION['USER']) && empty($_SESSION['USER'])) { ?>
			<!-- form to create a Client. All IDs are unique! -->
			<div class="row">
				<div class="col-md-6 list-group-item-info">
					<?php include __DIR__.'/includes/htmlParts/client_register.php' ; ?>
				</div>
				<!-- form to connect an existing Client using his password -->
				<div class="col-md-6 list-group-item-success">
					<?php include __DIR__.'/includes/htmlParts/client_connect.php' ; ?>
				</div>
			<?php }

			if (isset($_SESSION['USER']) && !empty($_SESSION['USER'])) { 
				include __DIR__.'/includes/htmlParts/client_panel.php' ;
			} ?>
			</div>

		</section>
	</body>
</html>







