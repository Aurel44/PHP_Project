<?php

session_start();

include_once "upload.php";

/**
 * Upload Img
 *
 * @param [string] $target_path
 * @param [int] $product_id
 * @return void
 */
function img_name($target_path, $product_id)
{
    global $start;
    $insert = "INSERT INTO pics (pic_name , product_id) VALUES (?,?)";
    $request = $start->prepare($insert);
    $request->execute(
        array(
            $target_path,
            $product_id
        )
    );
}
/**
 * Upload files in DB
 *
 * @param [string] $target_path
 * @param [int] $reclam_id
 * @return void
 */
function file_name($target_path, $reclam_id)
{
    global $start;
    $insert = "INSERT INTO files (file_name , reclam_id) VALUES (?,?)";
    $request = $start->prepare($insert);
    $request->execute(
        array(
            $target_path,
            $reclam_id
        )
    );
}

/**
 * List Category Shop Page
 *
 * @return array
 */
function listCat()
{
    global $start;
    $select = "SELECT * FROM categories";
    $request = $start->prepare($select);
    $request->execute();
    return $request->fetchAll();
}

/**
 * List Art Shop Page
 *
 * @return array
 */
function listArt()
{
    global $start;
    $select = "SELECT * FROM products";
    $request = $start->prepare($select);
    $request->execute();
    return $request->fetchAll();
}

/**
 * Complete Description of one Product
 *
 * @param [int] $product_id
 * @return void
 */
function prodById($product_id)
{
    global $start;
    $select = "SELECT * FROM products 
    NATURAL JOIN pics WHERE product_id = ?";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $product_id
        )
    );
    return $request->fetch();
}

/**
 * All Pics of one Product
 *
 * @param [int] $product_id
 * @return void
 */
function picsProdById($product_id)
{
    global $start;
    $select = "SELECT pic_name FROM products 
    NATURAL JOIN pics WHERE product_id = ?";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $product_id
        )
    );
    return $request->fetchAll();
}

/**
 * List of Comment in attemps of validate by Categorie
 *
 * @param [int] $category_id
 * @return array
 */
function listCommentByCat($category_id)
{
    global $start;
    $select = "SELECT * FROM comments 
    NATURAL JOIN users
    NATURAL JOIN products
    NATURAL JOIN categories WHERE categories.category_id = $category_id AND active= 0";
    $request = $start->prepare($select);
    $request->execute();
    return $request->fetchAll();
}
/**
 * Add a New Login
 *
 * @param [varchar] $name
 * @param [varchar] $firstname
 * @param [varchar] $password
 * @param [text] $address
 * @param [varchar] $mail
 * @return void
 */
function addlogin($name, $firstname, $password, $address, $mail)
{
    global $start;
    $insert = "INSERT INTO users (user_name, user_firstname, user_password, user_address, user_email) VALUES (?,?,?,?,?)";
    $request = $start->prepare($insert);
    $request->execute(
        array(
            $name,
            $firstname,
            $password,
            $address,
            $mail
        )
    );
    if ($request !== false) {
        return true;
    }
}
/**
 * Log In 
 *
 * @param [varchar] $logmail
 * @param [varchar] $logpass
 * @return array
 */
function loginVis($logmail, $logpass)
{
    global $start;
    $select = "SELECT * FROM users WHERE user_email= ? LIMIT 1";
    $request = $start->prepare($select);
    $request->execute(array($logmail));
    $row = $request->fetch();


    if ($row == false) {
        return false;
    } elseif (password_verify($logpass, $row['user_password'])) {

        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["user_name"] = $row["user_name"];
        $_SESSION["user_firstname"] = $row["user_firstname"];
        $_SESSION["user_address"] = $row["user_address"];
        $_SESSION["user_email"] = $row["user_email"];
        $_SESSION["user_role"] = $row["user_role"];

        if ($_SESSION["user_role"] == 5) {
            header('Location: index.php'); // Admin
        }
        if ($_SESSION["user_role"] == 1) {
            header('Location: index.php'); // Site Client
        }
    } else {
        return "incorrect";
    }
}
/**
 * Add products in DataBase
 *
 * @param [varchar] $product_name
 * @param [text] $product_description
 * @param [float] $product_price
 * @param [int] $product_stock
 * 
 */
function addProduct($product_name, $product_description, $product_price, $product_stock, $category_id)
{
    global $start;
    $insert = "INSERT INTO products (product_name, product_description, product_price, product_stock, category_id ) VALUES (?,?,?,?,?)";
    $request = $start->prepare($insert);
    $request->execute(array($product_name, $product_description, $product_price, $product_stock, $category_id));
}
/**
 * Update a Product
 *
 * @param [int] $product_id
 * @param [varchar] $product_name
 * @param [text] $product_description
 * @param [float] $product_price
 * @param [int] $product_stock
 * @return void
 */
function updateProduct($product_name, $product_description, $product_price, $product_stock, $product_id)
{
    global $start;
    $update = "UPDATE products 
    SET product_name = ? , 
    product_description = ? , 
    product_price = ? , 
    product_stock = ? 
    WHERE product_id = ?";
    $request = $start->prepare($update);
    $request->execute(
        array(
            $product_name,
            $product_description,
            $product_price,
            $product_stock,
            $product_id
        )
    );
}
/**
 * Undocumented function
 *
 * @param [int] $product_id
 * @return void
 */
function deleteProduct($product_id)
{
    global $start;
    $delete = "DELETE FROM products WHERE product_id = ?";
    $request = $start->prepare($delete);
    $request->execute(
        array(
            $product_id
        )
    );
}

/**
 * Add Comments in DB
 *
 * @param [text] $comment_text
 * @param [int] $user_id
 * @param [int] $product_id
 * @return void
 */
function addComment($comment_text, $user_id, $product_id)
{
    global $start;
    $insert = "INSERT INTO comments (comment_text,user_id,product_id) VALUES (?,?,?) ";
    $request = $start->prepare($insert);
    $request->execute(
        array(
            $comment_text,
            $user_id,
            $product_id

        )
    );
}
/**
 * Join comments table and products table
 *
 * @param [int] $comment_id
 * @return array
 */
function commentartbyId($comment_id)
{
    global $start;
    $select = "SELECT * FROM products
    NATURAL JOIN comments WHERE comments.comment_id = $comment_id";
    $request = $start->prepare($select);
    $request->execute();
    return $request->fetch();
}
/**
 * Delete A Comment
 *
 * @param [int] $comment_id
 * @return void
 */
function deleteComment($comment_id)
{
    global $start;

    $delete = "DELETE FROM comments WHERE comment_id = $comment_id";

    $request = $start->prepare($delete);
    
    $request->execute();
}
/**
 * Accept a Comment
 *
 * @param [int] $active
 * @param [int] $comment_id
 * @return void
 */
function updateComment($active, $comment_id)
{
    global $start;
    $update = "UPDATE comments SET active = ? WHERE comment_id = ?";
    $request = $start->prepare($update);
    $request->execute(
        array(
            $active,
            $comment_id
        )
    );
    return $request->fetchAll();
}

/**
 * Undocumented function
 *
 * @param [int] $product_id
 * @return array
 */
function getImgById($product_id)
{
    global $start;
    $select = "SELECT * FROM pics 
    NATURAL JOIN products WHERE product_id = ? LIMIT 1";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $product_id
        )
    );
    return $request->fetch();
}
/**
 * List of Products by Category
 *
 * @param [int] $category_id
 * @return array
 */
function artbyId($category_id)
{
    global $start;
    $select = "SELECT * FROM products 
    NATURAL JOIN categories
    WHERE category_id = ?";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $category_id
        )
    );
    return $request->fetchAll();
}
/**
 * List Comments On SingleArticle Page
 *
 * @param [int] $product_id
 * @return void
 */
function listComment($product_id)
{
    global $start;
    $select = "SELECT * FROM comments 
    NATURAL JOIN users 
    WHERE product_id = ? 
    AND active = 1";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $product_id
        )
    );
    return $request->fetchAll();
}
/**
 * Verify if Product already exists in Cart
 *
 * @param [int] $product_id
 * @param [int] $user_id
 * @return array
 */
function selectCartId($product_id, $user_id)
{
    global $start;
    $select = "SELECT * FROM cart NATURAL JOIN products WHERE product_id = ? AND user_id = ?";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $product_id,
            $user_id
        )
    );
    return $request->fetch();
}

/**
 * Add Product in Cart SingleArticle Page
 * @param [int] $product_id
 * @param [int] $user_id
 * @return void
 */
function setProdInCart($product_id, $user_id)
{
    global $start;

    $insert = "INSERT INTO cart (product_id,product_quantity,user_id) VALUES (?,'1',?)";
    $request = $start->prepare($insert);
    $request->execute(
        array(
            $product_id,
            $user_id
        )
    );
}
/**
 * Update product Quantity in Cart DB
 *
 * @param [int] $product_id
 * @param [int] $user_id
 * @return void
 */
function updateProdInCart($product_quantity, $product_id, $user_id)
{
    global $start;
    $update = "UPDATE cart SET product_quantity =? WHERE product_id = ? AND user_id = ?";
    $request = $start->prepare($update);
    $request->execute(
        array(
            $product_quantity,
            $product_id,
            $user_id
        )
    );
    return $request->fetchAll();
}
/**
 * Sum Of Products in Cart by ID
 *
 * @param [int] $user_id
 * @return variable
 */
function sumProdInCart($user_id)
{
    global $start;
    $select = "SELECT SUM(product_quantity) FROM cart WHERE user_id = ? ";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $user_id
        )
    );
    return $request->fetch();
}
/**
 * List of All products in Cart
 *
 * @return array
 */
function listProdInCart($user_id)
{
    global $start;
    $select = "SELECT * FROM cart
    NATURAL JOIN products WHERE user_id = ?";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $user_id
        )
    );
    return $request->fetchAll();
}
/**
 * Delete Prod From Cart
 *
 * @param [int] $product_id
 * @param [int] $user_id
 * @return void
 */
function deleteProdInCart($product_id, $user_id)
{
    global $start;
    $delete = "DELETE FROM cart WHERE product_id = ? AND user_id = ?";
    $request = $start->prepare($delete);
    $request->execute(
        array(
            $product_id,
            $user_id
        )
    );
}
/**
 * Total of Cart
 *
 * @param [array] $listProdInCart
 * @param [float] $total
 * @return void
 */
function total($listProdInCart, $total)
{
    foreach ($listProdInCart as $item) {
        $total += ($item["product_quantity"] * $item["product_price"]);
    }
    return $total;
}
/**
 * Search Products in List
 *
 * @param [string] $search
 * @return void
 */
function searchProducts($search)
{
    global $start;
    $select = "SELECT * FROM products WHERE product_name LIKE '%" . $search . "%' ";
    $request = $start->prepare($select);
    $request->execute();
    return $request->fetchAll();
}

/**
 * List Of Reclams Categories
 *
 * @return void
 */
function listReclamCategory()
{
    global $start;
    $select = "SELECT * FROM reclam_categories";
    $request = $start->prepare($select);
    $request->execute();
    return $request->fetchAll();
}


/**
 * Add reclams to DB
 *
 * @param [text] $reclam_text
 * @param [int] $user_id
 * @param [int] $reclam_category_id
 * @return void
 */
function addReclams($reclam_text, $user_id, $reclam_category_id)
{

    global $start;
    $insert = "INSERT INTO reclamations (reclam_text,user_id,reclam_category_id ) VALUES (?,?,?)";
    $request = $start->prepare($insert);
    $request->execute(
        array(
            $reclam_text,
            $user_id,
            $reclam_category_id
        )
    );

    $reclam_id = $start->lastInsertId();

    if (@$_FILES["file"]) {
        uploadDoc($reclam_id);
    }
}

/**
 * Add articles in DataBase
 *
 * @param [varchar] $product_name
 * @param [text] $product_description
 * @param [float] $product_price
 * @param [int] $product_stock
 * 
 */
function addBlogArticle($article_text, $article_author, $article_category_id)
{
    global $start;
    $insert = "INSERT INTO blog_article (article_text, article_author, article_date, article_category_id ) VALUES (?,?,NOW(),?)";
    $request = $start->prepare($insert);
    $request->execute(array($article_text, $article_author, $article_category_id));
}

/**
 * List Category Shop Page
 *
 * @return array
 */
function listArticleCat()
{
    global $start;
    $select = "SELECT * FROM article_category";
    $request = $start->prepare($select);
    $request->execute();
    return $request->fetchAll();
}

/**
 * List of Products by Category
 *
 * @param [int] $category_id
 * @return array
 */
function articlebyId($article_category_id)
{
    global $start;
    $select = "SELECT * FROM blog_article 
    NATURAL JOIN article_category
    WHERE article_category_id = ?";
    $request = $start->prepare($select);
    $request->execute(
        array(
            $article_category_id
        )
    );
    return $request->fetchAll();
}

/**
 * List Category Shop Page
 *
 * @return array
 */
function listArticle()
{
    global $start;
    $select = "SELECT * FROM blog_article NATURAL JOIN article_category";
    $request = $start->prepare($select);
    $request->execute();
    return $request->fetchAll();
}
