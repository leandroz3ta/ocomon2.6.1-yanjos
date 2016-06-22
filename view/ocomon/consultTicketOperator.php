<?php
//carrega as configurações iniciais
include("../../resources/config/geral.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

		<?php
		//carrega os CSS e JS utilizado na tabela
		include($includeCSS."dataTable.php");
		include($includeJS."dataTable.php");

		?>
		
	<script type="text/javascript" language="javascript" class="init">
	

function format ( d ) {
	return d.descricao+"teste";
}

$(document).ready(function() {
	var dt = $('#example').DataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": "../../controller/ids-objects.php",
		"columns": [ 
			{
				"class":          "details-control",
				"orderable":      false,
				"data":           null,
				"defaultContent": ""
			},
			{ "data": "numero" },
			{ "data": "area" },
			{ "data": "etiqueta" },
			{ "data": "problema" },
			{ "data": "contato" },
			{ "data": "ramal" },
			{ "data": "setor" },
			{ "data": "status" },
			{ "data": "slaR" },
			{ "data": "slaS" }
		],
		"order": [[1, 'asc']]
	} );

	// Array to track the ids of the details displayed rows
	var detailRows = [];

	$('#example tbody').on( 'click', 'tr td.details-control', function () {
		var tr = $(this).closest('tr');
		var row = dt.row( tr );
		var idx = $.inArray( tr.attr('id'), detailRows );

		if ( row.child.isShown() ) {
			tr.removeClass( 'details' );
			row.child.hide();

			// Remove from the 'open' array
			detailRows.splice( idx, 1 );
		}
		else {
			tr.addClass( 'details' );
			row.child( format( row.data() ) ).show();

			// Add to the 'open' array
			if ( idx === -1 ) {
				detailRows.push( tr.attr('id') );
			}
		}
	} );

	// On each draw, loop over the `detailRows` array and show any child rows
	dt.on( 'draw', function () {
		$.each( detailRows, function ( i, id ) {
			$('#'+id+' td.details-control').trigger( 'click' );
		} );
	} );
} );

	</script>
</head>
<body class="dt-example">
	
	<div class="container" style="background: white;border-radius: 5px;width: 100%;">
		<section>
			<h1><span style="color: #232323;">Chamados</span></h1>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th></th>
						<th>Número</th>
						<th>Area</th>
						<th>Etiqueta</th>
						<th>Problema</th>
						<th>Contato</th>
						<th>Ramal</th>
						<th>Setor</th>
						<th>Status</th>
						<th>SLA R</th>	
						<th>SLA S</th>						
					</tr>
				</thead>
			</table>			
		</section>
	</div>
	
		
		
</body>
</html>