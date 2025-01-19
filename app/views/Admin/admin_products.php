<?php
// Include necessary files
require_once 'C:\xampp\htdocs\AJAR\app\connection.php';
require_once 'C:\xampp\htdocs\AJAR\app\controllers\ProductController.php';
include_once 'C:\\xampp\\htdocs\\AJAR\\app\\controllers\\AuthController.php';

// Handle form submission via the controller
$response = ProductController::handleProductForm($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
</head>
<body class="bg-gray-100 text-gray-800">

<!-- Header -->
<?php include 'admin_header.php'; ?>

<section class="m-16 p-4">
    <!-- Add Product Form -->
    <div class="flex justify-center items-center">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Add New Product</h2>
            <?php if (isset($response)) { ?>
                <p class="text-center text-green-600 font-semibold mb-4"><?php echo $response; ?></p>
            <?php } ?>
            <form method="POST" action="admin_product_panel.php" enctype="multipart/form-data" class="space-y-4">
                <div class="flex flex-col">
                    <label for="name" class="mb-1 text-gray-600">Product Name</label>
                    <input type="text" name="name" id="name" class="border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="flex flex-col">
                    <label for="price" class="mb-1 text-gray-600">Product Price</label>
                    <input type="text" name="price" id="price" class="border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="flex flex-col">
                    <label for="detail" class="mb-1 text-gray-600">Product Details</label>
                    <textarea name="detail" id="detail" rows="3" class="border border-gray-300 rounded-md p-2" required></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="image" class="mb-1 text-gray-600">Product Image</label>
                    <input type="file" name="image" id="image" class="border border-gray-300 rounded-md p-2" required>
                </div>
                <button type="submit" name="add_product" class="w-full bg-black hover:bg-blue-600 text-white py-2 rounded-md transition">Add Product</button>
            </form>

            <!-- Link to Product List Page -->
            <div class="mt-6 text-center">
                <a href="\AJAR\public\AdminPL.php" class="text-blue-500 hover:underline">View Product List</a>
            </div>
        </div>
    </div>
</section>

</body>
</html>
