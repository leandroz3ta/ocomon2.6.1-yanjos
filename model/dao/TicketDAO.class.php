<?php

require_once("../model/bean/Ticket.class.php");
require_once("dbconfig.php"); // Classe conexao com o banco

class TicketDAO{
	
	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	function data_output ($data){
		$out = array();
		for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
			$row = array(			
			"numero"=>$data[$i]["numero"],
			"area"=>utf8_encode($data[$i]["area"]),
			"etiqueta"=>$data[$i]["etiqueta"],
			"problema"=>utf8_encode($data[$i]["problema"]),
			"contato"=>utf8_encode($data[$i]["contato"]),
			"ramal"=>$data[$i]["telefone"],
			"setor"=>utf8_encode($data[$i]["setor"]),
			"slaS"=>$data[$i]["sla_solucao_tempo"],
			"descricao"=>utf8_encode($data[$i]["descricao"]),
			"slaR"=>$data[$i]["sla_resposta_tempo"],
			"status"=>utf8_encode($data[$i]["status"])
			);		
		$out[] = $row;
		}	
		
		return $out;
	}
	
		static function limit ( $request )
	{
		$limit = '';

		if ( isset($request['start']) && $request['length'] != -1 ) {
			$limit = " LIMIT ".intval($request['start']).", ".intval($request['length']);
		}

		return $limit;
	}
		
		static function order ( $request )
	{
		$order = '';

		if ( isset($request['start']) && $request['length'] != -1 ) {
			$order = " ORDER BY ".intval($request['order'][0]['column'])." ".$request['order'][0]['dir'];
		}

		return $order;
	}
	
	function operatorTicket($request,$area){
		
		try
		{	
			$limit = self::limit( $request);
			$order = self::order( $request);
			$where = " AND (cod_status<>4 AND cod_status<>12) ";
			
			$stmt = $this->conn->prepare("SELECT * FROM all_tickets WHERE cod_area=:area".$where.$order.$limit);
			$stmt->execute(array(':area'=>$area));
			$dataRow=$stmt->fetchAll();
			
			$stmt = $this->conn->prepare("SELECT * FROM all_tickets WHERE cod_area=:area".$where);
			$stmt->execute(array(':area'=>$area));
			$records=$stmt->rowCount();
			
			return array(
			"draw"            => isset ( $request['draw'] ) ? 
								 intval( $request['draw'] ) :
								 0,
			"recordsTotal"    => intval( $records ),
			"recordsFiltered" => intval( $records ),
			"data"            => self::data_output($dataRow)
			);
			

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
	}
	


}

?>