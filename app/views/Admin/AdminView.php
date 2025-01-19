<?php
include_once 'C:\\xampp\\htdocs\\AJAR\\app\\controllers\\AuthController.php';
class AdminView {
    public function displayAdminPanel() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Panel</title>
            <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        </head>
        <body class="bg-gray-100 text-gray-900 font-sans">

            <!-- Header -->
            <?php include 'admin_header.php'; ?>

            <!-- Dashboard Container -->
            <div class=" flex justify-center items-center ">
                <section class="bg-white w-full max-w-3xl rounded-lg shadow-lg p-8">


                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                        <!-- Manage Products -->
                        <a href="admin_product_panel.php#product-gallery" class="w-full flex flex-col items-center justify-center border border-gray-300 rounded-md shadow-lg hover:bg-gray-200 transition duration-300 p-6">
                            <div class="w-24 h-24 mb-4 flex items-center justify-center border border-gray-300 rounded-full shadow-sm bg-gray-50">
                                <i class="fas fa-cogs text-3xl text-gray-600"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-700">Manage Products</span>
                        </a>
 

                    </div>
                </section>
            </div>

        </body>
        </html>
        <?php
    }
}
?>
