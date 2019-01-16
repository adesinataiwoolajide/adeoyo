<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$hosUnit = new hospitalUnitings($db);
		if(isset($_GET['unit_identification'])){
			$email = $_SESSION['user_name'];
			
			$unit_id = $_GET['unit_identification'];	
			$unit_name = $_GET['unit_name'];		
			
			if($hosUnit->deleteUnitName($unit_name, $unit_id)){
				$action= "Deleted $unit_name From The Hospital Unit/Department List";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Deleted $unit_name From The Hospital Unit/Department List Successfully";
				$all_purpose->redirect("view-all-units.php");
			}else{
				$_SESSION['error'] = "Unable To Update The Department Details From $prev_name to $unit_name at The Moment, Please Try Again Later";
				$all_purpose->redirect("view-all-units.php");
			}
		}else{
			$_SESSION['error'] = "Please Click On The Trash CAN To Delete Unit/Department Details";
			$all_purpose->redirect("view-all-units.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-units.php");
	}