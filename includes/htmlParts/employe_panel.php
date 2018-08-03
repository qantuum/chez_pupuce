<?php
//user interface to disconnect or delete account from database (if employe is connected) ?>
<!-- A small patch of text to say hello to Employe with his name and surname -->
<div class="row">
	<div class="col-md-12 list-group-item-light">
		<?php echo '<h3 class="h3 text-dark">Bonjour '.$_SESSION['EMPLOYE']->_name.' '.$_SESSION['EMPLOYE']->_surname ; ?>
	</div>
</div>

<!-- my two forms in one div -->
<div class="row">
	<div class="col-md-6 list-group-item-secondary">
		<!-- button to disconnect an Employe -->
		<form action="./includes/treatments/formSubmit.php" method="post" class="form-group">
			<legend class="mt-5 h4 text-primary">Déconnexion du compte employé</legend>
			<input type="submit" id="connected_employe_disconnect" name="connected_employe_disconnect" class="btn btn-primary form-control" value="Déconnexion">
		</form>
		
		<!-- button to delete THIS Employe's account (data is stored in $_SESSION['USER']) -->
		<form action="./includes/treatments/formSubmit.php" method="post" class="mt-5 form-group">
			<legend class="mt-5 h4 text-danger">Suppression du compte employé</legend>
			<input type="submit" id="connected_employe_delete_account" name="connected_employe_delete_account" class="btn btn-danger form-control" value="Suppression">
		</form>
	</div>
	<div class="col-md-6">
		<img src="https://www.trouvezmoi.fr/wp-content/uploads/2016/10/chiens_chats.jpg" style="max-width:100%;max-height:auto;" alt="animals">
	</div>
</div>

<!-- Employe panel to see Fournisseurs table -->
<div class="row">
	<div class="col-md-12 list-group-item-primary table-responsive">
		<h4 class="h4 text-primary text-center my-5">Liste des fournisseurs</h4>
		<table class="table table-striped table-success table-hover display" id="fournisseursTable">
			<!-- table start -->
			<thead class="thead thead-light">
				<tr>
					<th>id</th>
					<th>Nom</th>
					<th>e-mail</th>
					<th>Ville</th>
					<th>Code comptable</th>
				</tr>
			</thead>
			<tbody>
			<?php
				// I create a new Fournisseurs and I retrieve the data from db
				$allFournisseurs=Fournisseurs::dataReadAll($database);
				// I show my result in the table using a for loop
				for ($i=0;$i<count($allFournisseurs);$i++) { // how many lines returned in allFournisseurs
					echo 	'
								<tr>
									<th>'.$allFournisseurs[$i]['pupuce_fournisseur_id'].'</th>
									<td>'.$allFournisseurs[$i]['pupuce_fournisseur_nom'].'</td>
									<td>'.$allFournisseurs[$i]['pupuce_fournisseur_mail'].'</td>
									<td>'.$allFournisseurs[$i]['pupuce_fournisseur_ville'].'</td>
									<td>'.$allFournisseurs[$i]['pupuce_fournisseur_code_compt'].'</td>
								</tr>
							' ;
				}
			?>
			</tbody>
		</table>
		<!-- tentative to use dataTables framework --- does not work へ‿(ツ)‿ㄏ -->
		<script>
			$(document).ready( function () {
		    $('#fournisseursTable').DataTable();
			} );
		</script>

	</div>		
</div>

<!-- Employe panel to see Produits table (with inner joint to show Fournisseurs name -->
<div class="row">
	<div class="col-md-12 list-group-item-danger table-responsive">
		<h4 class="h4 text-dark text-center my-5">Liste des Produits</h4>
		<table class="table table-striped table-secondary table-hover display">
			<!-- table start -->
			<thead class="thead thead-light">
				<tr>
					<th>id produit</th>
					<th>Nom produit</th>
					<th>Thumbnail</th>
					<th>Prix (€)</th>
					<th>Qté. Dispo</th>
					<th>Nom Fournisseur</th>
				</tr>
			</thead>
			<tbody>
			<?php
				// I create a new Fournisseurs and I retrieve the data from db
				$allProduits=Produits::dataReadAll($database);
				// I show my result in the table using a for loop
				for ($i=0;$i<count($allProduits);$i++) {
					echo 	'
								<tr>
									<th>'.$allProduits[$i]['pupuce_produit_primary_id'].'</th>
									<td>'.$allProduits[$i]['pupuce_fournisseur_nom'].'</td>
									<td><img class="img-thumbnail" src="'.$allProduits[$i]['pupuce_produit_image'].'" alt="img" style="max-width:6.5rem;max-height:auto"></td>
									<td>'.$allProduits[$i]['pupuce_produit_prix'].'</td>
									<td>'.$allProduits[$i]['pupuce_produit_stock'].'</td>
									<td>'.$allProduits[$i]['pupuce_fournisseur_nom'].'</td>
								</tr>
							' ;
				}
			?>
			</tbody>
		</table>

	</div>		
</div>