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

.button{
    font-size: 15px;
}


</style>

<div class = 'header'>
<center>

<form method = 'post' action = 'search-repository.php'>

<input type = 'search' name = 'search' value = '$Search'  placeholder = 'Search repository....' class = 'space' style ='position: absolute; top: 45px; right: 220px' size = '30px'>
<input type = 'submit' value = '' style='background-image:url($Searchicononsearchbar); background-size: 30px; padding:5px 15px 5px 15px; position: absolute; top: 45px; right: 220px'>

</form> 
 <br>
 <br>

        <table class = "rec-tbl">
            <tbody>
            <tr>
            <th colspan = 7>
            <img src = $Olrtableheader style= 'width: 650px;'>
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
                <th>
                    <h4 style = 'color: yellow'>Download</h4>
                </th>
                <th colspan = 2>
                    <h4 style = 'color: yellow'>Update</h4>
                </th>
              
              
                
_END;

if($Search == "")
{
    $result = Mysqli_query($connection, "SELECT Title, Year_Published, Name, Last_Name, Topic, Publisher, Link, olr.Olr_ID FROM olr, author, publisher, topic, olra, olrp, olrt WHERE olr.Olr_ID = olra.Olr_ID AND author.Author_ID = olra.Author_ID AND olrp.Olr_ID = olr.Olr_ID AND olrp.Publisher_ID = publisher.Publisher_ID AND olrt.Olr_ID = olr.Olr_ID AND olrt.Topic_ID = topic.Topic_ID ORDER BY olr.Olr_ID DESC");

$num = $result->num_rows;
   while ($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo " <tr><td class = 'stud-tbl2'>" .$row['Name'] ." ".$row['Last_Name'] . "</td>"." <td class = 'stud-tbl2'><h5>" .$row['Title'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$row['Year_Published'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$row['Topic'] . "</h5></td><td class = 'stud-tbl2'><a href= " .$row['Link'] . ">Download here</a></td><td class = 'stud-tbl2'>";
    echo "<a href="."edit-repository.php?id=".$row['Olr_ID'] ."><img src = $Editiconontable style = 'width: 20px;'></a></td><td class = 'stud-tbl2'><form action = 'export.php'><a href="."del-repository.php?id=".$row['Olr_ID'] ." onClick=\"return confirm('Are you sure you want to delete?')\"><img src = '$Deleteiconontable' style = 'width: 20px;'></a></form></td></tr>";

}
}
else
{
$res = queryMysql("SELECT Last_Name, Name, Title, Year_Published, Topic, Publisher, Link, Olr_ID  FROM olr NATURAL JOIN author, topic, publisher WHERE MATCH (Last_Name, Name) AGAINST ('$Search')");
$nums = $res->num_rows;
 while ($rows = $res->fetch_array(MYSQLI_ASSOC)){
    echo " <tr><td class = 'stud-tbl2'>" .$rows['Name'] ." ".$rows['Last_Name'] . "</td>"." <td class = 'stud-tbl2'><h5>" .$rows['Title'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$rows['Year'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$rows['Topic'] . "</h5></td><td class = 'stud-tbl2'><a href= " .$rows['Link'] . ">Download here</a></td><td class = 'stud-tbl2'>";
    echo "<a href="."edit-repository.php?id=".$rows['Olr_ID'] ."><img src = $Editiconontable style = 'width: 20px;'> </a></td><td class = 'stud-tbl2'><form action = 'export.php'><a href="."del-repository.php?id=".$rows['Olr_ID'] ." onClick=\"return confirm('Are you sure you want to delete?')\"><img src = '$Deleteiconontable' style = 'width: 20px;'></a></form></td></tr>";
}
}
                   

                    echo <<<_END
</tbody>
</table>
<style>
.add{
    background-image: url($Addolrbutton);  background-repeat: no-repeat;
background-size: 100%;
padding: 16px 75px 16px 75px;
position: absolute;
top: 50px;
right: 20px;
border-radius: 10px;
}
.add:hover{
    background-image: url($Addolrbuttonhover);  background-repeat: no-repeat;
background-size: 100%;
padding: 16px 75px 16px 75px;
position: absolute;
top: 50px;
right: 20px;
border-radius: 10px;
}
</style>
<a href = 'repository-reg.php'><button class = 'add'></button></a>
_END;
                    ?>