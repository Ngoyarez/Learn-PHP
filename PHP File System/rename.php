<?php
$file = "file.txt";

//check the existence of the file
if(file_exists($file)){
    //Attempt to rename the file
    if(rename($file, "file1.txt")){
        echo "File renamed successfully";
    }else{
        echo "ERROR: File Cannot be renamed";
    }
}else{
    echo "File does not exist";
}

?>