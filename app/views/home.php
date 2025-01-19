<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - AJAR</title>
    <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/AJAR/public/css/imgstyle.css">
    <link rel="stylesheet" href="/AJAR/public/css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-black text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="/AJAR/public/Home.php" class="text-2xl font-bold">AJAR</a>
            <nav class="space-x-6">
                <a href="/AJAR/public/Home.php" class="hover:underline">Home</a>
                <a href="/AJAR/public/index.php" class="hover:underline">Logout</a>
            </nav>
        </div>

<!--  
      <header class="custom-header">
    <div class="container mx-auto flex justify-between items-center px-6">
        <a href="/AJAR/public/Home.php" class="custom-logo">AJAR</a>
        <nav class="space-x-6">
            <a href="/AJAR/public/Home.php" class="custom-nav-link">Home</a>
            <a href="/AJAR/public/index.php" class="custom-nav-link">Logout</a>
        </nav>
    </div>
</header>   
-->


    </header>

    <section class="relative w-full overflow-hidden">
      <img src="/AJAR/public/Images/banner.jpg" alt="" class="w-full h-full object-cover">
    </section>


    <!-- Product Gallery -->
    <section id="products" class="py-10">
        <div class="container">
            <h2 class="text-3xl font-bold text-center p-4 m-8">Our Products</h2>
            <div class="product-gallery">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <div class="product-image-container">
                                <img src="/AJAR/public/uploads/<?php echo htmlspecialchars($product['image']); ?>" 
                                    alt="<?php echo htmlspecialchars($product['name']); ?>" 
                                    class="product-image">
                            </div>
                            <div class="product-details">
                                <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p class="product-price">LKR <?php echo htmlspecialchars($product['price']); ?></p>
                                <a href="/AJAR/public/ShowProduct.php?id=<?php echo $product['id']; ?>" class="product-link">View Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-gray-500">No products available.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 AJAR. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
