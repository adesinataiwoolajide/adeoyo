<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/hos_dept/hospital_unit_class.php';
	require 'libs_dev/test/hospital_test.php';
	try{
		$all_purpose = new all_purpose($db);
		$hosUnit = new hospitalUnitings($db);
		$hosTest = new hospitalTest($db);
		if(isset($_POST['add-test'])){
			$email = $_SESSION['user_name'];
			$testname = $all_purpose->sanitizeInput($_POST['test_name']);
			$test_amount = $all_purpose->sanitizeInput($_POST['test_amount']);
			$unit_id = $all_purpose->sanitizeInput($_POST['unit_id']);

			$test_name = strtoupper($testname);
			$deed = $hosUnit->getUnitDetailsID($unit_id);
			$unit_name = $deed['unit_name'];

				
			if($hosTest->checkExistenceTest($test_name, $unit_id)){
				$_SESSION['error'] = "You Have Added $test_name Test To This Department $unit_name Before";
				$all_purpose->redirect("add-hospital-test.php");
			}else{
				if($hosTest->insertIntoHospitalTest($test_name, $unit_id, $test_amount)){
					$action= "Added $test_name Test To $unit_name Department";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Added $test_name Test To $unit_name Department Successfully";
					$all_purpose->redirect("view-all-test.php");
				}else{

					$_SESSION['error'] = "Unable To Add $test_name Test To $unit_name Department at The Moment, Please Try Again Later";
					$all_purpose->redirect("add-hospital-test.php");
				}
			}
		}else{

			$_SESSION['error'] = "Please Fill The Below Form To Add Test To The Hospital Test List";
			$all_purpose->redirect("add-hospital-test.php");
		}
	}catch(PDOException $e){

		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-hospital-test.php");
	}