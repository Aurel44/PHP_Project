<?php

function upload($id_article)
{
    $j = 0; // variable for indexing uploaded image

    $target_path = "../img/upload/"; // Declaring path for uplaoded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i])); //explode file name from dot
        $file_extension = end($ext); //store extensions in the variable
        // var_dump($ext);
        // die();
        $target_path = $target_path . uniqid() . "." . $ext[count($ext) - 1]; //set the target path with a new name of image
        $j = $j + 1; // increment the number of uploaded images according to the files in array

        if (($_FILES['file']['size'][$i] < 4000000) //Approx 100kb files can be uploaded
            && in_array($file_extension, $validextensions)
        ) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) { // if file moved to uploads folder
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                img_name(basename($target_path), $id_article);
            } else { //if file was not moved
                echo $j . ').<span id="error">please try again.</span><br/><br/>';
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type</span><br/><br/>';
        }
    }
    return basename($target_path);
}

function uploadDoc($id_article)
{
    $j = 0; // variable for indexing uploaded image

    $target_path = "../img/upload/"; // Declaring path for uplaoded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i])); //explode file name from dot
        $file_extension = end($ext); //store extensions in the variable
        // var_dump($ext);
        // die();
        $target_path = $target_path . uniqid() . "." . $ext[count($ext) - 1]; //set the target path with a new name of image
        $j = $j + 1; // increment the number of uploaded images according to the files in array

        if (($_FILES['file']['size'][$i] < 4000000) //Approx 100kb files can be uploaded
            && in_array($file_extension, $validextensions)
        ) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) { // if file moved to uploads folder
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                file_name(basename($target_path), $id_article);
            } else { //if file was not moved
                echo $j . ').<span id="error">please try again.</span><br/><br/>';
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type</span><br/><br/>';
        }
    }
    return basename($target_path);
}

?>