<?php
// Establish database connection
$servername = "127.0.0.1:3306";
$username = "root";
$password = "#MySql@2024";
$dbname = "mydata";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];

    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, password, address, phone_number) VALUES ('$name', '$email', '$password', '$address', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
