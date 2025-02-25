<!-- wishlist.php -->
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Connect to the database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add product to wishlist
if (isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    
    $sql = "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Product added to wishlist successfully.";
    } else {
        echo "Error adding product to wishlist: " . $conn->error;
    }
}

// Remove product from wishlist
if (isset($_GET['remove_id'])) {
    $user_id = $_SESSION['user_id'];
    $remove_id = $_GET['remove_id'];
    
    $sql = "DELETE FROM wishlist WHERE user_id='$user_id' AND product_id='$remove_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Product removed from wishlist successfully.";
    } else {
        echo "Error removing product from wishlist: " . $conn->error;
    }
}

// Retrieve wishlist items for the logged-in user
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM wishlist WHERE user_id='$user_id'";
$result = $conn->query($sql);
$wishlist_items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $wishlist_items[] = $row['product_id'];
    }
}
?>