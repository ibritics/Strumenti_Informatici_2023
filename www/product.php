<?php
// Replace with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the product ID from URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM portfolio WHERE ID = $productId"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productName = $row["NAME"];
        $description = $row["DESCRIPTION"];
        $price = $row["PRICE"];
        $imageUrl = $row["URL"];
    } else {
        echo "Product not found";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $productName; ?> Detail</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <div class="logo">
          <img src="path/to/your/logo.png" alt="Logo">
        </div>
        
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Products</a></li>
          </ul>
        </nav>
    </header>


    <div class="product-detail">
    <div class="product-image">
        <img src="<?php echo $imageUrl; ?>" alt="<?php echo $productName; ?>">
    </div>
    <div class="product-details">
        <div class="product-title">
            <h2><?php echo $productName; ?></h2>
            <p>Description: <br> <?php echo $description; ?></p>
        </div>
        <div class="product-actions">
            <div class="product-price">
                <p>Price: $<?php echo $price; ?></p>
            </div>
            <div class="product-button">
                <button>Add to Cart</button>
            </div>
    </div>
    </div>
    </div>

</body>
</html>
