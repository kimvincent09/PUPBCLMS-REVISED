<?php
//including the database connection file
require_once 'C:\xampp\htdocs\SE\main\functions.php';
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table

$result = mysqli_query($connection, "DELETE from book WHERE Book_ID = $id");
$result = mysqli_query($connection, "DELETE from bookauthor WHERE Book_ID = $id");
$result = mysqli_query($connection, "DELETE from booktopic WHERE Book_ID = $id");
$result = mysqli_query($connection, "DELETE from bookpublisher WHERE Book_ID = $id");

 
//redirecting to the display page (index.php in our case)
header("Location:search-books.php");
?>