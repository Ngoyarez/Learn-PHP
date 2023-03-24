<?php
// file_get_contents function also reads the entire content of a file without opening it
$file = "data.txt";
 //Check the existence of the file
 if(file_exists($file)){
    $content = file_get_contents($file) or die("ERROR: Cannot open the file");

    //Display the file content
    echo $content;
 }else{
    echo "ERROR: File does not exist";
 }

?>