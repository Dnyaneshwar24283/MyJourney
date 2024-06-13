-- Active: 1711381747826@@127.0.0.1@3306@localhost
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Booking"; // corrected variable name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]); // escape input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST["email"]); // escape input to prevent SQL injection
    $destination = mysqli_real_escape_string($conn, $_POST["destination"]); // escape input to prevent SQL injection
    $departure_date = $_POST["departure-date"]; // no need to escape if it's a date
    $return_date = $_POST["return-date"]; // no need to escape if it's a date
    
    $name = mysqli_real_escape_string($conn, $_POST["discription"]);

    // prepare and execute the database insertion
    $sql = "INSERT INTO `booking`(`name`, `email`, `destination`, `departure_date`, `return_date`,'discription')
     VALUES ('$name','$email','$destination','$departure_date','$return_date,'$discription')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
