<?php

/*
An alternative way is using the file_put_contents() function. It is counterpart of file_get_contents() function and provides an easy method of writing the data to a file without needing to open it. This function accepts the name and path to a file together with the data to be written to the file. Here's an example:
*/

$file = "note1.txt";

//String data to be written 
$data = "Welcome Brian to PHP Programming";

//Write data to the  file
file_put_contents($file, $data, FILE_APPEND) or die("ERROR: Cannot write the file");

echo "Data written successfully to the file";

/*
If the file specified in the file_put_contents() function already exists, PHP will overwrite it by default. If you would like to preserve the file's contents you can pass the special FILE_APPEND flag as a third parameter to the file_put_contents() function. It will simply append the new data to the file instead of overwitting it. Here's an example:
    file_put_contents($file, $data, FILE_APPEND) or die("ERROR: Cannot write the file.");
*/
?>