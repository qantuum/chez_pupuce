<?php
//user interface to disconnect or delete account from database (if client is connected) ?>
<!-- A small patch of text to say hello to Client with his name and surname -->
<div class="row">
	<div class="col-md-12 list-group-item-dark">
		<?php echo '<h3 class="h3 text-dark">Bonjour '.$_SESSION['USER']->_name.' '.$_SESSION['USER']->_surname ; ?>
	</div>
</div>

<!-- my three forms in one div -->
<div class="row">
	<div class="col-md-6 list-group-item-secondary" style="border:0.025rem solid blue; overflow:scroll; max-height:50rem;">
		<!-- button to disconnect a Client -->
		<form action="./includes/treatments/formSubmit.php" method="post" class="form-group">
			<legend class="mt-5 h4 text-primary">Déconnexion du compte client</legend>
			<input type="submit" id="connected_client_disconnect" name="connected_client_disconnect" class="btn btn-primary form-control" value="Déconnexion">
		</form>
		<!-- form to update info about Client -->
		<form action="./includes/treatments/formSubmit.php" method="post" class="form-group">
			<legend class="mt-5 h4 text-info">Mise à jour du compte :</legend>
			<label for="update_client_surname">Nom : </label>
			<input class="form-control" id="update_client_surname" name="update_client_surname" type="text" placeholder="Paltuvier" value="<?php echo $_SESSION['USER']->_surname ; ?>">
			<label for="update_client_name">Prénom : </label>
			<input class="form-control" id="update_client_name" name="update_client_name" type="text" placeholder="Christophe" value="<?php echo $_SESSION['USER']->_name ; ?>">
			<label for="update_client_email">Adresse e-mail : </label>
			<input class="form-control" id="update_client_email" name="update_client_email" type="text" placeholder="chat@chat.fr" value="<?php echo $_SESSION['USER']->_email ; ?>">
			<label for="update_client_address">Adresse : </label>
			<input class="form-control" id="update_client_address" name="update_client_address" type="text" placeholder="27, avenue de l'Ouganda" value="<?php echo $_SESSION['USER']->_address ; ?>">
			<label for="update_client_postal">Code postal : </label>
			<input class="form-control" id="update_client_postal" name="update_client_postal" type="text" placeholder="05553" value="<?php echo $_SESSION['USER']->_postal ; ?>">
			<label for="update_client_town">Ville : </label>
			<input class="form-control" id="update_client_town" name="update_client_town" type="text" placeholder="Licorneville" value="<?php echo $_SESSION['USER']->_town ; ?>">
			<label for="update_client_birthday">Date de naissance : </label>
			<input class="form-control" id="update_client_birthday" name="update_client_birthday" type="date" placeholder="le meilleur jour du monde" value="<?php echo $_SESSION['USER']->_birthday ; ?>">
			<label for="update_client_pswd1">Changer le mot de passe : </label>
			<input class="form-control" id="update_client_pswd1" name="update_client_pswd1" type="password" placeholder="pass">
			<label for="update_client_pswd2">Retaper nouveau mot de passe : </label>
			<input class="form-control" id="update_client_pswd2" name="update_client_pswd2" type="password" placeholder="pass">
			<input type="submit" id="update_client_values" name="update_client_values" class="mt-5 btn btn-info form-control" value="Mettre à jour">
		</form>
		<!-- button to delete THIS client's account (data is stored in $_SESSION['USER']) -->
		<form action="./includes/treatments/formSubmit.php" method="post" class="mt-5 form-group">
			<legend class="mt-5 h4 text-danger">Suppression du compte client</legend>
			<input type="submit" id="connected_client_delete_account" name="connected_client_delete_account" class="btn btn-danger form-control" value="Suppression">
		</form>
	</div>



	<!-- Client panel including Cart and Product selection ! -->
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12 list-group-item-primary" style="border:0.025rem solid grey; overflow:scroll; max-height:20rem">
				<h4 class="h4 text-center mt-4">Mon panier</h4>
				<ul class="list-group m-3" id="ulPanier">
					<li class="list-group-item list-group-item-info">
						<div class="d-flex flex-row justify-content-end">
							<span>Total&emsp;</span>
							<span id="panierTotal">0.00</span>&emsp;
							<span>€</span>
						</div>
					</li>
				</ul>
				<form class="form-group" action="./includes/treatments/formSubmit.php" method="post">
					<input class="btn btn-warning" type="submit" value="Sauvegarder le panier" id="cartSave" name="cartSave">
					<input class="btn btn-primary" type="submit" value="Passer commande" id="cartGO" name="cartGO">
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 list-group-item-warning" style="border:0.025rem solid grey; overflow:scroll; max-height:30rem">
				<h4 class="h4 text-center my-4">Sélection de produits</h4>

				<div class="row d-flex flex-row flew-wrap">
					<?php

					// I create a new Fournisseurs and I retrieve the data from db
					$allProduits=Produits::dataReadAll($database);
					// I show my result in the field using a for loop
					for ($i=0;$i<count($allProduits);$i++) {
						echo    '<div class="card col-4" style="width: 18rem;">
									<img class="card-img-top" src="'.$allProduits[$i]['pupuce_produit_image'].'" alt="Card image cap">
									<div class="card-body">
								    	<h4 class="card-title">'.$allProduits[$i]['pupuce_produit_nom'].'</h4>
								    	<h4 class="h4">Vendu par : '.$allProduits[$i]['pupuce_fournisseur_nom'].'</h4>
								    	<h5 class="h5">Prix : <span class="itemPrice">'.$allProduits[$i]['pupuce_produit_prix'].'</span> €</h5>
								    	<p class="card-text">'.$allProduits[$i]['pupuce_produit_description'].'</p>
								    	<button class="btnAddProduct btn btn-success btn-sm float-right"><span class="fas fa-star"></span> ZE LE VEU</button>
									</div>
								</div>' ;
					}

					?>


				</div>

			</div>
		</div>
	</div>
</div>
<!-- jQuery call -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="./js/events.js"></script>