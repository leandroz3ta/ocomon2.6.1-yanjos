<?php

include_once("dbconfig.php"); // Classe conexao com o banco
include_once("GeneralDAO.class.php"); // Classe DAO

class SelectOptionDAO extends GeneralDAO{
	
	function area (){
		try
		{							
			$stmt = $this->conn->prepare("SELECT s.* from sistemas s, areaXarea_abrechamado a WHERE s.sis_status NOT IN (0) AND s.sis_atende = 1 AND s.sis_id = a.area AND a.area_abrechamado IN (".$_SESSION['allArea'].") GROUP BY sistema ORDER BY sistema");
			$stmt->execute();
			return $dataRow=$stmt->fetchAll();			
				
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}		
	}
	
	function filial (){
		try
		{
			$stmt = $this->conn->prepare("SELECT * from instituicao WHERE inst_status not in (0) order by inst_cod");
			$stmt->execute();
			return $dataRow=$stmt->fetchAll();
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	function localizacao (){
		try
		{
			$stmt = $this->conn->prepare("SELECT * from localizacao where loc_status = 1 order by local");
			$stmt->execute();
			return $dataRow=$stmt->fetchAll();
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
}

?>