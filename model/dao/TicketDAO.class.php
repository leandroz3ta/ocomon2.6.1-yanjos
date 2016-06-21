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
			"sla"=>$data[$i]["sla_solucao_tempo"],
			"descricao"=>utf8_encode($data[$i]["descricao"])
			);		
		$out[] = $row;
		}	
		
		return $out;
	}
	
	function operatorTicket($area){
		
		try
		{			
			$stmt = $this->conn->prepare("SELECT * FROM all_tickets WHERE cod_area=:area");
			$stmt->execute(array(':area'=>$area));
			$out = array();
			$dataRow=$stmt->fetchAll();
			
			return array(
			"draw"            => 0,
			"recordsTotal"    => 10,
			"recordsFiltered" => 100,
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