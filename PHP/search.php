<?php
session_start();
$products = $_SESSION['products'];
$result = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    foreach ($products as $p) {
        if ($p['id'] === $id) {
            $result = $p;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Product</title>
  <style>
    body {font-family: Arial, sans-serif;background:#f5f5f5;}
    .container {width: 90%;max-width: 600px;margin: 30px auto;}
    .form-card {background:#fff;padding:20px;border-radius:10px;box-shadow:0 4px 10px rgba(0,0,0,0.1);}
    .form-group {margin-bottom:15px;}
    .form-group label {display:block;font-weight:bold;margin-bottom:6px;}
    .form-group input {width:100%;padding:8px;border:1px solid #ccc;border-radius:6px;}
    .btn {padding:8px 14px;border-radius:6px;text-decoration:none;display:inline-block;}
    .btn-dark {background:#222;color:#fff;}
    .btn-outline {border:1px solid #222;color:#222;}
    .btn-outline:hover {background:#222;color:#fff;}
    .card {background: #fff;border-radius: 10px;box-shadow: 0 4px 10px rgba(0,0,0,0.1);margin-top:20px;overflow:hidden;}
    .card img {width: 100%;height: 200px;object-fit: cover;}
    .card-body {padding: 15px;}
    .card-title {font-size: 18px;font-weight: bold;margin: 0;}
    .card-category {font-size: 14px;color: #666;margin-bottom: 10px;}
    .price {font-weight: bold;margin: 10px 0;font-size: 16px;}
  </style>
</head>
<body>
<div class="container">
  <h2>🔍 Search Product</h2>
  <form method="POST" class="form-card">
    <div class="form-group"><label>Enter Product ID</label><input type="text" name="id" required></div>
    <button type="submit" class="btn btn-dark">Search</button>
    <a href="index.php" class="btn btn-outline">Back</a>
  </form>

  <?php if ($result): ?>
    <div class="card">
      <?php if (!empty($result['image'])): ?>
        <img src="<?= $result['image'] ?>" alt="Product Image">
      <?php endif; ?>
      <div class="card-body">
        <h3 class="card-title"><?= $result['brand'] ?> <?= $result['type'] ?></h3>
        <p class="card-category"><?= $result['category'] ?></p>
        <p class="price">Rp<?= number_format($result['price'], 0, ',', '.') ?></p>
        <ul>
          <li>Stock: <?= $result['stock'] ?> units</li>
          <li>Warranty: <?= $result['warranty'] ?> years</li>
        </ul>
      </div>
    </div>
  <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <div class="form-card" style="margin-top:20px;text-align:center;">Product not found.</div>
  <?php endif; ?>
</div>
</body>
</html>
