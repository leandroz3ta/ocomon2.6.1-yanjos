<?php

include_once("dbconfig.php"); // Classe conexao com o banco
include_once("GeneralDAO.class.php"); // Classe DAO

class SelectOptionDAO extends GeneralDAO{
	
	function areaOpenTicket (){
		try
		{							
			$stmt = $this->conn->prepare("SELECT s.* from sistemas s, areaXarea_abrechamado a WHERE s.sis_status NOT IN (0) AND s.sis_atende = 1 AND s.sis_id = a.area AND a.area_abrechamado IN (".$_SESSION['allArea'].") GROUP BY sistema ORDER BY sistema");
			$stmt->execute();
			$dataRow=$stmt->fetchAll();			
			$out = array();
			
				for ( $i=0, $ien=count($dataRow) ; $i<$ien ; $i++ ) {
					$row = array(
						"codArea"=>$dataRow[$i]["sis_id"],
						"nameArea"=>utf8_encode($dataRow[$i]["sistema"]),
					);
					$out[] = $row;
				}			
			return $out;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}		
	}
	
	function filialOpenTicket (){
		try
		{
			$stmt = $this->conn->prepare("SELECT * from localizacao where loc_status = 1 order by local");
			$stmt->execute();
			$dataRow=$stmt->fetchAll();
			$out = array();
				
			for ( $i=0, $ien=count($dataRow) ; $i<$ien ; $i++ ) {
				$row = array(
						"codFilial"=>$dataRow[$i]["loc_id"],
						"nameFilial"=>utf8_encode($dataRow[$i]["local"]),
				);
				$out[] = $row;
			}
			return $out;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
}

?>