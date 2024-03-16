<?php
// File path for reading and writing
$file_path = "example.txt";

// Writing to a file
$data_to_write = "Hello, World!\nThis is a sample text to be written to the file.";
file_put_contents($file_path, $data_to_write);

echo "Data has been written to the file successfully.<br>";

// Reading from a file
$data_read = file_get_contents($file_path);

echo "Data read from the file:<br>";
echo nl2br($data_read); // nl2br() function is used to convert newlines to HTML line breaks for better display
?>