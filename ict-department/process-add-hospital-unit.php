<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/hos_dept/hospital_unit_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$hosUnit = new hospitalUnitings($db);
		if(isset($_POST['add-ward'])){
			$email = $_SESSION['user_name'];
			$unitme = $all_purpose->sanitizeInput($_POST['unit_name']);
			$unit_name = strtoupper($unitme);

				
			if($hosUnit->checkDuplicateName($unit_name)){
				$_SESSION['error'] = "You Have Added $unit_name To The Hospital Unit/Department Before";
				$all_purpose->redirect("add-hospital-unit.php");
			}else{
				if($hosUnit->addingNewUnit($unit_name)){
					$action= "Added $unit_name To The Hospital Unit/Department";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Added $unit_name to The Hospital Unit/Department Successfully";
					$all_purpose->redirect("view-all-units.php");
				}else{

					$_SESSION['error'] = "Unable To Add $unit_name to The Hospital Unit at The Moment, Please Try Again Later";
					$all_purpose->redirect("add-hospital-unit.php");
				}
			}
		}else{

			$_SESSION['error'] = "Please Fill The Below Form To Update The Unit/Department Details";
			$all_purpose->redirect("add-hospital-unit.php");
		}
	}catch(PDOException $e){

		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-hospital-unit.php");
	}