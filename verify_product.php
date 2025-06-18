<?php
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password is blank for XAMPP
$dbname = "products"; // change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["product_id"];

    $productId = mysqli_real_escape_string($conn, $productId);
    $sql = "SELECT * FROM products WHERE id = '$productId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Product ID '$productId'is a Genuine Product.";
    } else {
        echo "Product ID '$productId' is a Fake Product.";
    }
}

$conn->close();
?>
