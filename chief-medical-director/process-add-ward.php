<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/ward/ward_class.php';
	require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$add_ward = new hospitalWards($db);
		$hosUnit = new hospitalUnitings($db);
		if(isset($_POST['add-ward'])){
			$email = $_SESSION['user_name'];
			$ward_name = $all_purpose->sanitizeInput($_POST['ward_name']);
			$unit_id = $all_purpose->sanitizeInput($_POST['unit_id']);
			$bed_space = $all_purpose->sanitizeInput($_POST['bed_space']);
			$gosh = $hosUnit->getUnitDetailsID($unit_id);
			$unit_name = $gosh['unit_name'];
			if($add_ward->checkDuplicateName($ward_name, $unit_id)){
				$_SESSION['error'] = "You Have Added $ward_name To $unit_name To The Hospital Unit Before";
				$all_purpose->redirect("add-ward.php");
			}else{
				if($add_ward->addingNewWard($ward_name, $bed_space, $unit_id)){
					$action= "Added $ward_name with $bed_space Bed Space For Patient to The Hospital $unit_name";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Added $ward_name with $bed_space Bed Space For Patient to The Hospital $unit_name Successfully";
					$all_purpose->redirect("view-all-wards.php");
				}else{
					$_SESSION['error'] = "Unable To Add $ward_name with $bed_space Bed Space to The Hospital $unit_name Unit at The Moment, Please Try Again Later";
					$all_purpose->redirect("add-ward.php");
				}
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Add The Ward Details";
			$all_purpose->redirect("add-ward.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-ward.php");
	}