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
        
        <div class="alignButton" style="display:flex; justify-content:space-between">
            <a style="margin-left:30px;text-decoration:none;color:black;font-size:30px;" href="index.php">Product List</a>           
        </div>
        <hr/>
    </div>
        <script>
            function validateForm() {
                var x = document.forms["product_form"]["sku"].value;
                if (x == "") {
                    alert("Description must be filled out");
                    return false;
                }
                var x = document.forms["product_form"]["name"].value;
                if (x == "") {
                    echo("Name must be filled out");
                    return false;
                }
                var x = document.forms["product_form"]["price"].value;
                if (x == "") {
                    alert("Price must be filled out");
                    return false;
                }
            }
        </script>              
        <script>
            function toggleFields() {
                var productType = document.getElementById('productType').value;
                var fields = document.querySelectorAll('[data-if-prod-type]');
                
                fields.forEach(function (field) {
                    if (field.dataset.ifProdType === productType) {
                        field.style.display = '';
                    } else {
                        field.style.display = 'none';
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('productType').addEventListener('change', toggleFields);
                
                // Run the toggle function when the DOM is ready loading,
                // so that fields that are not relevant to #prod_type's
                // initial value are hidden.
                toggleFields();
            });

        </script>


<div class="container p-4">
    <div style="display:flex;justify-content:center;"class="row">
        <div class="col-md-3">
            <div class="card card-body">
                <!--INPUT FORM
                it will contains the form to add new product to the database:
                Fields: SKU / NAME / PRICE / PROD_TYPE / DVD / BOOK / FUR_H / FUR_W / FUR_L -->
                <form id="product_form" action="save_product.php" method="POST">
                    <div class="form-group">
                    <div class="col">
                        <input style="margin:10px;" id="sku" type="text" name="sku" class="form-control" placeholder="Enter SKU Code" required>
                       
                        <input style="margin:10px;" id="name" type="text" name="name" class="form-control" placeholder="Enter Product Name"required>
                    </div> 
                        
                    <div class="col">
                        <input style="margin:10px;" id="price" type="text" name="price" class="form-control" placeholder="Enter Price"required>
                                               
                         <!--if the select(prod_type) option = DVD, then show the following fields:
                        Fields: DVD_SIZE
                        if the select(prod_type) option = BOOK, then show the following fields:
                        Fields: BOOK_WEIGHT
                        if the select(prod_type) option = FUR, then show the following fields:
                        Fields: FUR_H / FUR_W / FUR_L -->
                        <select style="margin:10px;" id="productType" name="prod_type" class="form-control" >
                            <option value="">Select Product Type</option>
                            <option value="DVD">DVD</option>
                            <option value="BOOK">Book</option>
                            <option value="FUR">Furniture</option>
                        </select>
                    </div>
                        
                        <input style="margin:10px;" id="size" type="text" name="dvd_size" class="form-control" placeholder="Enter DVD Size" data-if-prod-type="DVD">
                        
                        <input style="margin:10px;" id="weight"type="text" name="book_weight" class="form-control" placeholder="Enter Book Weight" data-if-prod-type="BOOK">
                        
                        <div data-if-prod-type="FUR">
                        <input style="margin:10px;" id="height" type="text" name="fur_h" class="form-control" placeholder="Enter Furniture Height">
                        
                        <input style="margin:10px;" id="width"type="text" name="fur_w" class="form-control" placeholder="Enter Furniture Width">
                        
                        <input style="margin:10px;" id="length"type="text" name="fur_l" class="form-control" placeholder="Enter Furniture Length">
                    </div>
                    <div style="display:flex;justify-content:space-around;"class="buttonContainer">
                        <input type="submit" name="save_product" class="btn btn-success " value="Save ">
                        <input type="button" name="cancel" class="btn btn-danger " value="Cancel" onclick="window.location.href='index.php'" >                        
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!--- Bootstrap JS --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html> 
    