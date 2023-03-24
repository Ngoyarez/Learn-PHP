<?php

// You can delete files or directories using the PHP's unlink() function, like this:

$file = "note.txt";

//Check the existence of the file
if(file_exists($file)){
    if(unlink($file)){
        echo "file removed successfully";
    }else{
        echo "ERROR: File cannot be removed";
    }
}else{
    echo "ERROR: File does not exist";
}