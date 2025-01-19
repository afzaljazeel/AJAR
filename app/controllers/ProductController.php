<?php
require_once 'C:\\xampp\\htdocs\\AJAR\\app\\models\\ProductModel.php';

class ProductController {

    public static function handleProductForm($conn) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $detail = mysqli_real_escape_string($conn, $_POST['detail']);
            $image = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];

            // Upload directory
            $upload_dir = realpath(__DIR__ . '/../../public/uploads');
            $image_folder = $upload_dir . DIRECTORY_SEPARATOR . $image;

            // Ensure the upload directory exists
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Add product via model
            $response = ProductModel::addProduct($conn, $name, $price, $detail, $image);

            // Handle image upload
            if ($response === "Product added successfully.") {
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                    return $response;
                } else {
                    return "Failed to upload image. Check folder permissions.";
                }
            } else {
                return $response;
            }
        }
        return null;
    }

    public static function getAllProducts($conn) {
        return ProductModel::getProducts($conn);
    }

    public static function deleteProduct($conn, $id) {
        return ProductModel::deleteProduct($conn, $id);
    }

    public static function getProductById($conn, $id) {
        return ProductModel::getProductById($conn, $id);
    }

    public static function updateProduct($conn, $id, $name, $price, $detail, $image) {
        return ProductModel::updateProduct($conn, $id, $name, $price, $detail, $image);
    }

    public static function showProduct($conn, $id) {
        $product = self::getProductById($conn, $id);
        if ($product) {
            require 'C:\\xampp\\htdocs\\AJAR\\app\\views\\view_product.php';
        } else {
            echo "<p class='text-center text-red-500'>Product not found.</p>";
        }
    }

    public static function getProductForEditing($conn, $id) {
        // Fetch the product details by ID for editing
        return ProductModel::getProductById($conn, $id);
    }

    public static function handleUpdateProduct($conn, $id, $name, $price, $detail, $image, $image_tmp_name, $original_image) {
        // Handle image upload logic
        if ($image) {
            // Define the upload directory
            $upload_dir = realpath(__DIR__ . '/../../public/uploads'); // Ensure the path to the uploads folder is correct
            $image_folder = $upload_dir . DIRECTORY_SEPARATOR . $image;

            // Check for upload errors
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                // Validate the uploaded file extension
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                $file_extension = pathinfo($image, PATHINFO_EXTENSION);

                if (in_array(strtolower($file_extension), $allowed_extensions)) {
                    // Attempt to move the uploaded file
                    if (!move_uploaded_file($image_tmp_name, $image_folder)) {
                        return "Failed to upload the image. Check folder permissions.";
                    }
                } else {
                    return "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
                }
            } else {
                return "Error during file upload. Error code: {$_FILES['image']['error']}";
            }
        } else {
            // Retain the original image if no new one is uploaded
            $image = $original_image;
        }

        // Call the model to update the product details
        return ProductModel::updateProduct($conn, $id, $name, $price, $detail, $image);
}
}
