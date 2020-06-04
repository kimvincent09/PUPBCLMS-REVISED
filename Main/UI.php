<?php
require_once 'header.php';
echo <<<_END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href= "stylesheet" href="style.css">
</head>
<body background = '$Bg3' style = 'background-repeat: no-repeat; background-size: 100%'>
    <style>
        .set{
   align-content: center;
   width: 100%;
}
tbody tr td{
    border: none;
    
    }
table tr td {
    text-align: center;
    padding: none;  
}
h1{
    color: white;
    display: none;
}
.button{
    background-color:black;
    color: white;
    border-width: 1px;
    cursor: pointer;
    padding: 8px;
    margin-bottom: 100px;
}
.button:hover{
    background-color: red;
}
a{
    text-decoration: none;
    color: white;
}
.hover{
    position:;
    top: 0px;
}
.idle{
    position:relative;
    top: -150px;
}
.idle:hover {
    opacity:0;
}
.hover2{
    position:relative;
    top: -150px;
}
.idle2{
    position:relative;
    top: -300px;
}
.idle2:hover{
    opacity: 0;
}
.idle3:hover{
    opacity: 0;
}
.hover3{
    position:relative;
    top: -300px;
}
.idle3{
    position:relative;
    top: -450px;
}
        </style>
<style>
.Backbutton{
position: relative;
width: 80px;
top: 45px;
left: 150px;
background-size: 100%;
background-image: url('$Backbutton');
}
.Backbutton:hover{
position: relative;
width: 80px;
top: 45px;
left: 150px;
background-size: 100%;
background-image: url('$Backbuttonhover');
}
.Homebutton{
position: relative;
width: 80px;
top: 45px;
left: -65px;
background-size: 100%;
background-image: url('$Homebutton');
}
.Homebutton:hover{
    position: relative;
    width: 80px;
    top: 45px;
    left: -65px;
    background-size: 100%;
    background-image: url('$Homebuttonhover');
}
.back{
    width: 310px;
    height: 163px;
    position: absolute;
    top: 0px;
    left: -240px;
   background-size: 100%;
    background-image: url('$Navbuttonbg');

}
.back:hover{
    width: 310px;
    height: 163px;
    position: absolute;
    top: 0px;
    left: 0px;
    background-size: 100%;
    background-image: url('$Navbuttonbg');
}
</style>


        <img src = '$Header' style = 'width:100%'>
       
    <table class = "set">
        <tbody>
        <tr>
            <td class="right">
            <a href="http://127.0.0.1/SE/user/BR Books/br-manager.php">
<img src = "$Borrowreturnbuttonhover" style = "width:50%"  class = "hover">
<img src = "$Borrowreturnbutton" style = "width:50%" class = "idle">
</a>
</td>
<td class="left">
<a href="http://127.0.0.1/SE/user/Manage Users/library-manager.php">
        <img src = "$Manageusersbuttonhover" style = "width:50%"  class = "hover">
        <img src = "$Manageusersbutton" style = "width:50%" class = "idle">
        </a>
</td>
        </tr>
        <tr>
            <td class="right">
                <a href= $booklist>
                    <img src = "$Bookstatuslogsbuttonhover" style = "width:50%"  class = "hover2">
                    <img src = "$Bookstatuslogsbutton" style = "width:50%" class = "idle2">
                    </a>
        </td>
        <td class="left">
        <a href= $bookmanager>
                <img src = "$Managebooksbuttonhover" style = "width:50%"  class = "hover2">
                <img src = "$Managebooksbutton" style = "width:50%" class = "idle2">
                </a>
        </td>
    </tr>
    <tr>
      
        <td class="left">
            <a href="index.html">
                <img src = "$Searchbooksbuttonhover" style = "width:50%"  class = "hover3">
                <img src = "$Searchbooksbutton" style = "width:50%" class = "idle3">
                </a>
</td>        
</tr>
    </tbody>
    </table>
    <div class = 'back'>

<a href = 'search-student.php'><img src = '$Backbutton' class = 'Backbutton'></a>
<a href = 'search-student.php'><img src = '$Homebutton' class = 'Homebutton'></a>
</div>
</body>
</html>
_END;
?>