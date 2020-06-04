<?php
//including the database connection file
require_once 'C:\xampp\htdocs\SE\main\functions.php';
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($connection, "DELETE FROM repository WHERE id=$id");
 
//redirecting to the display page (index.php in our case)
header("Location:search-repository.php");
?>