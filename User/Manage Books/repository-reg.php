<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';


$error = $Last_Name = $Name = $Title = $Publisher = $Year = $Genre = $Link = "";
if (isset($_SESSION['Name'])) destroySession();
if (isset($_POST['Name']))
{
$Last_Name = $_POST['Last_Name'];
$Name = $_POST['Name'];
$Title = $_POST['Title'];
$Publisher = $_POST['Publisher'];
$Year = $_POST['Year_Published'];
$Genre = $_POST['Topic'];
$Link = $_POST['Link'];


if ($Last_Name == "" ||$Name == "" ||$Title == "" ||$Publisher == "" || $Year == "" || $Genre == ""|| $Link == "" )
$error = "<span class = 'error' >Not all fields were entered</span><br><br>";


else
{
    $result = Mysqli_query($connection, "SELECT Last_Name, Name, Title, Year_Published, Topic, Publisher, Link, Olr_ID FROM olr NATURAL JOIN author, topic, publisher ORDER BY Olr_ID DESC");
if ($result->num_rows)
$error = "<span class = 'error'>That Link already exists</span><br><br>";

else
{
    $success = "<span class = 'success'>Student has been added!</span><br><br>";
    
    $sql = "INSERT INTO olr(Title, Year_Published, Link) VALUES ('$Title', '$Year', '$Link')";
    $connection->query($sql);
    $last_id = $connection -> insert_id;


    //Validating if Topic ID already exists. If not, then it will create its unique Topic ID and insert that on two tables
    $result = Mysqli_query($connection, "SELECT Author_ID, Last_Name, Name FROM author WHERE Name = '$Name' AND Last_Name = '$Last_Name'");
    if ($result->num_rows)
     while ($rows = $result->fetch_array(MYSQLI_ASSOC)){
         $Author_ID =$rows['Author_ID'];
       $query = Mysqli_query($connection, "INSERT INTO olra(Olr_ID, Author_ID) VALUES ('$last_id','$Author_ID')");
         }
    else{
    $sql1 = Mysqli_query($connection, "INSERT INTO author(Name, Last_Name) VALUES ('$Name', '$Last_Name')");
    $connection->query($sql1);
    $last1_id = $connection -> insert_id;
    queryMysql("INSERT INTO olra(Olr_ID, Author_ID) VALUES ('$last_id', '$last1_id')");
    }

    $result = Mysqli_query($connection, "SELECT Topic_ID, Topic FROM topic WHERE Topic = '$Genre'");
    if ($result->num_rows)
     while ($rows = $result->fetch_array(MYSQLI_ASSOC)){
         $Topic_ID =$rows['Topic_ID'];
       $query = Mysqli_query($connection, "INSERT INTO olrt(Olr_ID, Topic_ID) VALUES ('$last_id','$Topic_ID')");
         }
    else{
    $sql2 = Mysqli_query($connection, "INSERT INTO topic(Topic) VALUES ('$Genre')");
    $connection->query($sql2);
    $last2_id = $connection -> insert_id;
    queryMysql("INSERT INTO olrt(Olr_ID, Topic_ID) VALUES ('$last_id', '$last2_id')");
    }

    $result = Mysqli_query($connection, "SELECT Publisher_ID, Publisher FROM publisher WHERE Publisher = '$Publisher'");
    if ($result->num_rows)
     while ($row = $result->fetch_array(MYSQLI_ASSOC)){
         $Publisher_ID =$row['Publisher_ID'];
       $query = Mysqli_query($connection, "INSERT INTO olrp(Olr_ID, Publisher_ID) VALUES ('$last_id','$Publisher_ID')");
         }
    else{
    $sql3 = Mysqli_query($connection, "INSERT INTO publisher(Publisher) VALUES ('$Publisher')");
    $connection->query($sql3);
    $last3_id = $connection -> insert_id;
    queryMysql("INSERT INTO olrp(Olr_ID, Publisher_ID) VALUES ('$last_id', '$last3_id')");
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
                    .right{
                        position: relative;
                        left: 105px;
                    }
                    .right1{
                        position: relative;
                        left: 280px;
                        top: 35px; 
                    }
                    .right2{
                        position: relative;
                        left: 190px;
                        top: 15px;
                    }
                    .right3{
                        position: relative;
                        left: 300px;
                        top: 25px;
                  
                    }
                    .right4{
                        position: relative;
                        top:0px;
                        left: 95px;
                     
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
                        left: -55px;
                    }

                 
    </style>


      
        <img src = $Addolrform class = "mainform" >
    <form method='post' action='repository-reg.php' class = 'form1'>
    <table>
    <tbody>
    <tr>
    <td><input type='text' maxlength='40' name='Title'  id = 'number'
    value='$Title' class='left1' > </td>
    <td>
    <input name='Topic'
    value='$Genre' class= 'right'> 
    </td>
    </tr><tr>
    <td>
    <input name='Publisher'
    value='$Publisher' class= 'right3'>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td>
    <input type='text' maxlength='40' name = 'Year_Published' value='$Year' class = 'right2' size = 4  >
    </td>
    </tr>
    <tr>
    <td>
    <input name='Last_Name' value='$Last_Name'>
    </td>
    </tr>
    <tr>
    <td>
    <input name='Name'
    value='$Name'  ></td>
    <td>
    <input type='text' name = 'Link' value='$Link' class = 'right4'>
    </td>
    </tr>
   

    <tr>
    <td>
    <input type='submit' value='' class = 'submit'></td></tr></tbody></table>
    </form></div>
    <a href = "search-repository.php"> <button class = "cancel" ></button></a>
  <center>  $error</center>
    </body>
_END;

?>