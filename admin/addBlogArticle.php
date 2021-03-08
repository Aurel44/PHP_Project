<?php include_once "../header.php" ?>


<?php

// Variables
$article_title = htmlspecialchars(@$_POST["article_title"]);
$article_text = htmlspecialchars(@$_POST["article_text"]);
$article_author = $_SESSION["user_name"]." ".$_SESSION["user_firstname"];
$article_category_id = @$_POST["article_category_id"];


// Add Products
if (@$_POST["add"]) {
    addBlogArticle($article_text, $article_author, $article_category_id);
    unset($_POST);
}

// Lists
$listArticleCat = listArticleCat();
$articleBlogById= articlebyId($article_category_id);

?>

<div class="container">
    <div class="row">

        <!-- Add product Form -->
        <div class="col-12 col-md-6">
            <div id="addBlogArticle">
                <h4>Add a Product</h4>
                <form action="" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="article_category_id">Article Category</label>
                            <select class="form-control" name="article_category_id" id="article_category_id" onChange="submit()" required>
                                <option value="" selected>Select a category</option>
                                <?php foreach ($listArticleCat as $row) { ?>
                                    <option value="<?= @$row["article_category_id"] ?>" <?php if (@$_POST["article_category_id"] == $row["article_category_id"]) {
                                                                                    echo "selected";
                                                                                } ?>>
                                        <?= $row["article_category_name"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Name your Product</label>
                            <input type="text" class="form-control-file" name="article_title" id="article_title" placeholder="Write the name."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Describe your Product</label>
                            <textarea class="form-control" id="article_text" name="article_text" rows="6" placeholder="Write here please."></textarea>
                        </div>
                        <button type="submit" name="add" value="add" class="btn">Submit</button>
                        <br><br>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>