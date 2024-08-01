<?php
// Database credentials
$servername = "localhost"; // or your database server address
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "booking"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$full_name = filter_input(INPUT_POST, 'full-name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone_number = filter_input(INPUT_POST, 'phone-number', FILTER_SANITIZE_STRING);
$number_of_people = filter_input(INPUT_POST, 'number-of-people', FILTER_SANITIZE_NUMBER_INT);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$additional_note = filter_input(INPUT_POST, 'additional-note', FILTER_SANITIZE_STRING);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO reservations (full_name, email, phone_number, number_of_people, date, additional_note) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiss", $full_name, $email, $phone_number, $number_of_people, $date, $additional_note);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
