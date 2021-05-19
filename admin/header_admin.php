<?php include_once "pdo.php" ?>
<?php include_once "function.php" ?>

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
    <meta name="description" content="La presse de la région Ligérienne et Angevine à portée de main avec nos actualités, nos produits. Un accès sécurisé pour chacun de nos clients.">
    <link rel="canonical">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>La Presse Ligérienne et Angevine à côté de vous .</title>
</head>

<body>


    <!-- Admin Nav Bar -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <a class="navbar-brand" href="../index.php"><i class="fas fa-home"></i> Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="addproduct.php"><i class="fas fa-plus-circle"></i> Add a product or Pics</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="moddelete.php"><i class="fas fa-plus-circle"></i> Modify Or Delete Products</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="moderate.php"><i class="fas fa-check-circle"></i> Check Comments</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addBlogArticle.php"><i class="fas fa-check-circle"></i> Add Blog Article</a>
                </li>
            </ul>
        </div>
    </nav>