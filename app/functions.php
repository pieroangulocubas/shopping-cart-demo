<?php

function get_products(){
  $products=require APP.'products.php';
  return $products;
}

function get_product($id){
  $products=get_products();
  foreach($products as $product){
    if($product["id"]== $id){
      return $product;
    }
  }
  return $product;
}

function render_view($view,$data=[]){
  if(!is_file(VIEWS.$view.'.php')){
    echo "La vista $view no existe";
    die;
  }
  require_once VIEWS.$view.'.php';
}

function format_currency($number,$symbol="$"){
  if(!is_float($number) && !is_integer($number)){
    $number=0;
  }
  return $symbol.number_format($number,2,'.',',');
}

function json_output($status=200,$msg='',$data=[]){
  http_response_code($status);
  $response=[
    'status'=>$status,
    'message'=>$msg,
    'data'=>$data
  ];
  echo json_encode($response);
  die;
}

// **************************
// Funciones del carrito
// **************************

function get_cart(){
  if(isset($_SESSION["cart"])){
    $_SESSION["cart"]["cart_totals"]=calculate_cart_total();
    return $_SESSION["cart"];
  }
  $cart=[
    'products'=>[],
    'cart_totals'=>calculate_cart_total(),
    'payment_url'=>NULL
  ];
  $_SESSION["cart"]=$cart;
  return $_SESSION["cart"];
}


function calculate_cart_total(){
 if(!isset($_SESSION["cart"]) || empty($_SESSION["cart"]["products"])){
  $cart_totals=[
    'subtotal'=>0,
    'shipment'=>0,
    'total'=>0
  ];
  return $cart_totals;
 }

 $subtotal=0;
 $shipment=SHIPPING_COST;
 $total=0;

 foreach($_SESSION["cart"]["products"] as $product){
  $product_total=$product["cantidad"]*$product["precio"];
  $subtotal= floatval($subtotal + $product_total);
 }

 $total=$subtotal + $shipment;

 $cart_totals=[
  'subtotal'=>$subtotal,
  'shipment'=>$shipment,
  'total'=>$total
 ];

 return $cart_totals;
}


function add_to_cart($product_id,$quantity=1){
  $product=get_product($product_id);
  if(!$product){
    return false;
  }
  $new_product=[
    ...$product,
    'cantidad'=>$quantity
  ];
  if(!isset($_SESSION["cart"]) || empty($_SESSION["cart"]["products"])){
    $_SESSION["cart"]["products"][]=$new_product;
    return true;
  };

  foreach($_SESSION["cart"]["products"] as $index=>$p){
    if($p["id"]==$product_id){
      $p["cantidad"]=++$p["cantidad"];
      $_SESSION["cart"]["products"][$index]=$p;
      return true;
    }else{
      $_SESSION["cart"]["products"][]=$new_product;
      return true;
    }
  }
  return false;
}

