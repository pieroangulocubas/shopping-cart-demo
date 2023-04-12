<?php require_once 'includes/inc-header.php' ?>
<body>
<?php require_once 'includes/inc-navbar.php' ?>
<div class="container-fluid py-5">
  <!-- page content -->
  <div class="row">
    <div class="col-xl-8">
      <h2>Productos</h2>
      <div class="row">
        <?php foreach ($data['products'] as $product): ?>
        <div class="col-md-3 mb-3">
          <div class="card">
            <img src="<?= IMAGES.$product['imagen'] ?>" class="card-img-top" alt="<?= $product["nombre"] ?>">
            <div class="card-body p-2 ">
              <h5 class="card-title text-truncate"><?= $product["nombre"]?></h5>
              <p class="text-success"><?= format_currency($product["precio"]) ?></p>
              <button class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-title="Agregar al carrito">
                <i class="fas fa-plus"></i>
                Agregar al carrito
              </button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-xl-4">
      <h2>Carrito</h2>
      <div id="cart-wrapper">
      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/inc-footer.php' ?>