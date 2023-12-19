<?php 
    include('config/db_connect.php'); 
    //include('config/customers.php');
    
    if(!$conn){  
      die('Could not connect: '.mysqli_connect_error());  
    }  
    echo 'Connected successfully<br/>';  

    if(isset($_GET['submit'])){
      // Get the form data and sanitize using mysqli_real_escape_string
      $email = mysqli_real_escape_string($conn, $_GET['email']);
      echo $email;
      $location = mysqli_real_escape_string($conn, $_GET['location']);
      echo $location;
    

      
      $sql = "INSERT INTO customers(customer_id,email,location) VALUES (NULL, '$email', '$location')";  
        if(mysqli_query($conn, $sql)){  
        echo "Record inserted successfully";  
        }else{  
        echo "Could not insert record: ". mysqli_error($conn);  
      }  
    }
    mysqli_close($conn);  
?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<section class="signup">
    <h2>Sign Up</h2>
    <form class="signup-form" action="signin.php" method="GET">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email">

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" placeholder="Enter your Location">

      <input type="submit" name="submit" value="submit" class="submit-button">
    </form>
  </section>

<!--
<div>
<?php include('config/customers.php'); ?>
  <h2> Current Customers </h2>
  
  <?php foreach($customers as $customer) { ?>
        <h2>   <?php echo $customer['customer_id'] ?>  </h2>  
        <h2>   <?php echo $customer['email'] ?>  </h2>  
        <h2>   <?php echo $customer['location'] ?>  </h2>  
    <?php }?>
  </div>
  -->
<?php include('footer.php'); ?>
</html>