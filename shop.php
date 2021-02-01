<?php include_once "header.php" ?>

<?php

$listCat = listCat();
$listArt = listArt();

if ((@$_GET["q"]) and !empty(@$_GET["q"])) {
    $q = htmlspecialchars(@$_GET["q"]);
    $listArt = searchProducts($q);
    // var_dump($listArt);
    // die();
}

?>
<div class="container container_shop">

    <!-- Categories List -->
    <!-- <ul>
        <?php foreach ($listCat as $row) { ?>
            <a href="">
                <li class="li_shop">
                    <?= $row["category_name"] ?>
                </li>
            </a>
        <?php } ?>
    </ul> -->

    <!-- Search Input -->
    <form action="" method="GET">
        <div class=" input_style">
            <input class="input_shop" type="search" name="q" id="" placeholder="Search...">
            <input type="submit" value="Valid">
        </div>
    </form>

    <!-- Products Cards -->
    <div class="row">
        <?php if (count($listArt) > 0) { ?>
            <?php foreach ($listArt as $row) { ?>
                <?php $getImgById = getImgById($row["product_id"]); ?>
                <div class="card">
                    <div class="card_img">
                        <img src="img/upload/<?= $getImgById["pic_name"] ?>" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <div class="card-title"><?= $row["product_name"] ?></div>
                    </div>
                    <div class="card_button">
                        <a href="/project1/singlearticle.php?id=<?= $row['product_id'] ?>" class="btn btn-primary">More ...</a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            No return for your search.....
        <?php } ?>
    </div>
</div>




<?php include_once "footer.php" ?>