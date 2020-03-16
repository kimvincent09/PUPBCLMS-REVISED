<?php

session_start();
echo "<!DOCTYPE html>\n<html><head>";
require_once 'functions.php';
require_once 'Directory.php';
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