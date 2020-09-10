<?php



$connection = new SQLite3('hedgefund_data.db');

if (isset($_POST['fromdate']) ) {

	$f = $_POST['fromdate']; 

	$t = $_POST['todate'];

	// Makes query with dates 
	$timestamp = strtotime($f);
 
	// Creating new date format from that timestamp
	$fromdate = date("m/d/Y", $timestamp);
	// Makes query with dates 
	$timestamp = strtotime($t);
 
	// Creating new date format from that timestamp
	$todate = date("m/d/Y", $timestamp);

	$result= $connection->query('SELECT * FROM hedge_fund_data WHERE Date BETWEEN "' . $fromdate .'" and "' .$todate . '" ' );

}

if (isset($_POST['direction']) ) {

	$direction = $_POST['direction']; 

	$direction =str_replace(' ', '', $direction);

	// Makes query with direction 

	$result= $connection->query('SELECT * FROM hedge_fund_data WHERE direction="' . $direction . '" ');
	
}

if (isset($_POST['ticker']) ) {

	$ticker = $_POST['ticker']; 

	$ticker =str_replace(' ', '', $ticker);

	// Makes query with ticker 

	$result= $connection->query('SELECT * FROM hedge_fund_data WHERE ticker="' . $ticker . '" ');

}

if (empty($_POST)){

	$result= $connection->query('SELECT * FROM hedge_fund_data 	' );

}



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

    <title> Hedge Fund CURD PAGE  </title>    

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
     	<ul class="nav nav-pills">
  		<li class="active"><a href="https://www.hedge_fund_datawearhouse_view.html">Hedge Fund Warehouse </a></li>
  	</ul>
      <div class="container"> 

  	<input class="form-control" id="myInput" type="text" placeholder="Filter By..">

  	<br>
    


        <table id="example" class="table table-bordered table-striped">

            <thead class="thead-dark">
                <td>Fund</td>
                <td>Date</td>
                <td>Direction</td>
				<td>Ticker </td>
                <td>Cusip </td>
                <td>Company</td>
                <td>ETF_per</td>


            </th>
	    <tbody id="myTable"> 
            <?php while($row = $result->fetchArray()) {?>

            <tr class="table-light">

                <td><?php echo $row['Fund'];?></td>
                <td><?php echo $row['Date'];?></td>
				<td><?php echo $row['Direction'];?></td>
				<td><?php echo $row['Ticker'];?></td>
				<td><?php echo $row['Cusip'];?></td>
				<td><?php echo $row['Company'];?></td>
				<td><?php echo $row['ETF_per'];?></td>
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

<?php
$connection->close();

?>