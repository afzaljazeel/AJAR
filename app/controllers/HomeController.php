<?php
require_once 'C:\\xampp\\htdocs\\AJAR\\app\\models\\ProductModel.php';

class HomeController {
    public static function showHome($conn) {
        $products = ProductModel::getPublicProducts($conn);
        include_once 'C:\\xampp\\htdocs\\AJAR\\app\\views\\home.php';
    }
}