<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';
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
<body background = '$BG3' style = 'background-repeat: no-repeat; background-size: 100%'>
    <style>
    .table{
        width:680px;
        height: 550px;
        border: none;
    }
    .hidden{
        display: none;
    }
    .set{
   width: 100%; 
    }
tbody tr td{
    border: none;
    }
table tr td {
    text-align: center;
    padding: 10px 0px 10px 0px;
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
    margin-bottom: 0px;
}
.button:hover{
    background-color: red;
}
a{
    text-decoration: none;
    color: white;
}
.right{
    width: 50%;
    padding: 65px 0px 45px 0px;
}
.hover{
    position:relative;
    top: -200px;
}
.idle{
    position:relative;
    top: -20px;
}
.hover:hover {
    opacity:0;
    cursor: pointer;
}
.hover1{
    position:relative;
    top: -380px;
}
.idle1{
    position:relative;
    top: -200px;
}
.hover1:hover {
    opacity:0;
    cursor: pointer;
}
.left{
position: relative;
top: -200px;
right: 0px;
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
    left: -240px;
   background-size: 100%;
    background-image: url('$Navbuttonbg');

}
.back:hover{
    width: 310px;
    height: 163px;
    position: absolute;
    left: 0px;
    background-size: 100%;
    background-image: url('$Navbuttonbg');
}
</style>
<div class = 'back'>

<a href = 'http://127.0.0.1/SE/main/ui.php'><img src = '$Backbutton' class = 'Backbutton'></a>
<a href = 'search-student.php'><img src = '$Homebutton' class = 'Homebutton'></a>
</div>
        <img src = '$Header' style = 'width:100%'>
       
    <table class = "set">
        <tbody>
        <tr>
            <td class="right">  
            <img src = "$Clickedborrowbook" style = "width:400px" class = 'idle'>
            <img src = "$Borrowbook" style = "width:400px" class = 'hover student'>  

</td>
<td class="left" rowspan = '2'>
<center> <iframe class = 'studtbl table hidden' src ='scan-student.php'></iframe></center>
<center> <iframe class = 'bktbl table hidden' src ='search-repository.php'></iframe></center>
</td>
        </tr>
        <tr>
            <td class="right">
              
            <img src = "$Clickedreturnbook" style = "width:400px" class = 'idle1'>
            <img src = "$Returnbook" style = "width:400px" class = 'hover1 book'>
                 
        </td>
      
    </tr>
   
    </tbody>
    </table>
    <script src = 'http://127.0.0.1/SE/user/mngbtn.js'></script>
</body>SSS
</html>
_END;
?>