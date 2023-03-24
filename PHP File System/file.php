<?php
/*
PHP's file() function. It does a similar job to file_get_contents() function, but it returns the file contents as an array of lines, rather than a single string. Each element of the returned array corresponds to a line in the file.
To process the file data, you need to iterate over the array using a foreach loop. 
*/

$file = "data.txt";

//Check the existence of the file
if(file_exists($file)){
    //Reading the entire file into an array
    $arr = file($file) or die("ERROR: Cannot open the file");
    foreach($arr as $line){
        echo $line;
    }
}else{
    echo "ERROR: File does not exist";
}
?>