<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM feedbacks WHERE id = $id";
    if ($conn->query($sql)) {
        header("Location: newfeedback.php");
        exit;
    } else {
        echo "Error deleting feedback: " . $conn->error;
    }
}
?>
