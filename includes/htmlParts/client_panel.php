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
	<div class="col-md-6 list-group-item-secondary" style="border:0.025rem solid blue; overflow:scroll; max-height:30rem;">
		<!-- button to disconnect a Client -->
		<form action="./includes/treatments/formSubmit.php" method="post" class="form-group">
			<legend class="mt-5 h4 text-primary">Déconnexion du compte client</legend>
			<input type="submit" id="connected_client_disconnect" name="connected_client_disconnect" class="btn btn-primary form-control" value="Déconnection">
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
			<div class="col-md-12 list-group-item-primary" style="border:0.025rem solid grey; overflow:scroll; max-height:10rem">
				<h4 class="h4 text-center mt-4">Mon panier</h4>
				<ul class="list-group m-3">
					<li class="list-group-item list-group-item-primary">
						<div class="d-flex flex-row justify-content-between align-items-baseline">
							<span>Produit 1</span>
							<span>12.00</span>
							<span>€</span>
							<button type="submit" class="btn btn-sm btn-danger"><span class="fas fa-trash-alt"></span></button>
						</div>
					</li>
					<li class="list-group-item list-group-item-info">
						<div class="d-flex flex-row justify-content-end">
							<span>Total&emsp;</span>
							<span>12.00&emsp;</span>
							<span>€</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 list-group-item-warning" style="border:0.025rem solid grey; overflow:scroll; max-height:20rem">
				<h4 class="h4 text-center my-4">Sélection de produits</h4>

				<div class="row d-flex flex-row flew-wrap">

					<div class="card col-4" style="width: 18rem;">
						<img class="card-img-top" src="http://via.placeholder.com/200x200" alt="Card image cap">
						<div class="card-body">
					    	<h4 class="card-title">Produit</h4>
					    	<h5 class="card-title h5">Prix : 12.00 €</h5>
					    	<p class="card-text">Le produit du produit le plus beau de tous les produiduits.</p>
						</div>
					</div>
					<div class="card col-4" style="width: 18rem;">
						<img class="card-img-top" src="http://via.placeholder.com/200x200" alt="Card image cap">
						<div class="card-body">
					    	<h4 class="card-title">Produit</h4>
					    	<h5 class="card-title h5">Prix : 12.00 €</h5>
					    	<p class="card-text">Le produit du produit le plus beau de tous les produiduits.</p>
						</div>
					</div>
					<div class="card col-4" style="width: 18rem;">
						<img class="card-img-top" src="http://via.placeholder.com/200x200" alt="Card image cap">
						<div class="card-body">
					    	<h4 class="card-title">Produit</h4>
					    	<h5 class="card-title h5">Prix : 12.00 €</h5>
					    	<p class="card-text">Le produit du produit le plus beau de tous les produiduits.</p>
						</div>
					</div>
					<div class="card col-4" style="width: 18rem;">
						<img class="card-img-top" src="http://via.placeholder.com/200x200" alt="Card image cap">
						<div class="card-body">
					    	<h4 class="card-title">Produit</h4>
					    	<h5 class="card-title h5">Prix : 12.00 €</h5>
					    	<p class="card-text">Le produit du produit le plus beau de tous les produiduits.</p>
						</div>
					</div>


				</div>

			</div>
		</div>
	</div>
</div>