<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) { mkdir($uploadDir); }
    $imagePath = "";
    if (!empty($_FILES['image']['name'])) {
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }
    $newProduct = [
        'id' => $_POST['id'],
        'category' => $_POST['category'],
        'brand' => $_POST['brand'],
        'type' => $_POST['type'],
        'price' => (int)$_POST['price'],
        'stock' => (int)$_POST['stock'],
        'warranty' => (int)$_POST['warranty'],
        'image' => $imagePath
    ];
    foreach ($_SESSION['products'] as $p) {
        if ($p['id'] === $newProduct['id']) {
            die("Error: Product ID already exists. <a href='index.php'>Back</a>");
        }
    }
    $_SESSION['products'][] = $newProduct;
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product</title>
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
  </style>
</head>
<body>
<div class="container">
  <h2>➕ Add Product</h2>
  <form method="POST" enctype="multipart/form-data" class="form-card">
    <div class="form-group"><label>ID</label><input type="text" name="id" required></div>
    <div class="form-group"><label>Category</label><input type="text" name="category" required></div>
    <div class="form-group"><label>Brand</label><input type="text" name="brand" required></div>
    <div class="form-group"><label>Type</label><input type="text" name="type" required></div>
    <div class="form-group"><label>Price</label><input type="number" name="price" required></div>
    <div class="form-group"><label>Stock</label><input type="number" name="stock" required></div>
    <div class="form-group"><label>Warranty (years)</label><input type="number" name="warranty" required></div>
    <div class="form-group"><label>Image</label><input type="file" name="image"></div>
    <button type="submit" class="btn btn-dark">Save</button>
    <a href="index.php" class="btn btn-outline">Cancel</a>
  </form>
</div>
</body>
</html>
