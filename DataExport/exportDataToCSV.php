<?php
//include database configuration file
include 'dbh.inc.php';

//get records from database
$query = $conn->query("SELECT * FROM data_export_test ORDER BY id");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "Exmato_export" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('Title', 'Description', 'Owner', 'Date', 'Status', 'Notes');
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $lineData = array($row['Title'], $row['Description'], $row['Owner'], $row['Date'], $row['Status'], $row['Notes']);
        fputcsv($f, $lineData, $delimiter);
    }

    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>
