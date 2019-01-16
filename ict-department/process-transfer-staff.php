<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/staff/hospital_staff.php';
	require 'libs_dev/hos_dept/hospital_unit_class.php';
	$all_purpose = new all_purpose($db);
	$staffDetails = new hospitalstaffDetails($db);
	$hosUnit = new hospitalUnitings($db);
	try{
		
		if($_POST){
			$y = $_POST["show"];
			$email = $_SESSION['user_name'];
			for($i = 1; $i <= $y; $i++){
				$transfer = $_POST["trans$i"];
				if($transfer ==1){
					$staff_number = $_POST["staff_number$i"];
					$new_unit_id = $_POST["new_unit_id$i"];
					$unit_id = $new_unit_id;
					$gosh = $hosUnit->getUnitDetailsID($unit_id);
					$unit_name = $gosh['unit_name'];

					if(!empty($staffDetails->transferingStaff($staff_number, $new_unit_id))){
						
						$action= "Transferred $staff_number to $unit_name";
						$his= $all_purpose->operationHistory($action, $email);
					}else{
						$_SESSION['error'] = "Unable to Transfer Staff at The Moment, Please Try Again Later";
						$all_purpose->redirect("transfer-staff.php");
					}
					
				}
			}
			$_SESSION['success'] = "You Have Transferred The Staff(s) Successfully";
			$all_purpose->redirect("view-staff-transfer.php");
		}else{
			$_SESSION['success'] = "Please Fill The Below Form To Transfer Staff To Various Department/Unit";
			$all_purpose->redirect("transfer-staff.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("transfer-staff.php");
	}
