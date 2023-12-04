<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelmanagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $guests = $_POST["number_guests"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $message = $_POST["message"];

    // Insert data into the database
    $sql = "INSERT INTO Booking (name, email, phone, number_guests, date, time, message) VALUES ('$name', '$email', '$phone', '$guests', '$date', '$time', '$message')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
    
        header("Location:index.html");
        
        exit();
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
