<?php include_once "header.php" ?>

<?php

$listCat = listCat();
$listArt = listArt();

if ((@$_GET["q"]) and !empty(@$_GET["q"])) {
    $q = htmlspecialchars(@$_GET["q"]);
    $listArt = searchProducts($q);
}

?>
<div class="container container_shop">

    <!-- Search Input -->
    <form action="" method="GET">
        <div class="input_style">
            <input class="input_shop" type="search" name="q" id="" placeholder="Search...">
            <input type="submit" value="Valid">
        </div>
    </form>

    <!-- Products Cards -->
    <div class="row">
        <?php if (count($listArt) > 0) { ?>
            <?php foreach ($listArt as $row) { ?>
                <?php $getImgById = getImgById($row["product_id"]); ?>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="card mx-10">
                        <div class="card_img">
                            <img src="img/upload/<?= $getImgById["pic_name"] ?>" class="card-img-top" alt="">
                        </div>
                        <div class="card-body justify-content-center">
                            <?= $row["product_name"] ?>
                        </div>
                        <div class="card_button">
                            <a href="singlearticle.php?id=<?= $row['product_id'] ?>" class="btn btn-primary">Go to Product</a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        <?php } else { ?>
            No return for your search.....
        <?php } ?>
    </div>
</div>




<?php include_once "footer.php" ?>