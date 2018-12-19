<?php
@session_start(); //start session
require_once("models/game.php");
if(isset($_POST["ma_game"]))
{
  foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
  }
  $games=new game();
	$row=$games->Doc_game_theo_ma_game($new_product['ma_game']);
	
  $new_product["ten_game"] = $row["ten_game"];
  $new_product["don_gia_ban"] = $row["don_gia_ban"];//fetch product name from database
  if(isset($_SESSION["games"])){  //if session var already exist
		if(isset($_SESSION["games"][$new_product['ma_game']])) //check item exist in products array
		{
			unset($_SESSION["games"][$new_product['ma_game']]); //unset old item
		}			
  }
  $_SESSION["games"][$new_product['ma_game']] = $new_product;	//update products with new item array
 	$total_items = count($_SESSION["games"]); //count total items
	die(json_encode(array('items'=>$total_items))); //output json 
}
################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

	if(isset($_SESSION["games"]) && count($_SESSION["games"])>0){ //if we have session variable
		$cart_box = '<ul class="cart-products-loaded">';
		$total = 0;
		foreach($_SESSION["games"] as $product){ //loop though items and prepare html content
			
			//set variables to use them in HTML content below
			$currency="";
			$ten_games = $product["ten_game"]; 
	  $product_code = $product['ma_game'];
	  $product_price = $product['don_gia_ban'];
	  $product_qty = $product["product_qty"];
	  $cart_box .=  "<li>  $ten_games &mdash; ($product_qty * ".number_format($product_price,0,",","."). " $currency = ".number_format(($product_price * $product_qty),0,",","."). $currency . " ) <a href=\"#\" class=\"remove-item\" data-code=\"$product_code\">&times;</a></li>";
			$subtotal = ($product_price * $product_qty);
			$total = ($total + $subtotal);
		}
		$cart_box .= "</ul>";
		$cart_box .= '<div class="cart-products-total">Tổng cộng : '.number_format($total,0,",",".").$currency.' <u><a href="gio_hang.php" title="Xem giỏ hàng">Đặt hàng</a></u></div>';
		die($cart_box); //exit and output content
	}else{
		die("Bạn chưa mua hàng... "); //we have empty cart
	}
}
################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["games"]))
{
	$product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["games"][$product_code]))
	{
		unset($_SESSION["games"][$product_code]);
	}
	
 	$total_items = count($_SESSION["games"]);
	die(json_encode(array('items'=>$total_items)));
}
################# update value item from shopping cart ################
if(isset($_GET["update_code"]) && isset($_SESSION["games"]))
{
	$product_code   = filter_var($_GET["update_code"], FILTER_SANITIZE_STRING); //get the product code to update
	$product_value   = filter_var($_GET["value"], FILTER_SANITIZE_STRING); //get the product val to update

	if(isset($_SESSION["games"][$product_code]))
	{
		$_SESSION["games"][$product_code]["product_qty"]=$product_value;
	}
	
 	$total_items = count($_SESSION["games"]);
	die(json_encode(array('items'=>$total_items)));
}
?>