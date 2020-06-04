<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';
$error = $Barcode =  "";
if (isset($_POST['Barcode']))
{
$Barcode = $_POST['Barcode'];

if ($Barcode == "" )
$error = "<span class = 'error' >Not all fields were entered</span><br><br>";
else
{
    
    $result = Mysqli_query($connection, "SELECT Student_ID FROM student WHERE Barcode = '$Barcode'");
    if ($result->num_rows)
     while ($rows = $result->fetch_array(MYSQLI_ASSOC)){
         $Student_ID =$rows['Student_ID'];
       $query = Mysqli_query($connection, "INSERT INTO borrowed(Book_ID, Student_ID, Admin_ID) VALUES ('1','$Student_ID', '1')");
         }
}
}
Mysqli_query($connection, "SELECT Barcode from student");
echo <<<_END
<style>
.scanbook{
    width: 400px;
    height: 358px;
    margin-top: 100px;
    background-image: url('$Scanbook');
    background-size: 100%;
    background-repeat: no-repeat;
}
.scanstudent{
    width: 400px;
    height: 358px;
    margin-top: 100px;
    background-image: url('$Scanstudent');
    background-size: 100%;
    background-repeat: no-repeat;
}

.user{
    border-radius: 10px;
    margin-top: 10px;
    font-size: 2rem;
    padding-left: 10px;
}
.hidden{
  visibility: hidden;
}
.studentIndicator1, .bookIndicator1{

    border-color: black;
    border: solid;
    border-radius: 100px;
    padding: 1px;
    width: 15px; 
    height: 15px;
    position: absolute;
    left: 310px;
    top: 70px;
}
.studentIndicator2, .bookIndicator2{
    border-color: black;
    border: solid;
    border-radius: 100px;
    padding: 1px;
    width: 15px; 
    height: 15px;
    position: absolute;
    left: 350px;
    top: 70px;
}
.studentIndicator1{
    background-color: maroon;
}
.bookIndicator1{
    background-color: yellow;
}
.studentIndicator2{
    background-color: yellow;
}
.bookIndicator2{
    background-color: maroon;
}


</style>
<div class = 'studentIndicator1 bookIndicator1'></div>
<div class = 'studentIndicator2 bookIndicator2 '></div>
<center>
<div class = ' scanstudent scanbook'></div>
<form method = 'POST' action = 'scan-student.php'>
<input type = 'password' name = 'Barcode' value = '$Barcode' class = 'user' placeholder = 'Student ID Barcode' size = 15px; maxlength = 13>
<br>
<input type = 'submit' class='hidden'>

$error
</center>
_END;
?>