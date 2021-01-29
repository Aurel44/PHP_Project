<?php include_once "header.php" ?>

<?php

// Variables
$user_id = @$_SESSION["user_id"];
$product_id = @$_POST["product_id"];
$selectCartId = selectCartId($product_id, $user_id);
$total = '0';

// Function Calls
if (@$_POST["minus"]) {
    $product_quantity = $selectCartId["product_quantity"];
    $product_quantity--;
    if ($product_quantity == 0) {
        deleteProdInCart($product_id, $user_id);
    } else {
        updateProdInCart($product_quantity, $product_id, $user_id);
    }
}
if (@$_POST["plus"]) {
    $product_quantity = $selectCartId["product_quantity"];
    $product_quantity++;
    updateProdInCart($product_quantity, $product_id, $user_id);
}

if (@$_POST["delete"]) {
    deleteProdInCart($product_id, $user_id);
}

// Lists
$listProdInCart = listProdInCart($user_id);

$total = total($listProdInCart, $total);
// var_dump($total);
// die();

?>

<div class="container container_cart">
    <div class="row">
        <div class="col-12">
            <div class="shopping-cart">
                <!-- Title -->
                <div class="title">
                    <div class="shopping_cart">
                        Shopping Cart
                    </div>
                    <div class="total_price">
                        Total :
                    </div>
                    <div class="total">
                        <?= number_format($total, 2, ',', ' ') ?> Euros
                    </div>
                </div>

                <!-- Item of Products in Cart -->
                <?php foreach ($listProdInCart as $row) { ?>
                    <form action="" method="POST">
                        <?php $getImgById = getImgById($row["product_id"]) ?>
                        <input type="hidden" name="product_id" value="<?= $row["product_id"] ?>">
                        <div class="item">
                            <div class="quantity">
                                <button class="delete-btn" type="submit" name="delete" value="delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                            <div class="image">
                                <img src="img/upload/<?= $getImgById["pic_name"] ?>" alt="" class="cart_img">
                            </div>

                            <div class="description"><?= $getImgById["product_name"] ?></span>
                            </div>

                            <div class="quantity">
                                <button class="minus-btn" type="submit" name="minus" value="minus">
                                    <i class="fas fa-minus-square"></i>
                                </button>
                                <input type="text" name="name" value="<?= $row["product_quantity"] ?>">
                                <button class="plus-btn" type="submit" name="plus" value="plus">
                                    <i class="fas fa-plus-square"></i>
                                </button>
                            </div>
                            <div class="total-price"><?= number_format($row["product_quantity"] * $getImgById["product_price"], 2, ',', ' ') ?> Euros</div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php" ?>