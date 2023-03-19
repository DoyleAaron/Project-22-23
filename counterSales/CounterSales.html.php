<!-- 
Page: CounterSales.html.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen that the user will see for the counter sales tab and it shows the user the stock, allows them to select the stock and then updates the total
-->
<?php
include '../assets/php/db_connection.php';
?>

<!-- 
    Icons obtained from https://remixicon.com/ and https://fonts.google.com/icons 
 -->
<html lang="en">
<head>
    <title>Pharmacy</title>
    <link rel="stylesheet" href="CounterSales.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	
</head>
	<script>
    function populate(){
        var sel = document.getElementById("listbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
        var counterSaleDetails = result.split(',');
        document.getElementById("description").value = counterSaleDetails[0];
        document.getElementById("retailPrice").value = counterSaleDetails[1];
    }
	//This function is being used to populate the form with the items in the CounterStock Table
		
    function addToCart(){
        var response;
        response = confirm('Are you sure you want to add to cart?');
        if(response){
        	document.getElementById("description").disabled = false;
            document.getElementById("retailPrice").disabled = false;
            document.getElementById("quantity").disabled = false;
			return true;
        } else{
            populate();
            return false;
        }
    }
	// This function is being used to add the selected item into the cart
	function confirmPurchase(){
        var response;
        response = confirm('Are you sure you want to confirm this purchase?');
        if(response){
			return true;
        } else{
            populate();
            return false;
        }
    }
	// This function is being used to confirm that the user wants to confirm the purchase
</script>
<body>
    <div class="horizonal-nav">
        <span id="time"></span>
            <div class="logo-container">
            <i class="ri-capsule-line"></i>
            <span id="logo-title"> | BP</span>
        </div>
        <div class="account-container">
            <button>
                <span class="accountId">Logout</span>
            </button>
        </div>
    </div>
    <div class="main-container">
        <div class="vertical-nav">
            <a href="#">Drugs</a>
            <a href="#">Stock Control</a>
            <a href="#">Doctor</a>
            <a href="#" class="selected">Customer</a>
            <a href="#">Supplier</a>
        </div>
        <main>
            <div class="form-container">
        <h1 align="center">Counter Sales</h1>
		<?php include 'listbox.php'; ?>
        <form name="productForm" action="CounterSales.php" onsubmit="return addToCart()" method="post">

			<div class="inputbox">
				<label for="description">Product Name</label>
				<input type="text" name="description" id="description" disabled>
			</div>

			<div class="inputbox">
				<label for="retailPrice">Retail Price</label>
				<input type="float" name="retailPrice" id="retailPrice" disabled>
			</div>
			
			<div class="inputbox">
				<label for="quantity" >Quantity</label>
				<input type="number" id="quantity" name="quantity" min="1">
			</div>
			
			<br>
    		<input type="submit" value="Add to Cart" class="buttoncss" align="center">
		</form>
			<h3>Cart</h3>
<?php
	include "cart.php";
?>
	<form name ="completePurchase" action="CompletePurchase.php" onsubmit="confirmPurchase()" method="post">
		<input type="submit" value="Checkout" class="buttoncss" align="center">
	</form>
	<br>
	<a href="../Menu/AaronsMenu.html" class="homeMenu">Return To Menu</a>
			</div>
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>