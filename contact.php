<?php include_once "header.php" ?>
<?php

//Variables
$user_id = @$_SESSION["user_id"];
$reclam_category_id = @$_POST["reclam_category_id"];
$reclam_text = htmlspecialchars(@$_POST["reclam_text"]);

// Add Products
if (@$_POST["addreclam"]) {
    // var_dump($reclam_text,$user_id,$reclam_category_id);
    // die();
    addReclams($reclam_text, $user_id, $reclam_category_id);
    unset($_POST);
}

$listReclamCategory = listReclamCategory();
?>

<div class="container container_contact">
    <div class="row">

        <!-- Contact Form -->
        <div class="col-sm-12 col-md-8 col-lg-6">
            <form method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Let us your comments or reclams</legend>
                    <div class="form-group">
                        <label for="exampleSelect1">Select category</label>
                        <select class="form-control" id="exampleSelect1">
                            <option value="" selected>Select a category</option>
                            <?php foreach ($listReclamCategory as $row) { ?>
                                <option value="<?= @$row["reclam_category_id"] ?>" <?php if (@$_POST["reclam_category_id"] == $row["reclam_category_id"]) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                    <?= $row["reclam_category_name"] ?>
                                </option>
                            <?php } ?>
                            <input type="hidden" name="reclam_category_id" value="<?= @$row["reclam_category_id"] ?>">
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="reclam_text" id="comment" rows="8" placeholder="Write here please."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fileUpload">Add Files</label>
                        <input type="file" class="form-control-file" id="fileUpload" name="file[]" multiple />
                        <input type="submit" name="addreclam" value="Post your reclam" class="btn" />
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- Site Location -->
        <div class="col-sm-12 col-md-8 col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2708.048547683618!2d-1.5052733450791516!3d47.25475396314661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805efbc90700f5b%3A0xe4819ffba7ab78d7!2s37%20Rue%20du%20Bois%20Briand%2C%2044300%20Nantes!5e0!3m2!1sfr!2sfr!4v1611655845176!5m2!1sfr!2sfr" width="500" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
            </iframe>
        </div>
    </div>
</div>


<?php include_once "footer.php" ?>