<?php

class RegisterView {
    public function displayForm($messages) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Register Page</title>
            <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        </head>
        <body class="bg-gray-100 text-gray-800">

        <!-- Registration Form Container -->
        <div class="min-h-screen flex justify-center items-center px-4">
            <section class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
                <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Register Now</h2>

                <!-- Display response messages -->
                <?php if (isset($messages)) {
                    foreach ($messages as $msg) {
                        echo "<p class='text-red-500 text-center mb-4'>$msg</p>";
                    }
                } ?>

                <!-- Registration Form -->
                <form method="POST" action="" class="space-y-4">
                    <div class="flex flex-col">
                        <label for="name" class="mb-1 text-gray-600">Full Name</label>
                        <input type="text" name="name" id="name" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500" required placeholder="Enter your name">
                    </div>
                    <div class="flex flex-col">
                        <label for="email" class="mb-1 text-gray-600">Email</label>
                        <input type="email" name="email" id="email" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500" required placeholder="Enter your email">
                    </div>
                    <div class="flex flex-col">
                        <label for="password" class="mb-1 text-gray-600">Password</label>
                        <input type="password" name="password" id="password" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500" required placeholder="Enter your password">
                    </div>
                    <div class="flex flex-col">
                        <label for="cpassword" class="mb-1 text-gray-600">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500" required placeholder="Confirm your password">
                    </div>
                    <div class="flex flex-col">
                        <input type="submit" name="submit-btn" value="Register" class="w-full bg-black text-white py-2 rounded-md hover:bg-blue-600 transition cursor-pointer">
                    </div>
                </form>

                <p class="mt-4 text-center text-sm text-gray-600">Already have an account? <a href="/AJAR/public/index.php" class="text-blue-500 hover:underline">Log In</a></p>
            </section>
        </div>

        </body>
        </html>
        <?php
    }
}
?>
