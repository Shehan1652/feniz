<?php

include "connection.php";

    // Get the form data from the request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "Shehan@2002", "feniz");

    // Check connection
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    // Insert the message into the database
    $sql = "INSERT INTO `user_msg` (`name`, `email`, `subject`, `message`) 
    VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($conn, $sql)) {
        echo "Message saved successfully";
    } else {
        echo "Error saving message: ". mysqli_error($conn);
    }

   
?>