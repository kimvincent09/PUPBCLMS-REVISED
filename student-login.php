<?php
require_once 'C:\xampp\htdocs\Software_Engineering/main/header.php';

$error = $Student_Number = "";
if (isset($_POST['Student_Number']))
{
$Student_Number = sanitizeString($_POST['Student_Number']);
if ($Student_Number == "")
$error = "<span class='error'>Not all fields were entered</span><br>";
else
{
$result = queryMySQL("SELECT Student_Number,Course FROM studs WHERE Student_Number='$Student_Number'");
if ($result->num_rows == 0)
{
$error = "<span class='error'>Student_Numbername/Courseword
invalid</span><br><br>";
}
else
{
$_SESSION['Student_Number'] = $Student_Number;
die("You are now logged in. Please <a href='http://127.0.0.1/Software_Engineering/Student_Number/log.php'>" .
"click here</a> to continue.<br><br>");
}
}
}

echo <<<_END
<style>
.form{
background-image: url('$Studentloginpanel');
width: 600px;
height: 330px;
background-size: 100%;
margin-left: 100px;
margin-top: 50px;

}
.img{
    bottom: 90px;
    right: 100px;
    position: absolute;
    width: 200px;
}
.col{
    margin-top: 80px;
}
.login{
    visibility: hidden;
}
.space{
    padding: 10px 30px 10px 30px;
    border-radius: 100px;
    font-family: Gill Sans Ultra Bold;
    font-size: 20px;
    font-weight: bolder;
    border: solid;
    
}
.adminclicked{
    width: 180px;
    margin-left: 200px;
    cursor: pointer;

}
.studentclicked{
    width: 180px;
    margin-left: 40px;
    cursor: pointer;

}
.admin:hover{
    width: 180px;
    opacity: 0%;
  

}
.student{
    width: 180px;
    position: absolute;
    left: 433px;
    cursor: pointer;
    opacity:0%;
}
.admin{
    width: 180px;
    position: absolute;
    left: 208px;
    cursor: pointer;

}

</style>
<body background = '$Bg' style = 'background-repeat: no-repeat; background-size: 100%'>
<a href = 'login.php'><img src = $Adminbutton class = 'admin';></a>
<img src = $Adminbuttonclicked class = 'adminclicked';>
<img src = $Studentbutton class = 'student';>
<img src = $Studentbuttonclicked class = 'studentclicked';>
<img src = "$PUPLogo" class="img img-container"> 
    
<div class="form">
    
      
 
        <div class = "col">
    <form method='post' action='student-login.php'>
        <table><tbody></table><tr><td>
        <br><br>
    <input type='text' maxlength='16' name='Student_Number' class='Student_Number space' value='$Student_Number' placeholder = 'Student Number'>
    </td></tr>
    <tr><td>
    
  </td></tr></tbody></table><br>$error
    
    <button type = submit' class= 'login'>LOGIN</button>
    </form></div></div></div>
    </body>
    </html>
    
</body>
</html>

_END;
?>
