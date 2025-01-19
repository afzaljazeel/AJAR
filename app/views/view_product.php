<?php
if (!isset($product)) {
    echo "<p class='text-center text-red-500'>Product not found.</p>";
    return;
} else {
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center p-3">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center"><?php echo htmlspecialchars($product['name']); ?></h2>
        <img src="/AJAR/public/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" class="w-full h-40 object-cover rounded-md mb-6">
        <p class="text-gray-600 text-lg mb-4">Price: LKR <?php echo htmlspecialchars($product['price']); ?></p>
        <p class="text-gray-400 text-lg mb-4">Details: <?php echo htmlspecialchars($product['product_detail']); ?></p>    
    </div>
</body>
</html>
