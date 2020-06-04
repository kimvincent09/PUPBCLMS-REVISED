<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';


 
$error = $Last_Name = $Name = $Title = $Publisher = $Year = $Genre = $Link = "";
if (isset($_SESSION['Name'])) destroySession();
if (isset($_POST['update']))
{
    $Last_Name = $_POST['Last_Name'];
    $Name = $_POST['Name'];
    $Title = $_POST['Title'];
    $Publisher = $_POST['Publisher'];
    $Year = $_POST['Year'];
    $Genre = $_POST['Genre'];
    $Link = $_POST['Link'];
    

    if ($Last_Name == "" ||$Name == "" ||$Title == "" ||$Publisher == "" || $Year == "" || $Genre == ""|| $Link == "" )
    $error = "<span class = 'error' >Not all fields were entered</span><br><br>";

     else {    
        //updating the table
        $result = mysqli_query($connection, "UPDATE repository SET Name='$Name', Last_Name ='$Last_Name', Title= '$Title', Publisher='$Publisher', Year = '$Year', Genre = '$Genre', Link = '$Link' WHERE id ='$id'");
        
        //redirectig to the display pCourse. In our case, it is index.php
        header("Location: search-repository.php");
    }
}
?>
<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM repository WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $Name = $res['Name'];
    $Last_Name = $res['Last_Name'];
    $Title = $res['Title'];
    $Publisher = $res['Publisher'];
    $Year = $res['Year'];
    $Genre = $res['Genre'];
    $Link = $res['Link'];

}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
<style>
       a{
        color: white;
        text-decoration: none;
    }
    .button{
        font-size: 15px;
    }
    .pad{
        padding: 1px 75px 1px 0px;
    }
    .pad1{
        padding: 1px 120px 1px 0px;
    }

            a{
                color: white;
                text-decoration: none;
            }
            .button{
                font-size: 15px;
            }
            .pad{
                padding: 1px 75px 1px 0px;
            }
            .pad1{
                padding: 1px 120px 1px 0px;
            }
            .form1{
                position: absolute;
                top: 148px;
                left: 227px;
                    }
                    .submit{
                        background-image: url(<?php echo $Savebutton?>);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 10px 50px 10px 50px;
                        position: absolute;
                        top: 310px;
                        right: 15px;
                        border:none;
                    }
                    .cancel{
                        background-image: url( <?php echo $Cancelbutton?>);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 18px 50px 18px 50px;
                        position: absolute;
                        top: 467px;
                        right: 415px;
                        border: none;
                    }
                    .submit:hover{
                        background-image: url(<?php echo $Savebuttonhover ?>);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 10px 50px 10px 50px;
                        position: absolute;
                        top: 310px;
                        right: 15px;
                        border:none;
                    }
                    .cancel:hover{
                        background-image: url(<?php echo $Cancelbuttonhover?>);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 18px 50px 18px 50px;
                        position: absolute;
                        top: 467px;
                        right: 415px;
                        border: none;
                    }
                    .mainform{
                        width:75%;
                    }
                    .right1{
                        margin-left: 150px;
                    }
                    .right2{
                        margin-left: 110px;
                        margin-top: 5px;
                    }
                    .right3{
                        margin-left: 200px;
                  
                    }
                    .right4{
                        position: absolute;
                        top: 95px;
                        left: 283px;
                     
                    }
                    .left{
                      margin-top: 10px;
                    }
                    input{
                        padding-left: 5px;
                        border-radius: 10px;
                        margin-top: 10px;
                    }
                    .left{
                        margin-top: 50px;
                    }
    </style>
    <br/><br/>
    <img src =<?php echo $Editadminform?> class = "mainform" >
    <form Name="form1" method="post" action="edit-repository.php" class = "form1">
        <table border="0">
     
        <tbody>
    <tr>
    <td>
    <input type='text' maxlength='40' name = 'Last_Name' value="<?php echo $Last_Name;?>">
</td>
    </tr>
    <tr>
    <td><input type='text' maxlength='40' name='Name'value="<?php echo $Name;?>"></td>  
    
    </tr>
    <tr>
    <td><input type='text' name = 'Title' maxlength='40'  value="<?php echo $Title;?>" class = 'left' ></td>
    </tr>
    <tr>
    <td><input type='text' maxlength='16' name='Publisher'   value="<?php echo $Publisher;?>" > </td>
    </tr>
    <tr>
    <td><input type='text' maxlength='16' name='Year'    value="<?php echo $Year;?>" class = 'left'> </td>
    </tr>
    <tr>
    <td><input type='text' maxlength='16' name='Genre'    value="<?php echo $Genre;?>" class = 'left'> </td>
    </tr>
    <tr>
    <td><input type='text' maxlength='16' name='Link'    value="<?php echo $Link;?>" class = 'left'> </td>
    </tr>

            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update"  value = "" class = "submit"></td>
            </tr>
        
        </table>
        
    </form>
    <a href = "search-repository.php"> <button class = "cancel" ></button></a>
</body>
</html>