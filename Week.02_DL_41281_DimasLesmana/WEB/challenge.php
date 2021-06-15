<!DOCTYPE html>
<html>

<head>
	<title>Challenge</title>

	<style>
		td.details-control {
			background: url('images/details_open.png') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			background: url('images/details_close.png') no-repeat center center;
		}
	</style>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="challenge.php">[IF635] Web Programming</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#employees"> Employees </a></li>
			</ul>
		</div>
	</nav>

	<div id="employees" style="margin: auto; width: 85%; padding: 10px;">
		<table id="table" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th></th>
					<th>Last Name</th>
					<th>Title</th>
					<th>Extension</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<th></th>
					<th>Last Name</th>
					<th>Title</th>
					<th>Extension</th>
				</tr>
			</tfoot>
		</table>
	</div>

	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		function format(d) {
			return '<table cellpadding="5" cellspacing="0" border="0" class="table" style="padding-left:50px;">' +
				'<tr>' +
				'<td>Full name:</td>' +
				'<td>' + `${d.FirstName} ${d.LastName}` + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>Birth Date:</td>' +
				'<td>' + d.BirthDate + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>Address:</td>' +
				'<td>' + d.Address + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>City:</td>' +
				'<td>' + d.City + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>Home Phone:</td>' +
				'<td>' + d.HomePhone + '</td>' +
				'</tr>' +
				'</table>';
		}

		$(document).ready(function() {
			var table = $('#table').DataTable({
				"ajax": "fetch.php",
				"columns": [{
						"className": 'details-control',
						"orderable": false,
						"data": null,
						"defaultContent": ''
					},
					{ "data": "LastName" },
					{ "data": "Title" },
					{ "data": "Extension" }
				],
				"order": [
					[1, 'asc']
				]
			});

			$('#table tbody').on('click', 'td.details-control', function() {
				var tr = $(this).closest('tr');
				var row = table.row(tr);

				if (row.child.isShown()) {
					row.child.hide();
					tr.removeClass('shown');
				} else {
					row.child(format(row.data())).show();
					tr.addClass('shown');
				}
			})

		});
	</script>
</body>

</html>