<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Read and Write Files in PHP</title>
</head>
<body>

<?php
  // File path
  $filePath = "example.txt";

  // Write to a file
  $contentToWrite = "Hello, this is a sample content!";
  file_put_contents($filePath, $contentToWrite);

  echo "<p>Content written to file successfully.</p>";

  // Read from the file
  $readContent = file_get_contents($filePath);

  if ($readContent !== false) {
    echo "<p>Content read from file:</p>";
    echo "<pre>$readContent</pre>";
  } else {
    echo "<p>Error reading from file.</p>";
  }
?>

</body>
</html>
