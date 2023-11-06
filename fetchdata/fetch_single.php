<?php
include 'class/configure/config.php';
include 'fetchdata/fetch.php';

if(isset($_POST["room_name"]))
{
 $output = array();
 $statement = $pdo->prepare(
  "SELECT * FROM room 
  WHERE room_name = :room_name 
  LIMIT 1"
 );
 $statement->bindParam(':room_name', $_POST["room_name"]);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["room_name"] = $row["room_name"];

 }
 echo json_encode($output);
}
?>
