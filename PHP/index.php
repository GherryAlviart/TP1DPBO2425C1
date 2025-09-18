<?php
session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}
$products = $_SESSION['products'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Electronics Store</title>
  <style>
    body {font-family: Arial, sans-serif;background: #f5f5f5;margin: 0;padding: 0;}
    .container {width: 90%;max-width: 1200px;margin: 30px auto;}
    h2 {font-weight: bold;margin-bottom: 20px;}
    .top-bar {display: flex;justify-content: space-between;align-items: center;margin-bottom: 30px;}
    .btn {text-decoration: none;padding: 8px 14px;border-radius: 6px;font-size: 14px;transition: 0.2s;display: inline-block;}
    .btn-dark {background: #222;color: #fff;}
    .btn-dark:hover {background: #000;}
    .btn-outline {border: 1px solid #222;color: #222;background: transparent;}
    .btn-outline:hover {background: #222;color: #fff;}
    .alert {padding: 15px;background: #eee;border-radius: 8px;text-align: center;}
    .grid {display: grid;grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));gap: 20px;}
    .card {background: #fff;border-radius: 10px;box-shadow: 0 4px 10px rgba(0,0,0,0.1);overflow: hidden;display: flex;flex-direction: column;}
    .card img {width: 100%;height: 200px;object-fit: cover;background: #ddd;}
    .card-body {padding: 15px;flex: 1;}
    .card-title {font-size: 18px;font-weight: bold;margin: 0;}
    .card-category {font-size: 14px;color: #666;margin-bottom: 10px;}
    .price {font-weight: bold;margin: 10px 0;font-size: 16px;}
    .card ul {list-style: none;padding: 0;margin: 0 0 10px 0;font-size: 14px;color: #333;}
    .actions {display: flex;gap: 8px;}
    .actions a {flex: 1;text-align: center;}
  </style>
</head>
<body>
<div class="container">
  <div class="top-bar">
    <h2>📱 Electronics Store</h2>
    <div>
      <a href="add.php" class="btn btn-dark">➕ Add Product</a>
      <a href="search.php" class="btn btn-outline">🔍 Search</a>
    </div>
  </div>

  <?php if (count($products) == 0): ?>
    <div class="alert">No products yet.</div>
  <?php else: ?>
    <div class="grid">
      <?php foreach ($products as $i => $p): ?>
        <div class="card">
          <?php if (!empty($p['image'])): ?>
            <img src="<?= $p['image'] ?>" alt="Product Image">
          <?php else: ?>
            <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image">
          <?php endif; ?>
          <div class="card-body">
            <h3 class="card-title"><?= $p['brand'] ?> <?= $p['type'] ?></h3>
            <p class="card-category"><?= $p['category'] ?></p>
            <p class="price">Rp<?= number_format($p['price'], 0, ',', '.') ?></p>
            <ul>
              <li>Stock: <?= $p['stock'] ?> units</li>
              <li>Warranty: <?= $p['warranty'] ?> years</li>
            </ul>
            <div class="actions">
              <a href="edit.php?id=<?= $i ?>" class="btn btn-outline">✏️ Edit</a>
              <a href="delete.php?id=<?= $i ?>" class="btn btn-outline" style="border-color:red; color:red;" onclick="return confirm('Delete this product?')">🗑️ Delete</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
</body>
</html>
