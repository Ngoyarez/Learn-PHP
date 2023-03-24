<?php
//Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Check if the file was uploaded without errors
    if(isset($_FILE["photo"]) && $_FILES["photo"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $FILES["photo"]["name"];
        $filename = $FILES["photo"]["type"];
        $filename = $FILES["photo"]["size"];

        //Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("ERROR: Please Select A Valid File Format");

        //Verify file size - 5MB
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("ERROR: File size is larger than the allowed limit");

        //Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            //Check whether the file exists before uploading it
            if(file_exists("upload/" .$filename)){
                echo $filename . "already exists";
            }else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully";
            }
        }else{
            echo "ERROR: There was a problem uploading your file. PLease try again";
        }
    }else{
        echo "ERROR: ".$_FILES["photo"]["error"];
    }

    if($_FILES["photo"]["error"] > 0){
        echo "ERROR: ".$_FILES["photo"]["error"] . "<br>";
    }else{
        echo "File Name: ".$_FILES["photo"]["name"] . "<br>";
        echo "File Type: ".$_FILES["photo"]["type"] . "<br>";
        echo "File Size: ".($_FILES["photo"]["size"] / 1024 ). "KB<br>";
        echo "Stored in: ".$_FILES["photo"]["tmp_name"] . "<br>";
    }
}

?>