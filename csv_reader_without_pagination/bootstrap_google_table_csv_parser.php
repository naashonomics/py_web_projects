<!doctype html>

<html class="no-js" lang="">

  <head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta charset="utf-8">

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CITIES CSV   </title>    

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

<?php

    $handle = fopen("cities.csv", "r");

    $data = fgetcsv($handle, 1000, ",");

    $color = $data[3];

    $options = $data[5];

    echo('<table id="example" class="table table-bordered table-striped">');

	echo ('<thead class="thead-dark">');

	echo('<tr>');



	echo ('<th> LatD </th><th> LatM </th><th> LatS </th> <th> NS </th> <th> LonM </th><th> LonS </th><th> EW </th><th>City </th><th> STATE </th>');

	echo('</tr>');

	echo('</thead>');

	echo('<tbody id="myTable">');

	$counter = 0;

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

        //generate HTML

		

        echo('<tr class="table-light">');

		$counter++;

        foreach ($data as $index=>$val) {

			if($counter % 2 == 0){

				echo('<td >');

				echo htmlentities($val, ENT_QUOTES);

				echo('</td>');

				

			}else{

            	echo('<td class="table-secondary">');

				echo htmlentities($val, ENT_QUOTES);

				echo('</td>');

				

			}

            

        }

        echo('</tr>');



    }

	echo('</tbody>');

    echo("</table>");

    fclose($handle);

	

	

?>









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
