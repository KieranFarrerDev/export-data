<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

  <div class="container">
      <div class="panel panel-default">
          <div class="panel-heading">
            Data to export:
          </div>
          <div class="panel-body">
            <br>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Owner</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th>id</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                      //include database configuration file
                      include 'dbh.inc.php';

                      //get records from database
                      $query = $conn->query("SELECT * FROM data_export_test ORDER BY id");
                      if($query->num_rows > 0){
                          while($row = $query->fetch_assoc()){ ?>
                      <tr>
                        <td><?php echo $row['Title']; ?></td>
                        <td><?php echo $row['Description']; ?></td>
                        <td><?php echo $row['Owner']; ?></td>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['Status']?></td>
                        <td><?php echo $row['Notes']?></td>
                        <td><?php echo $row['id']?></td>
                      </tr>
                      <?php } }else{ ?>
                      <tr><td colspan="5">No member(s) found.....</td></tr>
                      <?php } ?>
                  </tbody>
              </table>
              <br>
              <a href="exportDataToCSV.php" class="btn btn-success pull-right">Export as CSV</a>
              <a href="exportDataToJSON.php" class="btn btn-success pull-right">Export as JSON</a>
              <a href="exportDataToYAML.php" class="btn btn-success pull-right">Export as YAML</a>
          </div>
      </div>
</div>

</body>
</html>
