<?php 
require_once "app/config.php";

$data=[
  'title'=>'Tienda Carritow',
  'products'=>get_products()
];

add_to_cart(8);
// session_destroy();
print_r(get_cart());


render_view('view-cart',$data);

