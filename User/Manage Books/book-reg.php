<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';

// An error message will be displayed if the following variables are empty.
$error = $Last_Name = $Name = $Title = $Publisher = $Year = $Genre = $Barcode = "";
// Check if the value exists in the session
// If true, then the session will be destroyed.
if (isset($_SESSION['Name'])) destroySession();
if (isset($_POST['Name']))
{
$Last_Name = $_POST['Last_Name'];
$Name = $_POST['Name'];
$Title = $_POST['Title'];
$Publisher = $_POST['Publisher'];
$Year = $_POST['Year_Published'];
$Genre = $_POST['Topic'];
$Barcode = $_POST['Barcode'];


if ($Last_Name == "" ||$Name == "" ||$Title == "" ||$Publisher == "" || $Year == "" || $Genre == ""|| $Barcode == "" )
$error = "<span class = 'error' >Not all fields were entered</span><br><br>";


else
{
$result = queryMysql("SELECT Last_Name, Name, Title, Year_Published, Publisher, Topic, Book_ID, Author_ID FROM book NATURAL JOIN author, publisher, topic WHERE Barcode='$Barcode'");
if ($result->num_rows)
$error = "<span class = 'error'>That barcode already exists</span><br><br>";

else
{
    $success = "<span class = 'success'>Student has been added!</span><br><br>";
    
    $sql = "INSERT INTO book(Title, Year_Published, Barcode) VALUES ('$Title', '$Year', '$Barcode')";
    $connection->query($sql);
    $last_id = $connection -> insert_id;


    //Validating if Topic ID already exists. If not, then it will create its unique Topic ID and insert that on two tables
    $result = Mysqli_query($connection, "SELECT Author_ID, Last_Name, Name FROM author WHERE Name = '$Name' AND Last_Name = '$Last_Name'");
    if ($result->num_rows)
     while ($rows = $result->fetch_array(MYSQLI_ASSOC)){
         $Author_ID =$rows['Author_ID'];
       $query = Mysqli_query($connection, "INSERT INTO bookauthor(Book_ID, Author_ID) VALUES ('$last_id','$Author_ID')");
         }
    else{
    $sql1 = Mysqli_query($connection, "INSERT INTO author(Name, Last_Name) VALUES ('$Name', '$Last_Name')");
    $connection->query($sql1);
    $last1_id = $connection -> insert_id;
    queryMysql("INSERT INTO bookauthor(Book_ID, Author_ID) VALUES ('$last_id', '$last1_id')");
    }

    $result = Mysqli_query($connection, "SELECT Topic_ID, Topic FROM topic WHERE Topic = '$Genre'");
    if ($result->num_rows)
     while ($rows = $result->fetch_array(MYSQLI_ASSOC)){
         $Topic_ID =$rows['Topic_ID'];
       $query = Mysqli_query($connection, "INSERT INTO booktopic(Book_ID, Topic_ID) VALUES ('$last_id','$Topic_ID')");
         }
    else{
    $sql2 = Mysqli_query($connection, "INSERT INTO topic(Topic) VALUES ('$Genre')");
    $connection->query($sql2);
    $last2_id = $connection -> insert_id;
    queryMysql("INSERT INTO booktopic(Book_ID, Topic_ID) VALUES ('$last_id', '$last2_id')");
    }

    $result = Mysqli_query($connection, "SELECT Publisher_ID, Publisher FROM publisher WHERE Publisher = '$Publisher'");
    if ($result->num_rows)
     while ($row = $result->fetch_array(MYSQLI_ASSOC)){
         $Publisher_ID =$row['Publisher_ID'];
       $query = Mysqli_query($connection, "INSERT INTO bookpublisher(Book_ID, Publisher_ID) VALUES ('$last_id','$Publisher_ID')");
         }
    else{
    $sql3 = Mysqli_query($connection, "INSERT INTO publisher(Publisher) VALUES ('$Publisher')");
    $connection->query($sql3);
    $last3_id = $connection -> insert_id;
    queryMysql("INSERT INTO bookpublisher(Book_ID, Publisher_ID) VALUES ('$last_id', '$last3_id')");
    }
    

die("<style>
.studentsuccess{
    width: 600px;
    margin-top: 100px;
}
.closebutton{
    position: absolute;
    top: 300px;
    right: 100px;
    width:100px;
}
.closebutton:hover{
    position: absolute;
    top: 300px;
    right: 100px;
    width:100px; 
    opacity:0%;
}
.closebuttonhover{
    position: absolute;
    top: 300px;
    right: 100px;
    width:100px; 
 
}
</style>
<img src = '$Studentsuccess' class = 'studentsuccess'>
<img src = '$Closebuttonhover' class = 'closebuttonhover'>
<a href = 'search-books.php'><img src = '$Closebutton' class = 'closebutton'></a> " );
}
}
}
echo <<<_END
            
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
                        background-image: url( $Savebutton);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 10px 50px 10px 50px;
                        position: absolute;
                        top: 180px;
                        right: -170px;
                        border:none;
                    }
                    .cancel{
                        background-image: url( $Cancelbutton);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 18px 50px 18px 50px;
                        position: absolute;
                        top: 257px;
                        right: 175px;
                        border: none;
                    }
                    .submit:hover{
                        background-image: url( $Savebuttonhover);
                        background-repeat: no-repeat;
                        background-size: 100px;
                        padding: 10px 50px 10px 50px;
                        position: absolute;
                        top: 180px;
                        right: -170px;
                        border:none;
                    }
                    .cancel:hover{
                        background-image: url( $Cancelbuttonhover);
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


      
        <img src = $Addbookform class = "mainform" >
    <form method='post' action='book-reg.php' class = 'form1'>
    <table>
    <tbody>
    <tr>
    <td><input type='text' maxlength='60' name='Title'  id = 'number'
    value='$Title' > </td></tr><tr>
   
    </tr>
    <tr>
    <td>
    <input name='Topic'
    value='$Genre' class = 'right1'> 
    </td>
    </tr>
    <tr>
    <td>
    <input name='Last_Name'
    value='$Last_Name' class = 'right2' >
    </td>
    </tr>
    <tr>
    <td>
    <input name='Name'
    value='$Name'>
    </td>
    <tr>
    <td>
    </td>
    <td>
    <input name='Barcode'
    value='$Barcode' class= 'right3'>
    </td>
    </tr>
    <tr>
    <td>
    <input type='text' maxlength='40' name = 'Publisher' value='$Publisher' class = 'left'>
    </td>
    </tr>
    <tr>
    <td>
    <input type='text' maxlength='40' name = 'Year_Published' value='$Year' size = 4 class = 'left1'>
    </td>
    </tr>

    <tr>
    <td>
    
    <input type='submit' value='' class = 'submit'></td></tr></tbody></table>
    </form></div>
    <a href = "search-books.php"> <button class = "cancel" ></button></a>
  <center>  $error</center>
    </body>
_END;

?>