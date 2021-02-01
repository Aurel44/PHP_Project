<?php
/**
 * Upload Pics
 *
 * @param [int] $product_id
 * @return void
 */
function upload($product_id)
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

        if (($_FILES['file']['size'][$i] < 4000000) //Approx 4MB files can be uploaded
            && in_array($file_extension, $validextensions)
        ) {
            if (move_uploaded_file(@$_FILES['file']['tmp_name'][$i], $target_path)) { // if file moved to uploads folder
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                img_name(basename($target_path), $product_id);
            } else { //if file was not moved
                echo $j . ').<span id="error">please try again.</span><br/><br/>';
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type</span><br/><br/>';
        }
    }
}

/**
 * Upload Files for Reclams
 *
 * @param [int] $reclam_id
 * @return void
 */
function uploadDoc($reclam_id)
{
    $j = 0;
    $target_path = "../files/upload/"; 
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) { 
        $validextensions = array("pdf", "doc", "docx","xls");
        $ext = explode('.', basename($_FILES['file']['name'][$i]));
        $file_extension = end($ext); 
        $target_path = $target_path . uniqid() . "." . $ext[count($ext) - 1]; //set the target path with a new name of image
        $j = $j + 1;
        // var_dump($target_path,$file_extension, $validextensions,$_FILES['file']['size'][$i]);
        // die();
        if (($_FILES['file']['size'][$i] < 2000000) //Approx 2MB files can be uploaded
            && in_array($file_extension, $validextensions)
        ) {
        //     var_dump(move_uploaded_file(@$_FILES['file']['tmp_name'][$i], $target_path));
        // die();
            if (move_uploaded_file(@$_FILES['file']['tmp_name'][$i], $target_path)) {
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                file_name(basename($target_path), $reclam_id);
            } else { //if file was not moved
                echo $j . ').<span id="error">please try again.</span><br/><br/>';
            }
        } else { //if file size and file type was incrrect.
            echo $j . ').<span id="error">***Invalid file Size or Type</span><br/><br/>';
        }
    }
}
