<?php
	class hospitalUnitings{

		public $db;
		function __construct($db){
			$this->db=$db;
		}

		public function addingNewUnit($unit_name){
			try{
				$insert = $this->db->prepare("INSERT INTO hospital_unit(unit_name) VALUES (:unit_name)");
				$arr = array(':unit_name'=>$unit_name);
				if($exe = $insert->execute($arr)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function checkDuplicateName($unit_name){
			try{
				$check = $this->db->prepare("SELECT * FROM hospital_unit WHERE unit_name=:unit_name");
				$arr = array(':unit_name'=>$unit_name);
				$check->execute($arr);
				if($check->rowCount()>0){
					return true;
				}else{
					return false;
				}

			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function getUnitDetails($unit_name, $unit_id){
			try{
				$getting = $this->db->prepare("SELECT * FROM hospital_unit WHERE unit_name=:unit_name AND unit_id=:unit_id");
				$arr = array(':unit_name'=>$unit_name, ':unit_id'=>$unit_id);
				$getting->execute($arr);
				$see = $getting->fetch();
				return $see;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function getUnitDetailsID($unit_id){
			try{
				$gettng = $this->db->prepare("SELECT * FROM hospital_unit WHERE unit_id=:unit_id");
				$arr = array(':unit_id'=>$unit_id);
				$gettng->execute($arr);
				$se = $gettng->fetch();
				return $se;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}
	

		public function updateUnit($unit_name, $unit_id){
			try{
				$update = $this->db->prepare("UPDATE hospital_unit SET unit_name=:unit_name WHERE unit_id=:unit_id");
				$arr = array(':unit_name'=>$unit_name, ':unit_id'=>$unit_id);
				if($update->execute($arr)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function deleteUnitName($unit_name, $unit_id){
			try{
				$delete = $this->db->prepare("DELETE FROM hospital_unit WHERE unit_name=:unit_name AND unit_id=:unit_id");
				$arr = array(':unit_name'=>$unit_name, ':unit_id'=>$unit_id);
				if($delete->execute($arr)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

	}
?>