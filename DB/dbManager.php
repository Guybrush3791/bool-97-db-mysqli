<?php

function getUsersByUsername($username) {

    define("DB_SERVERNAME", "localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD", "code");
    define("DB_NAME", "db-university");
    
    // Connect
    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Check connection
    if ($conn && $conn->connect_error) {
        
        echo "Connection failed: " . $conn->connect_error;
    
        return;
    }
    
    $sql = "SELECT * FROM students WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("s", $username);
    $stmt->execute();

    // get result
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {

        $students = [];
        while($row = $result->fetch_assoc()) {
            
            $students[] = $row;
        }
        
        return $students;
    } elseif ($result) {
        echo "0 results";
    } else {
        echo "query error";
    }

    return [];
    
    $conn->close();
}