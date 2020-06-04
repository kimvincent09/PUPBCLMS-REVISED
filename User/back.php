<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';
echo <<<_END
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

<a href = 'search-student.php'><img src = '$Backbutton' class = 'Backbutton'></a>
<a href = 'search-student.php'><img src = '$Homebutton' class = 'Homebutton'></a>
</div>
_END;
?>