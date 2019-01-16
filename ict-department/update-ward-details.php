<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/ward/ward_class.php';
	require 'libs_dev/hos_dept/hospital_unit_class.php';
    
	try{
		$all_purpose = new all_purpose($db);
		$add_ward = new hospitalWards($db);
		$hosUnit = new hospitalUnits($db);
		if(isset($_POST['update-ward'])){
			$email = $_SESSION['user_name'];
			$ward_name = $all_purpose->sanitizeInput($_POST['ward_name']);
			$bed_space = $all_purpose->sanitizeInput($_POST['bed_space']);
			$unit_id = $all_purpose->sanitizeInput($_POST['unit_id']);
			$ward_id = $_POST['ward_id'];
			$prev_name = $_POST['previus_name'];
			$gosh = $hosUnit->getUnitDetailsID($unit_id);
			$unit_name = $gosh['unit_name'];
			
			if($add_ward->updateWard($ward_name, $ward_id, $bed_space, $unit_id)){
				$action= "Updated Ward Name In $unit_name From $prev_name to $ward_name";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Updated Ward Name From $prev_name to $ward_name In $unit_name Unit Successfully";
				$all_purpose->redirect("view-all-wards.php");
			}else{
				$return = $_POST['return'];
				$_SESSION['error'] = "Unable To  Update Ward Name From $prev_name to $ward_name In $unit_name at The Moment, Please Try Again Later";
				$all_purpose->redirect("$return");
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Update $prev_name Ward Details";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}