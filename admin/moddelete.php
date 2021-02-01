<?php include_once "../header.php" ?>

<?php
// Variables
$product_name = htmlspecialchars(@$_POST["product_name"]);
$product_description = htmlspecialchars(@$_POST["product_description"]);
$product_price = htmlspecialchars(@$_POST["product_price"]);
$product_stock = htmlspecialchars(@$_POST["product_stock"]);
$category_id = @$_POST["category_id"];
$product_id = @$_POST["product_id"];

// Modify Products
if (@$_POST["modify"]) {
    updateProduct($product_name, $product_description, $product_price, $product_stock, $product_id);
    unset($_POST);
}
// Delete Products
if (@$_POST["delete"]) {
    deleteProduct($product_id);
    unset($_POST);
}
// Lists

$listCat = listCat();
$listArt = listArt();
$listArtByIdCat = artbyId($category_id);
$prodById = prodById($product_id);

?>


<div class="container container_addproduct">

    <!-- List of instructions -->
    <div class="row">

        <!-- Modify product Form -->
        <div class="col-12 col-md-6">
            <div id="modify">
                <form action="" method="POST">
                    <fieldset>
                    <h4>Modify a Product</h4>
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
                        </div>
                    </fieldset>
                </form>

                <form action="" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="product_name">Name your Product</label>
                            <input type="text" class="form-control-file" name="product_name" id="product_name" placeholder="Write the name." value="<?= @$prodById["product_name"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="product_description">Describe your Product</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="6" placeholder="Write here please."><?= @$prodById["product_description"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Change the Price</label>
                            <input type="text" class="form-control-file" name="product_price" id="product_price" placeholder="Your Price" value="<?= number_format(@$prodById["product_price"], 2, ',', ' ') ?>">
                        </div>
                        <div class="form-group">
                            <label for="stock">Change the quantity in your stock</label>
                            <input type="text" class="form-control-file" name="product_stock" id="product_stock" placeholder="Add the stock" value="<?= @$prodById["product_stock"] ?>">
                        </div>
                        <form action="" method="POST">
                            <button type="submit" name="modify" value="modify" class="btn">Modify</button>
                            <br><br>
                    </fieldset>
                </form>
            </div>
        </div>

        <!-- Delete product Form -->
        <div class="col-12 col-md-6">
            <div id="delete">
                <form action="" method="POST">
                    <fieldset>
                    <h4>Delete a Product</h4>
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
                        </div>
                        <button type="submit" name="delete" value="delete" class="btn">Delete</button>
                        <br><br>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>