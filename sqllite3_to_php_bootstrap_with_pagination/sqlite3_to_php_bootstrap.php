<?php
$connection = new SQLite3('my_history.db');
// Makes query with rowid
$query = "SELECT rowid, * FROM history";
$result= $connection->query($query)
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sample SQL Lite Data Praser   </title>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<style>
	  .table-condensed{
		font-size: 10px;
		}
   </style>
  </head>
<body>
	<div class="container"> 
	<input class="form-control" id="myInput" type="text" placeholder="Filter By..">
  	<br>
        <table id="example" class="table table-bordered table-striped">
            <thead class="thead-dark">
                <td>CL</td>
                <td>UName</td>
            </th>
	    <tbody id="myTable"> 
            <?php while($row = $result->fetchArray()) {?>
            <tr class="table-light">
                <td><?php echo $row['CL'];?></td>
                <td><?php echo $row['UName'];?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>
