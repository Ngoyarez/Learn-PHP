<?php
$file = "data.txt";

//Check the existence of the file
if(file_exists($file)){
    //Attempt to open the file
    $handle = fopen($file, "r+") or die("ERROR: Cannot open the file");

//Read fixed number of bytes from the file
//$content = fread($handle, "20");

//Read entire content from the file
$content = fread($handle, filesize($file));

//closing the file handle
fclose($handle);

//displaying the file content
echo $content;
}else{
    echo "ERROR: File does not exist";
}