<?php include_once "header.php" ?>

<?php

// Lists
$listArticleCat = listArticleCat();
$listArticle = listArticle();


?>


<!-- Carousel of Index Page -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/bannierejournaux2.jpg" class="d-block w-100" alt="site">
        </div>
        <div class="carousel-item">
            <img src="img/bannierejournaux1.jpg" class="d-block w-100" alt="shop">
        </div>
        <div class="carousel-item">
            <img src="img/banniere-contact.jpg" class="d-block w-100" alt="contact">
        </div>
    </div>
</div>
<br>


<div id="colorlib-main container">
    <section>
        <h1 class="index_title">Nos Actualités</h1>
        <div class="row d-flex">
            <div class="col-8 py-5 px-md-5">
                <div class="row pt-md-4">
                    <div class="col-md-12">
                        <?php foreach ($listArticle as $row) { ?>
                            <div class="blog-entry ftco-animate d-md-flex fadeInUp ftco-animated">
                                <!-- <a href="single.html" class="img img-2" style="background-image: url(images/image_1.jpg);"></a> -->
                                <div class="jumbotron text text-2 pl-md-4">
                                    <h3 class="mb-2"><a href="single.html"><?= $row["article_title"] ?></a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="far fa-calendar-alt mr-2"></i><?= $row["article_date"] ?></span>
                                            <span><a href="single.html"><i class="far fa-folder-open mr-2"></i><?= $row["article_category_name"] ?></a></span>
                                            <span><i class="far fa-comments mr-2"></i><?= $row["article_author"] ?></span>
                                        </p>
                                    </div>
                                    <p class="mb-4"><?= $row["article_text"] ?></p>
                                    <!-- <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p> -->
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 sidebar ftco-animate bg-light pt-5 fadeInUp ftco-animated">
                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3 class="sidebar-heading">Categories</h3>
                    <ul class="categories">
                        <?php foreach ($listArticleCat as $row) { ?>
                            <li><a href="#"><?= $row["article_category_name"] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3 class="sidebar-heading">Popular Articles</h3>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3 class="sidebar-heading">Archives</h3>
                    <ul class="categories">
                        <li><a href="#">Decob14 2018 <span>(10)</span></a></li>
                        <li><a href="#">September 2018 <span>(6)</span></a></li>
                        <li><a href="#">August 2018 <span>(8)</span></a></li>
                        <li><a href="#">July 2018 <span>(2)</span></a></li>
                        <li><a href="#">June 2018 <span>(7)</span></a></li>
                        <li><a href="#">May 2018 <span>(5)</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>


<?php include_once "footer.php" ?>