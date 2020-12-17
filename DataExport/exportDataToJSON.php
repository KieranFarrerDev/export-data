<?php
//include database configuration file
include 'dbh.inc.php';

//get records from database
$query = $conn->query("SELECT * FROM data_export_test ORDER BY id");

//pushes query result into assoc array
$i = 0;
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
      $new_array['data'] = $row;
      //removes 'id' from array
      unset($new_array[$i]['id']);
$i++;
 }
}

//JSON conversion
$jsonData = json_encode($new_array);
echo $jsonData."\n"

?>
