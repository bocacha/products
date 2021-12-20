<?php include("db.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCANDINAVIAN ASSESMENT</title>
    <!--- Bootstrap CSS --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <div class="header"style="margin-top:50px;">  
    
    <form action="delete_product.php" method="post"> 
        
        <div class="alignButton" style="display:flex; justify-content:space-between">
            <a style="margin-left:30px;text-decoration:none;color:black;font-size:30px;" href="index.php">Product List</a>
           
            <div  class="alignButtons"style="display:flex; justify-content:flex-end">
                <button  style="margin-right:50px;" id="add" class="btn btn-primary" 
                type="button"  name="add" onclick="window.location.href='add-product.php'"> ADD </button>  
                
                <button   style="margin-right:50px;" id="delete-product-btn" type="submit" 
                name="mass_delete" class="btn btn-danger">MASS DELETE</button>   
            
            </div>
           
        </div>
        <hr/>
    </div>

    <div  class="py-5">
        <div class="container">
            <div class="row hidden-md-up">
             <!--Get all products from DB-->
            <?php
                $query = "SELECT * FROM products";
                $result_products = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result_products)) { ?> 
                
                <!-- <?php 
                    if(isset($_SESSION['status'])){
                        echo "<h4>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    }
                ?>   -->
                <div class="col-sm-4">
              
                    <div class="card" style="margin:10px;padding:10px;width:250px;">
                        <input class="delete-checkbox" type="checkbox" name="check_list[]" value="<?php echo $row['id']; ?>">
                        
                        <label><?php echo $row['sku']; ?> : <?php echo $row['prod_type']; ?></label>
                        <h5><?php echo $row['name']; ?></h5>
                        <p>$<?php echo $row['price']; ?></p>
                        <!--Conditional rendering depending on product type-->
                        <?php if ($row['prod_type'] == 'DVD'): ?>
                        <p>Size: <?php echo $row['dvd']; ?>MB</p>

                        <?php elseif ($row['prod_type'] == 'BOOK'): ?>
                        <p>Weight: <?php echo $row['book']; ?> Kgs.</p>

                        <?php elseif ($row['prod_type'] == 'FUR'): ?>
                        <p> H:<?php echo $row['fur_h']; ?>x W:<?php echo $row['fur_h']; ?>x L:<?php echo $row['fur_l']; ?></p>  

                        <?php endif ?>

                    </div>
                </div>    
            <?php } ?>        
            </div>        
        </div>
    </div>
</form>
</div>

      




<!--- Bootstrap JS --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html> 
    