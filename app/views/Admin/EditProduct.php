<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center">
    <?php include 'admin_header.php'; ?>

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Edit Product</h2>
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <div class="flex flex-col">
                <label for="name" class="mb-1 text-gray-600">Product Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" class="border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="flex flex-col">
                <label for="price" class="mb-1 text-gray-600">Product Price:</label>
                <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" class="border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="flex flex-col">
                <label for="detail" class="mb-1 text-gray-600">Product Details:</label>
                <textarea id="detail" name="detail" rows="4" class="border border-gray-300 rounded-md p-2" required><?php echo htmlspecialchars($product['product_detail']); ?></textarea>
            </div>
            <div class="flex flex-col">
                <label for="image" class="mb-1 text-gray-600">Product Image:</label>
                <input type="file" name="image" id="image" class="border border-gray-300 rounded-md p-2">
            </div>
            <button type="submit" class="w-full bg-black text-white py-2 rounded-md hover:bg-blue-600">Update Product</button>
        </form>
    </div>
</body>

</html>
