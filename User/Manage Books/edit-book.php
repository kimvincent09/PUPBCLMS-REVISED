<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';


 
$error = $Name = $Title = $Year = $Publisher = $Genre = $Last_Name = $Barcode = "";
if (isset($_SESSION['Name'])) destroySession();
if (isset($_POST['update']))
{
$id = $_POST['Book_ID'];
$Name = $_POST['Name'];
$Last_Name = $_POST['Last_Name'];
$Title = $_POST['Title'];
$Year = $_POST['Year_Published'];
$Genre = $_POST['Topic'];
$Publisher = $_POST['Publisher'];
$Barcode = $_POST['Barcode'];

if ($Name == "" ||$Last_Name == "" || $Title == "" || $Year == ""|| $Genre == "" || $Publisher == "" ||$Barcode == "" )
$error = "<span class = 'error' >Not all fields were entered</span><br><br>";

     else {    
        //updating the table
        $result = mysqli_query($connection, "UPDATE book INNER JOIN author, publisher, topic USING (Book_ID) SET Name='$Name', Last_Name ='$Last_Name', Title ='$Title', Year = '$Year', Genre= '$Genre', Publisher='$Publisher', Barcode = '$Barcode'  WHERE Book_ID ='$id'");
        
        //redirectig to the display pTitle. In our case, it is index.php
        header("Location: search-books.php");
    }
}
?>
<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = queryMysql("SELECT Last_Name, Name, Title, Year_Published, Publisher, Topic, Book_ID, Barcode FROM book NATURAL JOIN author, publisher, topic WHERE Book_ID = '$id'");

while($res = mysqli_fetch_array($result))
{
    $Name = $res['Name'];
    $Last_Name = $res['Last_Name'];
    $Title = $res['Title'];
    $Year = $res['Year_Published'];
    $Genre = $res['Topic'];
    $Publisher = $res['Publisher'];
    $Barcode = $res['Barcode'];

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
                top: 68px;
                left: 147px;
                    }
                    .submit{
                        background-image: url(<?php echo $Savebutton ?>);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 10px 50px 10px 50px;
                        position: absolute;
                        top: 180px;
                        right: -170px;
                        border:none;
                    }
                    .cancel{
                        background-image: url( <?php echo $Cancelbutton?>);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 18px 50px 18px 50px;
                        position: absolute;
                        top: 257px;
                        right: 175px;
                        border: none;
                    }
                    .submit:hover{
                        background-image: url( <?php echo $Savebuttonhover ?>);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 10px 50px 10px 50px;
                        position: absolute;
                        top: 180px;
                        right: -170px;
                        border:none;
                    }
                    .cancel:hover{
                        background-image: url(<?php echo $Cancelbuttonhover ?>);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 18px 50px 18px 50px;
                        position: absolute;
                        top: 257px;
                        right: 175px;
                        border: none;
                    }
                    .mainform{
                        width:100%;
                    }
                    .right1{
                        position: relative;
                        left: 280px;
                        top: 35px; 
                    }
                    .right2{
                        position: relative
                        margin-left: 12px;
                        margin-top: 25px;
                    }
                    .right3{
                        position: relative;
                        left: 128px;
                        top: -40px;
                  
                    }
                    .right4{
                        position: absolute;
                        top: 95px;
                        left: 283px;
                     
                    }
                    .left{
                      position: relative;
                      top: -25px;
                      left: 0px;
                    }
                    input{
                        padding-left: 5px;
                        border-radius: 10px;
                        margin-top: 8px;
                    }
                    .left1{
                        position: relative;
                        top: -30px;
                        left: 40px;
                    }

                 
    </style>


      
        <img src = <?php echo $Addbookform?> class = "mainform" >
    <form method='post' action='edit-book.php' class = 'form1'>
    <table>
    <tbody>
    <tr>
    <td><input type='text' maxlength='60' name='Title'  id = 'number'
    value='<?php echo $Title ?>' > </td></tr><tr>
   
    </tr>
    <tr>
    <td>
    <input name='Topic'
    value='<?php echo $Genre?>' class = 'right1'> 
    </td>
    </tr>
    <tr>
    <td>
    <input name='Last_Name'
    value='<?php echo $Last_Name?>' class = 'right2' >
    </td>
    </tr>
    <tr>
    <td>
    <input name='Name'
    value='<?php echo $Name?>'>
    </td>
    <tr>
    <td>
    </td>
    <td>
    <input name='Barcode'
    value='<?php echo $Barcode ?>' class= 'right3'>
    </td>
    </tr>
    <tr>
    <td>
    <input type='text' maxlength='40' name = 'Publisher' value='<?php echo $Publisher?>' class = 'left'>
    </td>
    </tr>
    <tr>
    <td>
    <input type='text' maxlength='40' name = 'Year_Published' value='<?php echo $Year?>' size = 4 class = 'left1'>
    </td>
    </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update"  value = "" class = "submit"></td>
            </tr>
        
        </table>
        
    </form>
    <a href = "search-books.php"> <button class = "cancel" ></button></a>
</body>
</html>