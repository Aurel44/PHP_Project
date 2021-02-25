<?php include_once "admin/pdo.php" ?>
<?php include_once "admin/function.php" ?>

<?php

// Variables
$user_id = @$_SESSION["user_id"];

//Function
@$sumProdInCart = sumProdInCart($user_id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Project_1</title>
</head>

<body>

  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="shop.php"><i class="fas fa-store"></i> Shop<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="contact.php"><i class="fas fa-id-card"></i> Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if (@$_SESSION["user_name"]) { ?>
          <li class="nav-item active">
            <div class="nav-link">
              Your cart
            </div>
          </li>
          <li class="nav-item active">
            <div class="nav-link">
              <h4><a href="cart.php"><i class="fab fa-shopify"></i></a></h4>
            </div>
          </li>
          <li class="nav-item active">
            <div class="nav-link">
              Bonjour <?= @$_SESSION["user_name"] ?> <?= @$_SESSION["user_firstname"] ?>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
          </li>
        <?php } else { ?>
          <li class="nav-item active">
            <a class="nav-link" href="logandsign.php"><i class="fas fa-sign-in-alt"></i> Sign In/Log In</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>

  <!-- Admin Nav Bar -->
  <?php if (@$_SESSION["user_role"] == 5) { ?>
    <div class="row item_display">
      <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
              <a class="nav-link" href="admin/addproduct.php"><i class="fas fa-plus-circle"></i> Add a product or Pics</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="admin/moddelete.php"><i class="fas fa-plus-circle"></i> Modify Or Delete Products</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="admin/moderate.php"><i class="fas fa-check-circle"></i> Check Comments</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  <?php } ?>