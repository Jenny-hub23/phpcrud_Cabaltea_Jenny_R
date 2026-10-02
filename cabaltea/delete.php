<?php

include 'database.php';

$id = $_GET['id'];

$query = "DELETE FROM students WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header('Location: index.php');

?>