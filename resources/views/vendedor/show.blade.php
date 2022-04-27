<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Export Data Tables</title>
<!-- Bootstrap CSS -->

</head>
<body>

<style type="text/css">
	
</style>

<div class="container" style="padding-top:20px;">

<table id="ExportDataTable" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Cedula</th>
			<th>Email </th>
			<th>Telefono</th>
			<th>Acciones</th>

		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Free Time Learn</td>
			<td>freetimelearn@gmail.com</td>
			<td>90XXXX3210</td>
			<td>90XXXX3210</td>
		</tr>
	</tbody>
</table>

</div>


<script type="text/javascript">
$(document).ready(function() {
    var table = $('#ExportDataTable').DataTable( {
        lengthChange: false,
        //buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
		buttons: [ 'copy', 'excel', 'pdf', 'print']
    } );
    table.buttons().container()
        .appendTo( '#ExportDataTable_wrapper .col-sm-6:eq(0)' );
} );
</script>

</body>
</html> 							