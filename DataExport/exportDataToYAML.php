<?php
//include database configuration file
include 'dbh.inc.php';

//get records from database
$query = $conn->query("SELECT * FROM data_export_test ORDER BY id DESC");

//pushes query result into assoc array
$i = 0;
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
      $new_array[] = $row;
      //removes 'id' from array
      unset($new_array[$i]['id']);
$i++;
 }
}

//JSON conversion
var_dump(yaml_parse($new_array));

?>
