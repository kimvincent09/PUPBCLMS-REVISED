<?php
require_once 'C:\xampp\htdocs\Software_Engineering\main\header.php';
$error = $user = $pass = "";
if (isset($_POST['User']))
{
$user = sanitizeString($_POST['User']);
$pass = sanitizeString($_POST['Password']);
if ($user == "" || $pass == "")
$error = "<span class='error'>Not all fields were entered</span><br><br>";
else
{
$result = queryMySQL("SELECT User,Password FROM admin
WHERE User='$user' AND Password='$pass'");
if ($result->num_rows == 0)
{
$error = "<span class='error'>Username/Password
invalid</span><br><br>";
}
else
{
$_SESSION['User'] = $user;
$_SESSION['Password'] = $pass;
die("You are now logged in. Please <a href='$Main'>" .
"click here</a> to continue.<br><br>");
}
}
}
echo <<<_END
<script>
function checkUser(Name)
{
if (Name.value == '')
{
O('info').innerHTML = ''
return
}
params = "Name=" + Name.value
request = new ajaxRequest()
request.open("POST", "checkuser.php", true)
request.setRequestHeader("Content-type",
"application/x-www-form-urlencoded")
request.setRequestHeader("Content-length", params.length)
request.setRequestHeader("Connection", "close")
request.onreadystatechange = function()
{
if (this.readyState == 4)
if (this.status == 200)
if (this.responseText != null)
O('info').innerHTML = this.responseText
}
request.send(params)
}
function ajaxRequest()
{
try { var request = new XMLHttpRequest() }
catch(e1) {
try { request = new ActiveXObject("Msxml2.XMLHTTP") }
catch(e2) {
try { request = new ActiveXObject("Microsoft.XMLHTTP") }
catch(e3) {
request = false
} } }
return request
}
</script>
_END;
$error = $Name = $Sec = "";
if (isset($_SESSION['Name'])) destroySession();
if (isset($_POST['Name']))
{
$Name = sanitizeString($_POST['Name']);
$Sec = sanitizeString($_POST['Sec']);
$Number = sanitizeString($_POST['Number']);
if ($Name == "" || $Sec == "" || $Number == "")
$error = "Not all fields were entered<br><br>";


else
{
$result = queryMysql("SELECT * FROM student WHERE Number='$Number'");
if ($result->num_rows)
$error = "That student number already exists<br><br>";

else
{
queryMysql("INSERT INTO student VALUES('$Number')");
die("<div class = 'header'>
<img src = '$PUPLogo' class='img-container'>
<h1>PUPBC Library Management System</h1>
<h3>Student Registration</h3></div>
<div class='form'>
<div class = 'row'>
<center>
<div class = 'col'>
<form method='post' action='signup.php'>$error
<label>Fullname:</label>
<input type='text' maxlength='40' name='Name' class='User' value='$Name'
onBlur='checkUser(this)'><br><br>
<label>Course/Sec:</label>
<input type='text' maxlength='16' name='Sec' class = 'Password'
value='$Sec'></span>
<br><br>
<label>Student no.:</label>
<input type='text' maxlength='16' name='Number' class = 'User'
value='$Sec'></div></center><br>


<input type='submit' value='Register' class = 'button login'>
</form></div></div></div>
</body>
</html>
_END;");
}
}
}
echo <<<_END

<style>
.admin-hover{
    right: 150px;
    bottom: 40px;
    position:absolute;
    cursor: pointer;
}
.admin-btn{
    right: 150px;
    bottom: 40px;
    position:absolute;
    cursor: pointer;
}
.admin-btn:hover{
   opacity: 0;
}

.log-tbl{
    
    text-align: center;
}
table tr td{
    border: none;
    padding-bottom: 200px;
}
table{

    width: 80%;
    margin-top: 20px;
}
.ads{
    color: black;
}

.row{
    padding: 0;
}
.col, .user{
    margin: 0px;
}
.stud{
    width: 40%;
}
tbody tr td{
    text-align: none;
}
.rec-tbl{
    border: solid;
    background-color:black;
    width:270px;
    margin-left: 130px;
}

h4{
    color:white;   
}
table tbody tr td{
    padding: 0px;
}
.stud-tbl{
    width: 70%;
    padding: 0px;
}
.sec{
  width: 35%;
  
}
.space{
  padding: 5px 10px 5px 0px;
}
iframe{
  height: 310px;
  padding: 0px;
  margin: 0px;
  border: 0px;
  width: 600px;
}
.loginbox{
    position: absolute;
    top: 150px;
    width: 450px;
    height: 340px;
    text-align: center;
    left: 480px;
    background-image: url('$Adminloginpanel2');
    background-size: 100%;
    padding-top: 240px;
}
.space{
    padding: 10px 30px 10px 30px;
    border-radius: 100px;
    font-family: Gill Sans Ultra Bold;
    font-size: 20px;
    font-weight: bolder;
    border: solid;   
}
.login{
    opacity: 0%;
}
.hidden{
    display: none;
}

</style>

<body background = '$Bg2' style = 'background-repeat: no-repeat; background-size: 100%'>
<img src = '$Header' width= '100%'>
       <center>
    <div class = 'loginbox hidden' >  
    <div class = "col">
    <form method='post' action='login.php'>$error
        <table><tbody></table><tr><td>
    <input type='text' maxlength='16' name='User' class='user space' placeholder = 'Username'><br><br>
    </td></tr>
    <tr><td>
    <input type='password' maxlength='16' name='Password' class = 'user space' placeholder = 'Password'
 ></td></tr></tbody></table></div></span>
    
    
    <input type='submit' value='Login' class = 'button login'>
    </form></div>
</div>

      <table>
          <tbody>
              <tr>
              <td id="ads" class="log-tbl ">
              <img src = "$Scanid"  style="width: 300px">
          </td>
                  <td class="log-tbl stud">
     </div>
    <div class = "row">
        <div class = "col">
    
   
    <iframe src = 'StudentLog.php'></iframe>
  
</td>
   
</tr></tbody></table>
<img class = "admin-hover" src='$Adminloginhover' width= '200px'>
<img class = "admin-btn" src='$Adminlogin' width= '200px'>

<script src = 'adminbtn.js'></script>
</body>
</html>
_END;
?>