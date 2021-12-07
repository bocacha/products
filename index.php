<?php include("db.php"); ?>

<?php include("includes/header.php"); ?>

<script>
function toggleFields() {
    var productType = document.getElementById('prod_type').value;
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
    document.getElementById('prod_type').addEventListener('change', toggleFields);
    
    // Run the toggle function when the DOM is ready loading,
    // so that fields that are not relevant to #prod_type's
    // initial value are hidden.
    toggleFields();
});

</script>


<div class="container p-4">
    <div class="row">
        <div class="col-md-3">

        <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            <?php  session_unset(); } ?>
        


            <div class="card card-body">
                <!--INPUT FORM
                it will contains the form to add new product to the database:
                Fields: SKU / NAME / PRICE / PROD_TYPE / DVD / BOOK / FUR_H / FUR_W / FUR_L -->
                <form action="save_product.php" method="POST">
                    <div class="form-group">
                    <div class="col">
                        <input type="text" name="sku" class="form-control" placeholder="Enter SKU Code">
                        <hr/>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
                    </div> 
                        <hr/>
                    <div class="col">
                        <input type="text" name="price" class="form-control" placeholder="Enter Price">
                        <hr/>
                        <!-- <label>Product Type</label> -->
                         <!--if the select(prod_type) option = DVD, then show the following fields:
                        Fields: DVD_SIZE
                        if the select(prod_type) option = BOOK, then show the following fields:
                        Fields: BOOK_WEIGHT
                        if the select(prod_type) option = FUR, then show the following fields:
                        Fields: FUR_H / FUR_W / FUR_L -->
                        <select id="prod_type" name="prod_type" class="form-control" >
                            <option value="">Select Product Type</option>
                            <option value="DVD">DVD</option>
                            <option value="BOOK">BOOK</option>
                            <option value="FUR">FURNITURE</option>
                        </select>
                    </div>
                        <hr/>
                        <input type="text" name="dvd_size" class="form-control" placeholder="Enter DVD Size" data-if-prod-type="DVD">
                        <hr/>
                        <input type="text" name="book_weight" class="form-control" placeholder="Enter Book Weight" data-if-prod-type="BOOK">
                        <hr/>
                        <div data-if-prod-type="FUR">
                        <input type="text" name="fur_h" class="form-control" placeholder="Enter Furniture Height">
                        <hr/>
                        <input type="text" name="fur_w" class="form-control" placeholder="Enter Furniture Width">
                        <hr/>
                        <input type="text" name="fur_l" class="form-control" placeholder="Enter Furniture Length">
                    </div>
                    <input type="submit" name="save_product" class="btn btn-success w-100" value="Save Product">
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>
    