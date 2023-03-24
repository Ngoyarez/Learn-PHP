<?php
//  readfile function reads the entire content of a file without opening it
$file = "data.txt";

//check the existence of the file
if(file_exists($file)){
    //readsand outputs the entire file
    readfile($file) or die("ERROR: Cannot open the file.");
}else{
    echo "ERROR: File does not exist";
}

if(is_executable($file)){
    echo "The file is executable";
}else{
    echo "The file is not executable";
}
?>