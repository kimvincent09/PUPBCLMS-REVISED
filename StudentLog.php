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
  
    padding-bottom: 200px;
}
table{

    width: 100%;
    border-top: 1000px;
    border: solid;
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
   background-color: white;
    width: 100%;
    top:20px;
  
}


.stud-tbl{
    width: 68%;
    padding: 0px;
}
.head{
    position: sticky;
    font-family: Gills sans ultra bold;
}
.status{
    position: sticky;
    top: 0px;
}
h4{
    color:black;
}
h3{
    color: yellow;
    font-family: playfair display;
}
th{
    background-color: maroon;
    
}




</style>


  <div>
    <table class = "rec-tbl">
        <tbody class="rec-tbl">
        <tr>
        <th colspan = '2'><img src = '$Librarystatusheader' width='100%' class = 'status'></th></tr>
        <th class = 'head'>
        <h3>Student</h3>
    </th>
    <th class = 'sec head'>
        <h3>Section</h3>
    </th>  
    </tbody></table>
    <table style = "background-color:white;"><tbody>
            
_END;
                $result = queryMysql("SELECT Name, Section FROM students");
                $num = $result->num_rows;
                for ($j = 0 ; $j < $num ; ++$j)
                {
                    $k = $j+1;
                $row = $result->fetch_array(MYSQLI_ASSOC);
                echo " <tr class = 'tr'><td class = 'stud-tbl'><h4>" .$k.". ".$row['Name'] . "</h4></td>"." <td class = 'stud-tbl'><h4>" .$row['Section'] . "</h4></td></tr>";
                } 
                echo <<<_END
                
        </tbody>
    </table>
</div>
</body>
</html>
_END;
?>
