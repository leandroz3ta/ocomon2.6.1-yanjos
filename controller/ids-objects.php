<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'datatables_demo';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier - in this case object
// parameter names
$columns = array(
	array(
		'db' => 'id',
		'dt' => 'DT_RowId',
		'formatter' => function( $d, $row ) {
			// Technically a DOM id cannot start with an integer, so we prefix
			// a string. This can also be useful if you have multiple tables
			// to ensure that the id is unique with a different prefix
			return 'row_'.$d;
		}
	),
	array( 'db' => 'first_name', 'dt' => 'first_name' ),
	array( 'db' => 'last_name',  'dt' => 'last_name' ),
	array( 'db' => 'position',   'dt' => 'position' ),
	array( 'db' => 'office',     'dt' => 'office' ),
	array( 'db' => 'first_name', 'dt' => 'first_name1' ),
	array( 'db' => 'last_name',  'dt' => 'last_name1' ),
	array( 'db' => 'position',   'dt' => 'position1' ),
	array( 'db' => 'office',     'dt' => 'office1' ),
	array(
		'db'        => 'start_date',
		'dt'        => 'start_date',
		'formatter' => function( $d, $row ) {
			return date( 'jS M y', strtotime($d));
		}
	),
	array(
		'db'        => 'salary',
		'dt'        => 'salary',
		'formatter' => function( $d, $row ) {
			return '$'.number_format($d);
		}
	)
);

$sql_details = array(
	'user' => 'root',
	'pass' => '',
	'db'   => 'table',
	'host' => 'localhost'
);

$user1= array(
"numero"=>"row_1",
"area"=>"alva",
"etiqueta"=>"Nixon",
"problema"=>"System Architect",
"contato"=>"Edinburgh",
"ramal"=>"Tiger",
"setor"=>"Nixon",
"sla"=>"System Architect",
"descricao"=>"Edinburgh"
);

$user2 = array(
"numero"=>"row_1",
"area"=>"alva",
"etiqueta"=>"Nixon",
"problema"=>"System Architect",
"contato"=>"Edinburgh",
"ramal"=>"Tiger",
"setor"=>"Nixon",
"sla"=>"System Architect",
"descricao"=>"Edinburgh"
);

/*$detail = array('user' => 'root',
	'draw' => 0,
	'recordsTotal'   => 57,
	'recordsFiltered' => 57,
	'data' => $data);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

	//carrega as configurações iniciais
	include("../resources/config/geral.php");

	//Aqui importamos todas as classes que poderão ser usadas baseado nas solicitações que forem feitas.
	require_once("../model/bean/Ticket.class.php"); // Classe Bean
	require_once("../model/dao/TicketDAO.class.php"); // Classe DAO
	
	$ticketDAO = new TicketDAO();
	
echo json_encode(
	$ticketDAO->operatorTicket(1)
);

