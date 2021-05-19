<?php include_once "header_admin.php" ?>

<?php

//variables
$category_id = @$_POST["category_id"];

// Update
$comment_id = @$_POST["comment_id"];
$prodUpdate = commentartbyId($comment_id);

// Delete
if (@$_POST["delete"]) {
    $comment_id = @$_POST["comment_id"];
    deleteComment($comment_id);
}

// Accept Comment
if (@$_POST["accept"]) {
    $active = 1;
    updateComment($active, $comment_id);
}

// Lists
$listCat = listCat();
@$listCommentByCat = listCommentByCat($category_id);

?>



    <div class="container container_add">

        <!-- Reading Comment Form -->
        <form action="" method="POST">
            <fieldset>
                <legend>Check the comments</legend>
                <br>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id" onChange="submit()" required>
                        <option value="" selected>Select a category</option>
                        <?php foreach ($listCat as $row) { ?>
                            <option value="<?= @$row["category_id"] ?>" <?php if (@$_POST["category_id"] == $row["category_id"]) {
                                                                            echo "selected";
                                                                        }; ?>>
                                <?= $row["category_name"] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br>
                    <input class="form-control" type="text" value="<?= @$prodUpdate['product_name'] ?>" name="product_title" value="" id="">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="comment" value="" rows="3" placeholder="Write here please."><?= @$prodUpdate['comment_text'] ?></textarea>
                </div>
            </fieldset>
        </form>

        <!-- Comments in Attemp Table -->
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <!-- First line -->
                    <tr>
                        <th class="article_color">Product</th>
                        <th class="article_color">Comment</th>
                        <th class="article_color">Author</th>
                        <th class="article_color"></th>
                        <th class="article_color"></th>
                        <th class="article_color"></th>
                    </tr>
                </thead>
                <!-- List of Comments -->
                <tbody>
                    <?php foreach ($listCommentByCat as $row) { ?>
                        <form action="" method="POST">
                            <tr>
                                <td class="article_color">
                                    <?= $row["product_name"] ?>
                                </td>
                                <td class="article_color">
                                    <div class="comment_text">
                                        <?= $row["comment_text"] ?>
                                    </div>
                                </td>
                                <td class="article_color">
                                    <?= $row["user_name"] ?> <?= $row["user_firstname"] ?>
                                </td>
                                <td class="article_color">
                                    <input type="submit" class="btn btn-primary" name="read" value="Read">
                                    <input type="hidden" name="comment_id" value="<?= $row["comment_id"] ?>">
                                    <input type="hidden" name="category_id" value="<?= $row["category_id"] ?>">
                                </td>
                                <td class="article_color">
                                    <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                </td>
                                <td class="article_color">
                                    <input type="submit" class="btn btn-success" name="accept" value="Accept">
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


<?php include_once "../footer.php" ?>
