<?php include_once "header.php" ?>

<?php

// Variables
$user_id = @$_SESSION["user_id"];
$product_id = $_GET["id"];
$selectCartId = selectCartId($product_id, $user_id);

// Function Calls
if (@$_POST["add"]) {
    if (!$selectCartId) {
        setProdInCart($product_id, $user_id);
    } else {
        $product_quantity = $selectCartId["product_quantity"];
        $product_quantity++;
        updateProdInCart($product_quantity, $product_id, $user_id);
    }
}

if (@$_POST["comment"]) {
    $comment_text = htmlspecialchars(@$_POST["comment_text"]);
    addComment($comment_text, $user_id, $product_id);
}

// Lists
$descriProduct = prodById($product_id);
$listComments = listComment($product_id);


?>

<div class="container">

    <!-- Single Product -->
    <div class="row">

        <!-- Pic of Article and Buttons Add/Comment -->
        <div class="col-12 col-lg-6">
            <div class="img">
                <img src="img/upload/<?= $descriProduct["pic_name"] ?>" alt="" class="img-fluid img_article">
            </div>
            <form action="" method="POST">
                <div class="button_article">
                    <input type="submit" value="Add Product to Your Cart" name="add">
                    <?php if (@$_SESSION["user_role"] != 1) { ?>
                        <input type="button" value="Leave a comment" name="comment" data-toggle="modal" data-target="#leave_comment">
                        <div class="modal fade" id="leave_comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Advert !!! </h5>
                                    </div>
                                    <div class="modal-body">
                                        You have to be logged !!!!
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>

        <!-- Product Description And Caracts -->
        <div class="col-12 col-lg-6">
            <div class="container container_article">
                <div class="article_name">
                    <?= $descriProduct["product_name"] ?>
                </div>
                <br>
                <p class="article_text">
                    <?= $descriProduct["product_description"] ?>
                </p>
                <br>
                <div class="article_price">
                    Price : <?= number_format($descriProduct["product_price"], 2, ',', ' ') . " Euros" ?>
                </div>
                <br>
                <div class="article_stock">
                    In Stock : <?= "<em>" . $descriProduct["product_stock"] . " pdts</em>" ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Form for leaving Comments -->
    <?php if ((@$_SESSION["user_role"]) == 1) { ?>
        <div class="container">
            <form action="" method="POST">
                <h6>Let your comment here:</h6>
                <textarea name="comment_text" id="comment" cols="120" rows="5" placeholder="Write a comment"></textarea>
                <br>
                <input type="submit" value="Send your comment" name="addcomment">
            </form>
        </div>
    <?php } ?>
    <br><br>

    <!-- Last Comment Checkings -->
    <div class="article_color">Last Comments:</div>
    <?php foreach ($listComments as $row) { ?>
        <div class="jumbotron comments">
            <em><?= '"' . @$row["comment_text"] . '"' ?></em>
            <br>
            <div class="float-right article_color"><em><b>Written by <?= @$row["user_name"] ?></em></b></div>
        </div>
        <br>
    <?php } ?>
    <br>
</div>

<?php include_once "footer.php" ?>