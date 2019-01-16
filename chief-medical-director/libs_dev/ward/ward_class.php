<?php
	class hospitalWards{
		private $db;
        
		function __construct($db){
			$this->db=$db;
		}

		public function addingNewWard($ward_name, $bed_space, $unit_id){
			try{
				$insert = $this->db->prepare("INSERT INTO ward(ward_name, bed_space, unit_id) VALUES (:ward_name, :bed_space, :unit_id)");
				$arr = array(':ward_name'=>$ward_name, ':bed_space'=>$bed_space, ':unit_id'=>$unit_id);
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

		public function checkDuplicateName($ward_name, $unit_id){
			try{
				$check = $this->db->prepare("SELECT * FROM ward WHERE ward_name=:ward_name AND unit_id=:unit_id");
				$arr = array(':ward_name'=>$ward_name, ':unit_id'=>$unit_id);
				$check->execute($arr);
				if($check->rowCount()==1){
					return true;
				}else{
					return false;
				}

			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function getWardDetails($ward_name, $ward_id){
			try{
				$getting = $this->db->prepare("SELECT * FROM ward WHERE ward_name=:ward_name AND ward_id=:ward_id");
				$arr = array(':ward_name'=>$ward_name, ':ward_id'=>$ward_id);
				$getting->execute($arr);
				$see = $getting->fetch();
				return $see;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}
	

		public function updateWard($ward_name, $ward_id, $bed_space, $unit_id){
			try{
				$update = $this->db->prepare("UPDATE ward SET ward_name=:ward_name, bed_space=:bed_space, unit_id=:unit_id WHERE ward_id=:ward_id");
				$arr=array(':ward_name'=>$ward_name, ':ward_id'=>$ward_id, ':bed_space'=>$bed_space, ':unit_id'=>$unit_id);
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

		public function deleteWardName($ward_name, $ward_id){
			try{
				$delete = $this->db->prepare("DELETE FROM ward WHERE ward_name=:ward_name AND ward_id=:ward_id");
				$arr = array(':ward_name'=>$ward_name, ':ward_id'=>$ward_id);
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