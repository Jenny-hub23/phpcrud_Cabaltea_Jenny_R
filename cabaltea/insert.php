<?php 

include 'database.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$query = "INSERT INTO students (firstname, lastname) VALUES (?,?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $firstname, $lastname);
$stmt->execute();
$stmt->close();

header("Location: index.php");

?>