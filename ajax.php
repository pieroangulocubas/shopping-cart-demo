<?php
require 'app/config.php';

if(!isset($_POST["action"])){
  http_response_code(403);
  echo json_encode(['status'=>403]);
  die;
}

$action=$_POST["action"];

switch($action){
  case 'get':
    $cart=get_cart();
    $output='';
    if(!empty($cart['products'])){
      $output.='
        <div class="table-responsive"> 
          <table class="table table-hover table-striped table-sm">
            <thead>
              <tr class="table-dark">
                <th>Producto</th>
                <th >Cantidad</th>
                <th class="text-center">Total</th>
                <th class="text-end"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="align-middle">
                  Producto 1
                  <small class="d-block text-muted">SKU 123456789</small>
                </td>
                <td class="align-middle" width="10%">
                  <input class="form-control form-control-sm" min=0 max=50 type="number" value=1>
                </td>
                <td class="text-center align-middle">$149.90</td>
                <td class="text-end align-middle">
                  <i class="fas fa-trash text-danger"></i>
                </td>
              </tr>             
            </tbody>
          </table>
        </div> 
        <button class="btn btn-danger">Vaciar carrito</button>';
    }else{
      $output.="No hay productos en el carrito";
    }
         
    $output .='
       <!-- Totals table -->
        <table class="table">
          <tr>
            <th  class="align-middle">Subtotal</th>
            <td class="text-end">$250.50</td>
          </tr>
          <tr>
            <th  class="align-middle">Envio</th>
            <td class="text-end text-danger">$50.00</td>
          </tr>
          <tr>
            <th class="align-middle">Total</th>
            <td class="text-end text-xl align-middle">
              <h3 class="fw-bold text-success">$200.50</h3>
            </td>
          </tr>
        </table>
  
        <!-- Pay now button -->
        <div class="d-grid">    
          <button class="btn btn-info btn-lg btn-block" disabled>Pagar ahora</button>
        </div>';

       
    json_output(200,'Ok',$output);
    break;
}
