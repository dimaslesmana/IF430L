<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tugas Pendahuluan</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<h4 style="color:grey"> [IF635] Web Programming </h4>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#products">Products</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<div id="products" style="margin: auto; width: 85%; padding: 10px;">
		<table id="table" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th> # </th>
					<th> Product Name </th>
					<th> Quantity Per Unit </th>
					<th> Price </th>
					<th> Stock </th>
				</tr>
			</thead>
			<tbody>
				<?php
				$host = "localhost";
				$username = "root";
				$dbname = "northwind";
				$password = "";
	
				$conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
	
				$query = "SELECT * FROM products LIMIT 12";
				$result = $conn->query($query);
	
				foreach ($result as $row) {
          echo "<tr>";
						echo "<td>" . $row[0] . "</td>";
						echo "<td>" . $row[1] . "</td>";
						echo "<td>" . $row[4] . "</td>";
						echo "<td>" . $row[5] . "</td>";
						echo "<td>" . $row[6] . "</td>";
					echo "</tr>";
        }
	
				$result = null;
        $conn = null;
				?>
			</tbody>
			<tfoot>
				<tr>
					<th> # </th>
					<th> Product Name </th>
					<th> Quantity Per Unit </th>
					<th> Price </th>
					<th> Stock </th>
				</tr>
			</tfoot>
		</table>
	</div>
	<script>
		$(document).ready(function() {
      $('#table').DataTable();
    });
	</script>
</body>

</html>