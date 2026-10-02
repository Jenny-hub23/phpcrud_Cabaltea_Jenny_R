<?php

$conn = new mysqli('localhost', 'root', '', 'phpcrud_cabaltea_jenny');

if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
}
?>