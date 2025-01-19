<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Header</title>
    <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <?php


    // Fallback values for session variables
    $admin_name = $_SESSION['admin_name'] ?? 'Guest';
    $admin_email = $_SESSION['admin_email'] ?? 'Not Available';
    ?>

    <!-- Header -->
    <header class="bg-blue text-black fixed top-0 left-0 w-full shadow-lg z-10">
        <div class="flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <a href="admin_panel.php" class="text-2xl font-bold">Admin Panel</a>

            <!-- Navbar -->
            <nav class="hidden md:flex space-x-6 justify-center">
                <a href="admin_panel.php" class="hover:text-gray-300">Home</a>
                <a href="admin_product_panel.php" class="hover:text-gray-300">Products</a>
            </nav>

            <!-- Icons with User Box -->
            <div class="relative">
                <!-- Hidden Checkbox -->
                <input type="checkbox" id="user-box-toggle" class="peer hidden">

                <!-- User Icon -->
                <label for="user-box-toggle" class="cursor-pointer">
                    <i class="fa-solid fa-user"></i>
                </label>

                <!-- User Box -->
                <div
                    class="hidden peer-checked:flex flex-col absolute right-0 mt-2 w-64 bg-white text-black rounded-lg shadow-lg p-4">
                    <p class="mb-2">
                        <span class="font-bold">Username:</span>
                        <span><?php echo htmlspecialchars($admin_name); ?></span>
                    </p>
                    <p class="mb-4">
                        <span class="font-bold">Email:</span>
                        <span><?php echo htmlspecialchars($admin_email); ?></span>
                    </p>
                    <!-- User Box with Logout -->
                    <form method="post" action="index.php?action=logout">
                        <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="pt-20">

    </div>
</body>

</html>
