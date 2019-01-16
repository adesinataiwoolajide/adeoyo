<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$hosUnit = new hospitalUnitings($db);
		if(isset($_POST['update-unit'])){
			$email = $_SESSION['user_name'];
			$unitme = $all_purpose->sanitizeInput($_POST['unit_name']);
			$unit_name = strtoupper($unitme);
			$prev_name = $_POST['prev_name'];
			$unit_id = $_POST['unit_id'];			
			
			if($hosUnit->updateUnit($unit_name, $unit_id)){
				$action= "Updated The Department Details From $prev_name to $unit_name ";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Updated The Department Details From $prev_name to $unit_name Successfully";
				$all_purpose->redirect("view-all-units.php");
			}else{
				$return = $_POST['return'];
				$_SESSION['error'] = "Unable To Update The Department Details From $prev_name to $unit_name at The Moment, Please Try Again Later";
				$all_purpose->redirect("$return");
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Update $unit_name Unit/Department Details";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}