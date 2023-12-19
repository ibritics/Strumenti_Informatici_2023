<?php 
include('config/db_connect.php');  //Connection to the db taken from another module
$sql = 'SELECT ID, TITLE, DESCRIPTION , IMAGE FROM products';
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
//echo $products; //stampare
//print_r($products)
?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<!--  <div class="bottom_section">
    <div class = "filter">
        <ul>
            <li><a href="POWERBI">PowerBI</a></li>
            <li><a href="PYTHON">Python</a></li>
            <p></p>
        </ul>
    </div> -->
  
    <div class="projects">
    <?php foreach($products as $product) { ?>
        <div class="col">
            <div class="final">
                <h3><?php echo $product['TITLE']; ?></h3>
                <a href="detail.php?id=<?php echo $product['ID']; ?>">
                    <img src="images/<?php echo $product['IMAGE']; ?>" alt="Image" class="product-image">
                </a>
                <p class='description'><?php echo $product['DESCRIPTION']; ?>  </p>
                <a class="more-info" href="detail.php?id=<?php echo $product['ID']?>" > more info </a>
            </div>
        </div>
    <?php } ?>
    </div>
   <!--   <h2> <?php echo $product['TITLE']; ?> </h2> -->
   <?php include('footer.php'); ?> 
</html>