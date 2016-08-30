<?php
//carrega as configuraÃ§Ãµes iniciais
include_once("../../resources/config/geral.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			//carrega as configuraÃ§Ãµes iniciais
			include_once("../geral/head.php");		
			//carrega os CSS e JS utilizado na tabela
			include($includeCSS."dataTable.php");
			include($includeJS."dataTable.php");
		?>
		
	<script type="text/javascript" language="javascript" class="init">
	

function format ( d ) {
	return d.descricao+"teste";
}

$(document).ready(function() {
	var dt = $('#ticketTable').DataTable( {
		
		"lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
		"scrollX": true,
		"processing": true,
		"serverSide": true,
		"ajax": "<?php echo $controllerDataTable;?>",
		"stateSave": true,
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
		"order": [[1, 'desc']],
		initComplete: function () {
			this.api().columns('.select-filter').every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
					.appendTo( $(column.footer()) )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search( val ? val : '', true, false )
							.draw();
					} );

				column.data().unique().sort().each( function ( d, j ) {
				    if(column.search() === d){
				        select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
				    } else {
				        select.append( '<option value="'+d+'">'+d+'</option>' )
				    }
				} );
			} );
		}
		
	} );

	// Array to track the ids of the details displayed rows
	var detailRows = [];

	$('#ticketTable tbody').on( 'click', 'tr td.details-control', function () {
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

	$('#ticketTable tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

	$('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = dt.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
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
<body class="bg-red">
	
		<?php
			//carrega as configuraÃ§Ãµes iniciais
			include_once("../geral/body.php");			
		?>
	
	<div class="container" style="background: white;border-radius: 5px;width: 100%;">
		<section>
			<h1><span style="color: #232323;">Chamados</span></h1>
			<div>
				Colunas: 
				<a class="toggle-vis" data-column="1">Número</a> - 
				<a class="toggle-vis" data-column="2">Área</a> - 
				<a class="toggle-vis" data-column="3">Etiqueta</a> - 
				<a class="toggle-vis" data-column="4">Problema</a> - 
				<a class="toggle-vis" data-column="5">Contato</a>
				<a class="toggle-vis" data-column="6">Ramal</a>
				<a class="toggle-vis" data-column="7">Setor</a>
				<a class="toggle-vis" data-column="8">Status</a>
				<a class="toggle-vis" data-column="9">SLA Resposta</a>
				<a class="toggle-vis" data-column="10">SLA Solução</a>
			</div>
			<table id="ticketTable" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th></th>
						<th>Número</th>
						<th class="select-filter">Área</th>
						<th>Etiqueta</th>
						<th>Problema</th>
						<th>Contato</th>
						<th>Ramal</th>
						<th>Setor</th>
						<th class="select-filter">Status</th>
						<th class="select-filter">SLA Resposta</th>	
						<th class="select-filter">SLA Solução</th>						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th></th>
						<th></th>
						<th class="select-filter"></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th class="select-filter"></th>
						<th class="select-filter"></th>	
						<th class="select-filter"></th>
					</tr>
				</tfoot>
			</table>			
		</section>
	</div>
	
		
		
</body>
</html>