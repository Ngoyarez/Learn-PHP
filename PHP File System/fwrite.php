<?php

/*
In the above example, if the "note.txt" file doesn't exist PHP will automatically create it and write the data. But, if the "note.txt" file already exist, PHP will erase the contents of this file, if it has any, before writing the new data, however if you just want to append the file and preserve existing contents just use the mode a instead of w in the above example.
*/
$file = "note.txt";

//String of the data to be written
$data = "Welcome Brian to PHP Programming";

//Open the file for writing
$handle = fopen($file, "w") or die("ERROR: Cannot open the file");

//Write data to the file
fwrite($handle, $data) or die("ERROR: Cannot write to the file");

//closing the file handle
fclose($handle);

echo "Data written successfully into the file";

?>