<?php
include_once 'C:\\xampp\\htdocs\\AJAR\\app\\controllers\\AuthController.php';
function renderProductList($products) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product List</title>
        <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
        <style>
            /* Container styling for each product row */
            .product-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 1rem;
                background-color: #ffffff;
                border-radius: 0.5rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-bottom: 1rem;
            }

            /* Image container */
            .product-image {
                width: 80px;
                height: 80px;
                object-fit: cover;
                border-radius: 0.5rem;
                flex-shrink: 0; /* Prevents shrinking */
            }

            /* Text content in the center */
            .product-details {
                flex: 1; /* Takes up available space */
                margin: 0 1rem; /* Adds spacing around the text */
            }

            /* Buttons container */
            .product-actions {
                display: flex;
                gap: 0.5rem;
            }

            /* Button styling */
            .action-button {
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                color: #ffffff;
                text-align: center;
                text-decoration: none;
            }

            .edit-button {
                background-color: #3b82f6;
            }

            .edit-button:hover {
                background-color: #2563eb;
            }

            .delete-button {
                background-color: #ef4444;
            }

            .delete-button:hover {
                background-color: #dc2626;
            }

            .view-button {
                background-color: #f59e0b;
            }

            .view-button:hover {
                background-color: #d97706;
            }
        </style>
    </head>
    <body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <?php include 'admin_header.php'; ?>

    <section class="my-16 px-4">
        <h2 class="text-2xl font-bold text-gray-700 text-center my-6">Product List</h2>

        <div>
            <?php if ($products && mysqli_num_rows($products) > 0) { ?>
                <?php while ($product = mysqli_fetch_assoc($products)) { ?>
                    <div class="product-row">
                        <!-- Image -->
                        <img src="uploads/<?php echo $product['image']; ?>" alt="Product Image" class="product-image">

                        <!-- Product Details -->
                        <div class="product-details">
                            <h3 class="text-lg font-semibold truncate"><?php echo $product['name']; ?></h3>
                            <p class="text-gray-600 truncate">LKR <?php echo $product['price']; ?></p>
                            <p class="text-gray-500 text-sm truncate"><?php echo $product['product_detail']; ?></p>
                        </div>

                        <!-- Actio  n Buttons -->
                        <div class="product-actions">
                            <a href="\AJAR\public\AdminEditProduct.php?id=<?php echo $product['id']; ?>" class="action-button edit-button">Edit</a>
                            <a href="AdminPL.php?delete=<?php echo $product['id']; ?>" class="action-button delete-button">Delete</a>
                            <a href="\AJAR\public\ShowProduct.php?id=<?php echo $product['id']; ?>" class="action-button view-button">View</a>

                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="text-center text-gray-500">No products available.</p>
            <?php } ?>
        </div>
    </section>

    </body>
    </html>
    <?php
}
?>
