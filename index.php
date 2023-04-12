<?php 
require_once "app/config.php";

$data=[
  'title'=>'Tienda Carritow',
  'products'=>get_products()
];

$_SESSION["cart"]['products']=get_product(1);

render_view('view-cart',$data);

