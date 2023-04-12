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

// **************************
// Funciones del carrito
// **************************

function get_cart(){
  if(isset($_SESSION["cart"])){
    return $_SESSION["cart"];
  }
  $cart=[
    'products'=>[],
    'total_products'=>0,
    'subtotal'=>0,
    'shipment'=>0,
    'total'=>0,
    'payment_url'=>NULL
  ];
  $_SESSION["cart"]=$cart;
  return $_SESSION["cart"];
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