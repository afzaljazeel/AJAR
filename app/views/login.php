<?php 
class LoginView {
    public function displayLoginForm($messages) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Page</title>
            <link rel="stylesheet" href="/AJAR/public/css/tailwind.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        </head>
        <body class="bg-gray-100 text-gray-800">



        <!-- Login Form Container -->
        <div class="min-h-screen flex justify-center items-center px-4">
            <section class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
                <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Log In</h2>

                <!-- Display response messages -->
                <?php if (isset($messages)) { 
                    foreach ($messages as $msg) {
                        echo "<p class='text-red-500 text-center mb-4'>$msg</p>";
                    }
                } ?>

                <!-- Login Form -->
                <form method="POST" action="" class="space-y-4">
                    <div class="flex flex-col">
                        <label for="email" class="mb-1 text-gray-600">Email</label>
                        <input type="email" name="email" id="email" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500" required placeholder="Enter your email">
                    </div>
                    <div class="flex flex-col">
                        <label for="password" class="mb-1 text-gray-600">Password</label>
                        <input type="password" name="password" id="password" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500" required placeholder="Enter your password">
                    </div>
                    <div class="flex flex-col">
                        <input type="submit" name="submit-btn" value="Log In" class="w-full bg-black text-white py-2 rounded-md hover:bg-blue-600 transition cursor-pointer">
                    </div>
                </form>

                <p class="mt-4 text-center text-sm text-gray-600">Don't have an account? <a href="/AJAR/public/register.php" class="text-blue-500 hover:underline">Register Now</a></p>
            </section>
        </div>

        </body>
        </html>
        <?php
    }
}
?>
