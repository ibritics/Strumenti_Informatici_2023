<?php
include('config/db_connect.php');

//isset se e' in funzione, corretto
//$_GET

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    echo $id;

    $sql= "SELECT * FROM products WHERE ID=$id ";

    $result = mysqli_query($conn,$sql);

    $product = mysqli_fetch_assoc($result);

    mysqli_close($conn);
    //print_r($product);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Info</title>
</head>
<body>
        <h3><?php echo $product['TITLE']; ?></h3>
        
            <img src="images/<?php echo $product['IMAGE']; ?>" alt="Image" class="product-image">
        </a>
        <p class='description'><?php echo $product['DESCRIPTION']; ?>  </p>
        
</body>
</html>