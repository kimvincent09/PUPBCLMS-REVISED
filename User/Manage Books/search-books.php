<?php
require_once 'C:\xampp\htdocs\SE\main\header.php';

$Search = $_POST['search'];


echo <<<_END
<style>
.admin-btn{
    left: 10px;
    bottom: 10px;
    position:absolute;
}
.log-tbl{
    background-color: maroon;
    text-align: center;
}
table tr td{
    border: none;
 
}
table{

    width: 100%;
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
    width: 35%;
}

.rec-tbl{
    border: solid;
    background-color:#7e0e09;
    width: 1%;
    font-family: gill sans;
    margin-top: 100px;
}

h4{
    color:white;   
}
table tbody tr td{
    padding: 0px;
}

.space{
  padding: 5px 0px 5px 0px;
}
.stud-tbl2{
    padding-left: 5px;
    background-color: white
}
a{
    color: white;
    text-decoration: none;
}
.button{
    font-size: 15px;
}


</style>

<div class = 'header'>
<center>

<form method = 'post' action = 'search-books.php'>

<input type = 'search' name = 'search' value = '$Search'  placeholder = 'Search books....' class = 'space' style ='position: absolute; top: 45px; right: 220px' size = '30px'>
<input type = 'submit' value = '' style='background-image:url($Searchicononsearchbar); background-size: 30px; padding:5px 15px 5px 15px; position: absolute; top: 45px; right: 220px'>

</form> 
 <br>
 <br>

        <table class = "rec-tbl">
            <tbody>
            <tr>
            <th colspan = 7>
            <img src = $Studentableheader style= 'width: 650px;'>
            </th>
            </tr>
                <th>
                    <h4 style = 'color: yellow'>Author</h4>
                </th>
                <th>
                    <h4 style = 'color: yellow'>Title</h4>
                </th>
                <th>
                    <h4 style = 'color: yellow'>Year</h4>
                </th>
                <th>
                    <h4 style = 'color: yellow'>Topic</h4>
                </th>
                <th colspan = 2>
                    <h4 style = 'color: yellow'>Update</h4>
                </th>
              
              
                
_END;

if($Search == "")
{
    $result = Mysqli_query($connection, "SELECT Title, Year_Published, Name, Last_Name, Topic, Publisher, book.Book_ID FROM book, author, publisher, topic, bookauthor, bookpublisher, booktopic WHERE book.Book_ID = bookauthor.Book_ID AND author.Author_ID = bookauthor.Author_ID AND bookpublisher.Book_ID = book.Book_ID AND bookpublisher.Publisher_ID = publisher.Publisher_ID AND booktopic.Book_ID = book.Book_ID AND booktopic.Topic_ID = topic.Topic_ID ORDER BY book.Book_ID DESC");

$num = $result->num_rows;
   while ($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo " <tr><td class = 'stud-tbl2'>" .$row['Name'] ." ".$row['Last_Name'] . "</td>"." <td class = 'stud-tbl2'><h5>" .$row['Title'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$row['Year_Published'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$row['Topic'] . "</h5></td><td class = 'stud-tbl2'>";
    echo "<a href="."edit-book.php?id=".$row['Book_ID'] ."><img src = $Editiconontable style = 'width: 20px;'></a></td><td class = 'stud-tbl2'><form action = 'export.php'><a href="."del-book.php?id=".$row['Book_ID'] ." onClick=\"return confirm('Are you sure you want to delete?')\"><img src = '$Deleteiconontable' style = 'width: 20px;'></a></form></td></tr>";

}
}
else
{
$res = Mysqli_query($connection, "SELECT Title, Year_Published, Name, Last_Name, Topic, Publisher, book.Book_ID FROM book, author, publisher, topic, bookauthor, bookpublisher, booktopic WHERE book.Book_ID = bookauthor.Book_ID AND author.Author_ID = bookauthor.Author_ID AND bookpublisher.Book_ID = book.Book_ID AND bookpublisher.Publisher_ID = publisher.Publisher_ID AND booktopic.Book_ID = book.Book_ID AND booktopic.Topic_ID = topic.Topic_ID WHERE MATCH(Title, Year_Published, Name, Last_Name, Topic, Publisher, book.Book_ID) AGAINST ('$Search')");
$nums = $res->num_rows;
 while ($rows = $res->fetch_array(MYSQLI_ASSOC)){
    echo " <tr><td class = 'stud-tbl2'>" .$rows['Name'] ." " .$rows['Last_Name']  . "</td>"." <td class = 'stud-tbl2'><h5>" .$rows['Title'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$rows['Year_Published'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$rows['Topic'] . "</h5></td><td class = 'stud-tbl2'>";
    echo "<a href="."edit-book.php?id=".$rows['Book_ID'] ."><img src = $Editiconontable style = 'width: 20px;'> </a></td><td class = 'stud-tbl2'><form action = 'export.php'><a href="."del-book.php?id=".$rows['Book_ID'] ." onClick=\"return confirm('Are you sure you want to delete?')\"><img src = '$Deleteiconontable' style = 'width: 20px;'></a></form></td></tr>";
}
}
                   

echo <<<_END
</tbody>
</table>
<style>
.add{
    background-image: url($Addbookbutton);  background-repeat: no-repeat;
background-size: 100%;
padding: 16px 75px 16px 75px;
position: absolute;
top: 50px;
right: 20px;
border-radius: 10px;
}
.add:hover{
    background-image: url($Addbookbuttonhover);  background-repeat: no-repeat;
background-size: 100%;
padding: 16px 75px 16px 75px;
position: absolute;
top: 50px;
right: 20px;
border-radius: 10px;
}
</style>
<a href = 'book-reg.php'><button class = 'add'></button></a>
_END;
                    ?>