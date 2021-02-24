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
    header('Location:cart.php');
  }
}
if (@$_POST["plus"]) {
  $product_quantity = $selectCartId["product_quantity"];
  $product_quantity++;
  updateProdInCart($product_quantity, $product_id, $user_id);
  header('Location:cart.php');
}

if (@$_POST["delete"]) {
  deleteProdInCart($product_id, $user_id);
}

// Lists
$listProdInCart = listProdInCart($user_id);

$total = total($listProdInCart, $total);

/* Les variables suivantes doivent être personnalisées selon vos besoins */
$email_paypal = 'sb-ds1qi5193909@business.example.com';/*email associé au compte paypal du vendeur*/
// $item_numero = '04AAA'; /*Numéro du produit en vente*/
// $item_prix   = '40';    /*prix du produit*/
$item_nom    = $_SESSION["user_name"]." ".$_SESSION["user_firstname"]; /*Nom du produit*/
$url_retour = 'http://localhost/project1/admin/paypal-remerciement.php?id=';/*page de remerciement à créer*/
$url_cancel = 'http://localhost/project1/admin/paypal-annulation.php?id='; /*page d'annulation d'achat*/
$url_confirmation = 'http://localhost/project1/admin/paypal-confirmation.php?id=';/*page de confirmation d'achat*/
/* fin déclaration des variables */

?>

<div class="container container_cart">
  <div class="row">
    <div class="col-10">
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
                <button class="minus-btn1" type="submit" name="minus" value="minus">
                  <i class="fas fa-minus-square"></i>
                </button>
                <input type="text" name="name" value="<?= $row["product_quantity"] ?>">
                <button class="plus-btn1" type="submit" name="plus" value="plus">
                  <i class="fas fa-plus-square"></i>
                </button>
              </div>
              <div class="total-price"><?= number_format($row["product_quantity"] * $getImgById["product_price"], 2, ',', ' ') ?> Euros</div>
            </div>
          </form>
        <?php } ?>
      </div>
    </div>
    <div class="col-2">
      <h2>Checkout :</h2>
      <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank"> -->
      <form action="https://sandbox.paypal.com" method="POST" target="_blank">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="<?php echo $email_paypal ?>" />
        <input type="hidden" name="item_name" value="<?php echo $item_nom ?>" />
        <input type="hidden" name="item_number" value="<?php echo $user_id ?>" />
        <input type="hidden" name="amount" value="<?php echo $total ?>" />
        <input type="hidden" name="currency_code" value="EUR" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="no_shipping" value="0" />
        <input type="hidden" name="lc" value="FR" />
        <input type="hidden" name="notify_url" value="<?php echo $url_confirmation.$user_id ?>" />
        <input type="hidden" name="cancel_return" value="<?php echo $url_cancel.$user_id ?>" />
        <input type="hidden" name="return" value="<?php echo $url_retour.$user_id ?>" />
        <input align="right" valign="center" type="image" alt="Paiement par Paypal" src=" https://www.paypal.com/fr_FR/i/bnr/horizontal_solution_PP.gif" border="0" name="submit" alt="Paiement sécurisé par paypal" />
      </form>
    </div>
  </div>
</div>

<?php include_once "footer.php" ?>