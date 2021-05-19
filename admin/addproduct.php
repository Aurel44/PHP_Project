<?php include_once "header_admin.php" ?>

<?php

// Variables
$product_name = htmlspecialchars(@$_POST["product_name"]);
$product_description = htmlspecialchars(@$_POST["product_description"]);
$product_price = htmlspecialchars(@$_POST["product_price"]);
$product_stock = htmlspecialchars(@$_POST["product_stock"]);
$category_id = @$_POST["category_id"];
$product_id = @$_POST["product_id"];


// Add Products
if (@$_POST["add"]) {
    addProduct($product_name, $product_description, $product_price, $product_stock, $category_id);
    unset($_POST);
}
// Add Pics to Products
if (@$_FILES["file"]) {
    upload($product_id);
}

// Lists
$listCat = listCat();
$listArtByIdCat = artbyId($category_id);

?>



<div class="container container_addproduct">

    <!-- List of instructions -->
    <div class="row">

        <!-- Add product Form -->
        <div class="col-12 col-md-6">
            <div id="addproduct">
            <h4>Add a Product</h4>
                <form action="" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id" onChange="submit()" required>
                                <option value="" selected>Select a category</option>
                                <?php foreach ($listCat as $row) { ?>
                                    <option value="<?= @$row["category_id"] ?>" <?php if (@$_POST["category_id"] == $row["category_id"]) {
                                                                                    echo "selected";
                                                                                } ?>>
                                        <?= $row["category_name"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Name your Product</label>
                            <input type="text" class="form-control-file" name="product_name" id="product_name" placeholder="Write the name."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Describe your Product</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="6" placeholder="Write here please."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Add the Price</label>
                            <input type="text" class="form-control-file" name="product_price" id="product_price" placeholder="Your Price">
                        </div>
                        <div class="form-group">
                            <label for="stock">Add the quantity in your stock</label>
                            <input type="text" class="form-control-file" name="product_stock" id="product_stoc" placeholder="Add the stock">
                        </div>
                        <button type="submit" name="add" value="add" class="btn">Submit</button>
                        <br><br>
                    </fieldset>
                </form>
            </div>
        </div>

        <!-- Add Pics to a product -->
        <div class="col-12 col-md-6">
            <div id="addpics">
            <h4>Add Pics to a Product</h4>
                <form enctype="multipart/form-data" action="" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id" onChange="submit()" required>
                                <option value="" selected>Select a category</option>
                                <?php foreach ($listCat as $row) { ?>
                                    <option value="<?= @$row["category_id"] ?>" <?php if (@$_POST["category_id"] == $row["category_id"]) {
                                                                                    echo "selected";
                                                                                } ?>>
                                        <?= $row["category_name"] ?>
                                    </option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select class="form-control" name="product_id" id="product_id" onChange="submit()" required>
                                <option value="" selected>Select a product</option>
                                <?php foreach ($listArtByIdCat as $row) { ?>
                                    <option value="<?= @$row["product_id"] ?>" <?php if (@$_POST["product_id"] == $row["product_id"]) {
                                                                                    echo "selected";
                                                                                } ?>>
                                        <?= $row["product_name"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <label class="article_color">Upload your file</label>
                            <br>
                            <input type="file" name="file[]" multiple></input>
                            <br><br>
                            <button type="submit" name="addpics" value="addpics" class="btn">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    
</div>



<?php include_once "../footer.php" ?>