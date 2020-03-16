<?php
require_once 'C:\xampp\htdocs\Software_Engineering\main\header.php';
echo <<<_END
<script>
function checkUser(user)
{
if (user.value == '')
{
O('info').innerHTML = ''
return
}
params = "user=" + user.value
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
$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();
if (isset($_POST['user']))
{
$user = sanitizeString($_POST['user']);
$pass = sanitizeString($_POST['pass']);
if ($user == "" || $pass == "")
$error = "Not all fields were entered<br><br>";
else
{
$result = queryMysql("SELECT * FROM members WHERE user='$user'");
if ($result->num_rows)
$error = "That username already exists<br><br>";
else
{
queryMysql("INSERT INTO members VALUES('$user', '$pass')");
die("<h4>Account created</h4>Please Log in.<br><br>");
}
}
}
echo <<<_END
<style>
.mainbg{
  position: absolute;
  top: 50px;
  right: 330px;
}
.set{
  position: absolute;
  top: 200px;
  right: 430px;
}
.space{
 height: 45px;
}
.lname, .fname, .user, .pass, .bar{
  border-radius: 100px;
  border-width: 5px;
  margin: 5px 0px 5px 0px;
  font-size: 20px;
  padding-left: 5px;
}
.idle{
  position: absolute;
  top: 600px;
  right: 700px;
}
.hover{
  position: absolute;
  top: 600px;
  right: 700px;
}
.hover:hover{
  position: absolute;
  top: 600px;
  right: 700px;
  opacity: 0;
}
.idle1, .login{
  position: absolute;
  top: 600px;
  right: 450px;
}
.login{
  padding: 20px 0px 20px 110px;
  opacity:0;
}
.hover1{
  position: absolute;
  top: 600px;
  right: 450px;
}
.hover1:hover{
  position: absolute;
  top: 600px;
  right: 450px;
  opacity: 0;
}
</style>
    <div class="form">
            <div class = "row">
                <img src = "1200px-Polytechnic_University_of_the_Philippines_Biñan_Logo.svg.png" class="img-container">
             <img src = $Mainbg class = "mainbg">
                <h1>Admin Signup</h1>
                <div class = "col">
<form method='post' action='signup.php'>$error
<table class = "set">
<tbody>
<tr>
<td>
<input type='text' maxlength='16' name='lastname' class='lname' value=''
onBlur='checkUser(this)'>
</td>
</tr>
<tr>
<td>
<input type='text' maxlength='16' name='firstname' class = 'fname'
value=''></span>
</td>
</tr>
<tr class = "space">
<td>
</td>
</tr>
<tr>
<td>
<input type='text' maxlength='16' name='user' class = 'user'
value='$user'>
</td>
</tr>
<tr>
<td>
<input type='text' maxlength='16' name='pass' class = 'pass'
value='$pass'>
</td>
</tr>
<tr class = "space">
<td>
</td>
</tr>
<tr>
<td>
<input type='text' maxlength='16' name='user' class = 'bar'
value='$user'>
</td>
</tr
</tbody>
</table>

<img src = $Savebuttonhover  class = 'idle1'>
<img src = $Savebutton class = 'hover1' >
<input type='submit' value='Sign up' class = 'button login'>
</form></div></div></div>
<img src = $Cancelbuttonhover class = 'idle'>
<img src = $Cancelbutton class = 'hover'>

</body>
</html>
_END;
?>