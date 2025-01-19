<?php

class ProductModel {
    public static function addProduct($conn, $name, $price, $detail, $image) {
        $check_query = $conn->prepare("SELECT * FROM products WHERE name = ?");
        $check_query->bind_param("s", $name);
        $check_query->execute();
        $result = $check_query->get_result();

        if ($result->num_rows > 0) {
            return "Product name already exists.";
        }

        $insert_query = $conn->prepare("INSERT INTO products (name, price, product_detail, image) VALUES (?, ?, ?, ?)");
        $insert_query->bind_param("sdss", $name, $price, $detail, $image);

        return $insert_query->execute() ? "Product added successfully." : "Failed to add product.";
    }

    public static function getProducts($conn) {
        $query = "SELECT * FROM products";
        return $conn->query($query);
    }

    public static function deleteProduct($conn, $id) {
        $delete_query = $conn->prepare("DELETE FROM products WHERE id = ?");
        $delete_query->bind_param("i", $id);
        return $delete_query->execute();
    }

    public static function getProductById($conn, $id) {
        $query = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
    
        if ($result->num_rows === 0) {
            echo "Debug: No product found for ID = " . $id; // Debugging
            return null;
        }
    
        return $result->fetch_assoc();
    }
    
    public static function updateProduct($conn, $id, $name, $price, $detail, $image) {
        $query = $conn->prepare("UPDATE products SET name = ?, price = ?, product_detail = ?, image = ? WHERE id = ?");
        $query->bind_param("sdssi", $name, $price, $detail, $image, $id);
        return $query->execute();
    }

    public static function getPublicProducts($conn) {
        $query = "SELECT id, name, price, image FROM products";
        $result = $conn->query($query);
        if ($result) {
            $products = $result->fetch_all(MYSQLI_ASSOC);
            return $products;
        } else {
            echo "Error: " . $conn->error; // Show any SQL error
            return [];
        }
    }
    
    
}
