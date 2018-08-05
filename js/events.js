$(document).ready(function() {

	// sumArray stays in memory over the whole process
	var sumArray = [] ;

	// when I click on any product from product selection
	$('.btnAddProduct').on('click', function() {
		// I create a new line to add in the Panier
		var produit =	'<li class="list-group-item list-group-item-primary">' +
							'<div class="d-flex flex-row justify-content-between align-items-baseline">' +
								'<span class="productAddedName">' + $(this).siblings('.card-title').text() + '</span>' +
								// '<span> Qté::' + '<span class="productAddedQty">1</span></span>' +
								'<span><span class="productAddedPrice">' + $(this).siblings('.h5').children('.itemPrice').text() + '</span>€</span>' +
								// '<button class="btnPlusProduct btn btn-sm btn-success"><span class="fas fa-plus"></span></button>' +
								// '<button class="btnMinusProduct btn btn-sm btn-warning"><span class="fas fa-minus"></span></button>' +
								// '<button class="btnDelProduct btn btn-sm btn-danger"><span class="fas fa-trash-alt"></span></button>' +
							'</div>' +
						'</li>' ;
		// I push the item's price into an array
		sumArray.push(parseFloat($(this).siblings('.h5').children('.itemPrice').text())) ;
		// I push the line
		$('#ulPanier').append(produit) ;
		console.log(sumArray) ;
		// I calculate the price total
		$('#panierTotal').empty() ;
		var tot = doSum(sumArray) ;
		$('#panierTotal').append(tot) ;
		// button cannot be clicked any more
		$(this).addClass('disabled');
		$(this).prop("disabled", true);

		// when I click on any "+" button from Panier list
		// WIP --- the goal of this part would be to increment the number of products on click. But the algorithm is not right ---
		// $('.btnPlusProduct').on('click', function() {
		// 	var qty = parseFloat($(this).siblings('span').children('.productAddedQty').text());
		// 	qty ++;
		// 	$(this).siblings('span').children('.productAddedQty').empty().append(qty);
		// 	var price = parseFloat($(this).siblings('span').children('.productAddedPrice').text());
		// 	price_qty=price*qty;
		// 	$(this).siblings('span').children('.productAddedPrice').empty().append(price_qty);
		// 	sumArray.push(price_qty-price) ;

		// }) ;

	}) ;



	// argument is an array
	function doSum(sum) {
		var total=0 ;
		for(var i=0;i<sumArray.length;i++) {
			total+=sum[i] ;
		}
		return total
	}

}) ;