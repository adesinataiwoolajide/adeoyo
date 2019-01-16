<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/hos_dept/hospital_unit_class.php';
	require 'libs_dev/test/hospital_test.php';
	try{
		$all_purpose = new all_purpose($db);
		$hosUnit = new hospitalUnits($db);
		$hosTest = new hospitalTest($db);
		if(isset($_POST['update-test'])){
			$email = $_SESSION['user_name'];
			$testname = $all_purpose->sanitizeInput($_POST['test_name']);
			$test_amount = $all_purpose->sanitizeInput($_POST['test_amount']);
			$unit_id = $all_purpose->sanitizeInput($_POST['unit_id']);
			$test_id = $_POST['test_id'];
			$prev_name = $_POST['prev_name'];
			$prev_unit = $_POST['prev_unit'];
			$prev_amount = $_POST['prev_amount'];

			$test_name = strtoupper($testname);
			$deed = $hosUnit->getUnitDetailsID($unit_id);
			$unit_name = $deed['unit_name'];

			if($hosTest->updateHospitalTest($test_id, $test_name, $unit_id, $test_amount)){
				$action= "Updated Test Details From $prev_name to $test_name and From $prev_unit Department to $unit_name Department And Changed The Test Amount From # $prev_amount to $test_amount";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Updated Test Details From $prev_name to $test_name and From $prev_unit Department to $unit_name Department And Changed The Test Amount From # $prev_amount to $test_amount Successfully";
				$all_purpose->redirect("view-all-test.php");
			}else{
				$return = $_POST['return'];
				$_SESSION['error'] = "Unable To Update Test Details From $prev_name to $test_name and From $prev_unit to $unit_name at The Moment, Please Try Again Later";
				$all_purpose->redirect("$return");
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Update hospital Test Details";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}