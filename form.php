<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">

<title>Scoreboard</title>

<style>

body{
  background-color:pink;
}

table,tr,td{
  border: 1px solid black;
  border-collapse: collapse;
}

div{
  height: fit-content;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif;
}
</style>

</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "database1";


$conn = new mysqli($servername, $username, $password,$dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

$query="SELECT `name`, `score` FROM `table1` ORDER BY score DESC"; 
$result=$conn->query($query); 

if($result){ 
 if ($result->num_rows> 0) {
?>
<div>
<center>
<table>
     <tr>
         <td>Name</td>
          <td>Score</td>
     </tr> 
        <?php 
            while($row = $result->fetch_assoc()) {?>
            <tr>
              <td> <?=$row["name"]?> </td>
              <td> <?=$row["score"]?> </td>
            </tr>
           
           
        <?php }  ?>
 
  </table>
</div> 

<div>
    <button onClick="window.location.reload();">Refresh Page</button>
</div>
</body>
</html>

<?php 
}else{ 
  echo "No record found";
} 
}else{ 
echo "Error in ".$query."
".$conn->error; }

$conn->close();

?>