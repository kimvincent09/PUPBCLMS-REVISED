<?php
// Session begins when the database connection has successfully been established 
session_start();
echo "<!DOCTYPE html>\n<html><head>";
// Link this file to the other php file 
require_once 'functions.php';
require_once 'Directory.php';
// Check if the value for "Name" exists in the session
if (isset($_SESSION['Name']))
{
$Name = $_SESSION['Name'];
$loggedin = TRUE;
}
else $loggedin = FALSE;

echo "<head>"."<link rel='stylesheet' href='$stylesheet' type='text/css'>"."<title>$appname</title>" .
"</head>" .
"<script src='javascript.js'></script>";

;
?>