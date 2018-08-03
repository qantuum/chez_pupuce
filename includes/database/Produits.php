<?php

class Produits {

	// attributes
	// WIP

	// constructor -- none

	// setters
	// getters
	// WIP

	// methods
	// WIP

	public function dataReadAll($database) { // stands for the "readInfo" on the class diagram
		// I use the query function since the two waterfall inner joins are too complex for writing in Medoo syntax...
		$array = get_database($database)->query(
			"SELECT `pupuce_produit_primary_id`, `pupuce_produit_image`, `pupuce_produit_prix`, `pupuce_produit_stock`, `pupuce_fournisseur_nom`
			FROM `pupuce_produit`
			INNER JOIN `pupuce_produit_fournisseur`
			INNER JOIN `pupuce_fournisseur`
			WHERE `pupuce_produit_id` = `pupuce_produit_primary_id`
			AND `pupuce_fournisseur_id` = `pupuce_fournisseur_index_id`"
		)->fetchALl() ;
		return $array ;
	}
}