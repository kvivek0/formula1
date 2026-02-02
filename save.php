<?php

$name = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];

//connect with mysql server

$host = "localhost";
$dbname = "whitemar1_demo";
$user = "whitemar1_demo_user";
$pass = "demoUsr@2026";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO customer (name, email, phone) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $email, $phone);


// Execute
if ($stmt->execute()) {
    ?>
    <script>alert('Data inserted successfully');

       window.location = "https://demo.whitemarks.in/";
    </script>
    <?php
    // echo "Data inserted successfully";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();

?>