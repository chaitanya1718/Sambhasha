<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $message = $conn->real_escape_string($_POST['message']);
    $stars = $conn->real_escape_string($_POST['stars']);

    $sql = "INSERT INTO feedbacks (name, message, stars) VALUES ('$name', '$message', '$stars')";
    if ($conn->query($sql)) {
        header("Location: newfeedback.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

 ?>
