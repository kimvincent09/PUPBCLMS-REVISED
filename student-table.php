<?php
require_once 'C:\xampp\htdocs\Software_Engineering\main\header.php';
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
    padding-bottom: 200px;
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
    background-color:#f10000;
    width: 100%;
}
h4{
    color:white;   
}
table tbody tr td{
    padding: 0px;
}

.space{
  padding: 5px 10px 5px 0px;
}
.stud-tbl2{
    padding-left: 2px;
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
        <table class = "rec-tbl">
            <tbody class="rec-tbl">
                <th>
                    <h4>Student</h4>
                </th>
                <th>
                    <h4>Course</h4>
                </th>
                <th>
                    <h4>Year</h4>
                </th>
                <th>
                    <h4>Section</h4>
                </th>
                <th>
                    <h4>Student Number</h4>
                </th>
              
                
_END;
                    $result = queryMysql("SELECT Name, Course, Year, Section, Student_Number FROM students");
                    $num = $result->num_rows;
                    for ($j = 0 ; $j < $num ; ++$j)
                    {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    echo " <tr><td class = 'stud-tbl2'>" .$row['Name'] . "</td>"." <td><h5>" .$row['Course'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$row['Year'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$row['Section'] . "</h5></td><td class = 'stud-tbl2'><h5>" .$row['Student_Number'] . "</h5></td></tr>";
                    } 

                    echo <<<_END
</tbody>
</table>
_END;
                    ?>