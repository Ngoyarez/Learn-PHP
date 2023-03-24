<?php
$file = "data.txt";

//Check the existence of the file
if(file_exists($file)){
    //Attempt to open the file
    $handle = fopen($file, "r+");
    //Closing the file handle
    fclose($file);
}else{
    echo "ERROR: File does not exist";
}

?>