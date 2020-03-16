<?php
require_once 'C:\xampp\htdocs\Software_Engineering/main/header.php';

$error = $user = $pass = "";
if (isset($_POST['user']))
{
$user = sanitizeString($_POST['user']);
$pass = sanitizeString($_POST['pass']);
if ($user == "" || $pass == "")
$error = "<span class='error'>Not all fields were entered</span><br>";
else
{
$result = queryMySQL("SELECT user,pass FROM admin WHERE user='$user' AND pass='$pass'");
if ($result->num_rows == 0)
{
$error = "<span class='error'>Username/Password
invalid</span><br><br>";
}
else
{
$_SESSION['user'] = $user;
$_SESSION['pass'] = $pass;
die("You are now logged in. Please <a href='http://127.0.0.1/Software_Engineering/user/log.php'>" .
"click here</a> to continue.<br><br>");
}
}
}

echo <<<_END
<style>
.form{
background-image: url('$Adminloginpanel');
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
.student:hover{
    width: 180px;
    opacity: 0%;
  

}
.student{
    width: 180px;
    position: absolute;
    left: 433px;
    cursor: pointer;
}
.admin{
    width: 180px;
    position: absolute;
    left: 233px;
    cursor: pointer;
    opacity: 0%
}
</style>
<body background = '$Bg' style = 'background-repeat: no-repeat; background-size: 100%'>
<img src = $Adminbutton class = 'admin';>
<img src = $Adminbuttonclicked class = 'adminclicked';>
<a href = 'student-login.php'><img src = $Studentbutton class = 'student';></a>
<img src = $Studentbuttonclicked class = 'studentclicked';>
<img src = "$PUPLogo" class="img img-container"> 
    
<div class="form">
    
      
 
        <div class = "col">
    <form method='post' action='login.php'>
        <table><tbody></table><tr><td>
  
    <input type='text' maxlength='16' name='user' class='user space' value='$user' placeholder = 'Username'><br><br>
    </td></tr>
    <tr><td>
    
    <input type='password' maxlength='16' name='pass' class = 'pass space'
    value='$pass' placeholder = 'Password'></td></tr></tbody></table><br>$error
    
    <button type = submit' class= 'login'>LOGIN</button>
    </form></div></div></div>
    </body>
    </html>
    
</body>
</html>

_END;
?>
