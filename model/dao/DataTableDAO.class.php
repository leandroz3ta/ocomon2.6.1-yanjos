<?php

include_once("dbconfig.php"); // Classe conexao com o banco

class DataTableDAO extends GeneralDAO{
	

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
	
	
	static function filter ( $request,$status )	{
		if($status == "OPERATOR")
			$where = " AND (cod_status<>4 AND cod_status<>12) ";
		else if($status == "USER")
			$where = "";
		
		if ( isset($request['search']) && $request['search']['value'] != '' ) {
			$str = $request['search']['value'];
			
			$where .= " AND (`numero` LIKE '%".$str."%' OR `contato` LIKE '%".$str."%' )";

		}

		return $where;
	}
	
	
	function operatorTicket($request,$area){
		
		try
		{	
			$limit = self::limit( $request);
			$order = self::order( $request);
			$where = self::filter( $request,"OPERATOR");
			$area = "cod_area IN (".$area.")";
			
			$stmt = $this->conn->prepare("SELECT * FROM all_tickets WHERE ".$area.$where.$order.$limit);
			$stmt->execute();
			$dataRow=$stmt->fetchAll();
			
			$stmt = $this->conn->prepare("SELECT * FROM all_tickets WHERE ".$area.$where);
			$stmt->execute();
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
	
		function userTicket($request,$userID){
		
		try
		{	
			$limit = self::limit( $request);
			$order = self::order( $request);
			$where = self::filter( $request,"USER");
			
			$stmt = $this->conn->prepare("SELECT * FROM all_tickets WHERE aberto_por=:aberto_por".$where.$order.$limit);
			$stmt->execute(array(':aberto_por'=>$userID));
			$dataRow=$stmt->fetchAll();
			
			$stmt = $this->conn->prepare("SELECT * FROM all_tickets WHERE aberto_por=:aberto_por".$where);
			$stmt->execute(array(':aberto_por'=>$userID));
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