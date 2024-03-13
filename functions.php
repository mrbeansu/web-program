<?php

// Database configuration
$servername = "localhost";
$username = "username";
$password = "password";
$database = "dbname";

// Connect to the database
function connectToDatabase($servername, $username, $password, $database) {
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Execute a query
function executeQuery($conn, $sql) {
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error executing query: " . $conn->error;
        return false;
    }

    return $result;
}

// Fetch data from a result set
function fetchData($result) {
    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

// Insert data into a table
function insertData($conn, $table, $data) {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";

    if (executeQuery($conn, $sql)) {
        echo "Data inserted successfully";
    }
}

// Update data in a table
function updateData($conn, $table, $data, $condition) {
    $set = array();
    foreach ($data as $key => $value) {
        $set[] = "$key = '$value'";
    }
    $set = implode(", ", $set);
    $sql = "UPDATE $table SET $set WHERE $condition";

    if (executeQuery($conn, $sql)) {
        echo "Data updated successfully";
    }
}

// Delete data from a table
function deleteData($conn, $table, $condition) {
    $sql = "DELETE FROM $table WHERE $condition";

    if (executeQuery($conn, $sql)) {
        echo "Data deleted successfully";
    }
}

// Example usage
$conn = connectToDatabase($servername, $username, $password, $database);

// Fetch data example
$sqlFetch = "SELECT * FROM tablename";
$resultFetch = executeQuery($conn, $sqlFetch);
$data = fetchData($resultFetch);
print_r($data);

// Insert data example
$dataToInsert = array("name" => "John", "age" => 30, "email" => "john@example.com");
insertData($conn, "tablename", $dataToInsert);

// Update data example
$updateData = array("name" => "Jane", "age" => 25, "email" => "jane@example.com");
updateData($conn, "tablename", $updateData, "id = 1");

// Delete data example
deleteData($conn, "tablename", "id = 2");

// Close connection
$conn->close();

?>
