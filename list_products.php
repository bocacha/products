<?php include("db.php"); ?>

<?php include("includes/header.php"); ?>
<!-- <?php session_start(); ?> -->
<div  class="py-5">
    <form action="delete_product.php" method="post">
        <div class="alignButton" style="display:flex; justify-content:center">
            <button  id="delete-product-btn" type="submit" name="mass_delete" class="btn btn-danger">MASS DELETE</button>
        </div>
        <div class="container">
            <div class="row hidden-md-up">
             <!--Get all products from DB-->
            <?php
                $query = "SELECT * FROM products";
                $result_products = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result_products)) { ?> 
                
                <?php 
                    if(isset($_SESSION['status'])){
                        echo "<h4>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    }
                ?>  
                <div class="col-sm-4">
                    <div class="card" style="margin:10px;padding:10px;width:250px;">

                        <!-- <a href="delete_product.php?id=<?php echo $row['id']; ?>">
                            <div class="form-check">                            
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Delete</label>
                            </div>
                        </a> -->
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

<?php include("includes/footer.php"); ?>

