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
					$prev_unit_id = $_POST["prev_unit_id$i"];
					$staff_transfer_id = $_POST["transfer_id$i"];

					$prev = $_POST["prev$i"];
					$unit_id = $new_unit_id;
					$gosh = $hosUnit->getUnitDetailsID($unit_id);
					$unit_name = $gosh['unit_name'];

					if(!empty($staffDetails->updateSTaffTransfer($staff_number, $prev_unit_id, $new_unit_id, $staff_transfer_id))){
						
						$action= "Transferred $staff_number From $prev to $unit_name";
						$his= $all_purpose->operationHistory($action, $email);
					}else{
						$_SESSION['error'] = "Unable to Update The Transfer Staff List at The Moment, Please Try Again Later";
						$all_purpose->redirect("edit-staff-transfer.php");
					}
					
				}
			}
			$_SESSION['success'] = "You Have Updated The Staff Transfer List Successfully";
			$all_purpose->redirect("view-staff-transfer.php");
		}else{
			$_SESSION['success'] = "Please Fill The Below Form To Update The Staff Transfer List From $prev to $unit_name";
			$all_purpose->redirect("edit-staff-transfer.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("edit-staff-transfer.php");
	}
