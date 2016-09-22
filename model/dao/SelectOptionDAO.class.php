<?php

include_once("dbconfig.php"); // Classe conexao com o banco
include_once("GeneralDAO.class.php"); // Classe DAO

class SelectOptionDAO extends GeneralDAO{
	
	function subProblem ($codProblem){
		try
		{
			$stmt = $this->conn->prepare("SELECT prob_id,problema,slas_desc,probt1_desc,probt2_desc,probt3_desc FROM problemas as p 
							LEFT JOIN sistemas as s on p.prob_area = s.sis_id 
							LEFT JOIN sla_solucao as sl on sl.slas_cod = p.prob_sla 
							LEFT JOIN prob_tipo_1 as pt1 on pt1.probt1_cod = p.prob_tipo_1 
							LEFT JOIN prob_tipo_2 as pt2 on pt2.probt2_cod = p.prob_tipo_2 
							LEFT JOIN prob_tipo_3 as pt3 on pt3.probt3_cod = p.prob_tipo_3
                            WHERE sis_id = 3");
			$stmt->execute();
			$dataRow=$stmt->fetchAll();
			$out = array();
			for ( $i=0, $ien=count($dataRow) ; $i<$ien ; $i++ ) {
				$row = array(
						"prob_id"=>$dataRow[$i]["prob_id"],
						"slas_desc"=>utf8_encode($dataRow[$i]["slas_desc"]),
						"probt1_desc"=>utf8_encode($dataRow[$i]["probt1_desc"]),
						"probt2_desc"=>utf8_encode($dataRow[$i]["probt2_desc"]),
						"probt3_desc"=>utf8_encode($dataRow[$i]["probt3_desc"])
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
	
	function responsibleArea ($codArea){
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM problemas WHERE prob_area = '".$codArea."' OR prob_area IS NULL OR prob_area = -1 GROUP BY problema ORDER BY problema");
			$stmt->execute();
			$dataRow=$stmt->fetchAll();
			$out = array();
			for ( $i=0, $ien=count($dataRow) ; $i<$ien ; $i++ ) {
				$row = array(
						"prob_id"=>$dataRow[$i]["prob_id"],
						"problema"=>utf8_encode($dataRow[$i]["problema"])
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