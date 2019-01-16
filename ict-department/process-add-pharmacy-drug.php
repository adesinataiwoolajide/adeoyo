<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/drugs/drugs_class.php';
	require 'libs_dev/staff/hospital_staff.php';
	
	try{
		$all_purpose = new all_purpose($db);
		$hosDrug = new hospitaldrugs($db);
		$staffDetails = new hospitalstaffDetails($db);
		
		if(isset($_POST['add-drugs'])){
			$email = $_SESSION['user_name'];
			$drugname = $all_purpose->sanitizeInput($_POST['drug_name']);
			$carton = $all_purpose->sanitizeInput($_POST['carton']);
			$price = $all_purpose->sanitizeInput($_POST['drug_price']);
			$sachet = $all_purpose->sanitizeInput($_POST['nos_sachet']);
			$pack_price = $all_purpose->sanitizeInput($_POST['pack_price']);
			$quantity = $all_purpose->sanitizeInput($_POST['pack_carton']);
			$miligram = $all_purpose->sanitizeInput($_POST['miligram']);
			$manufacturer = $all_purpose->sanitizeInput($_POST['manufacturer']);
			$category_id = $all_purpose->sanitizeInput($_POST['category_id']);
			$type_id = $all_purpose->sanitizeInput($_POST['type_id']);
			$manu_date = $all_purpose->sanitizeInput($_POST['manu_date']);
			$exp_date = $all_purpose->sanitizeInput($_POST['exp_date']);
			$drug_cate_id = $category_id;
			$year = date("Y");
			$break = substr($year, 2,2);
			$category = "Drugs";

			$total_sac = $sachet*$quantity;

			if($manu_date == $exp_date){
				$_SESSION['error'] = "Manufacturer Date $manu_date And Expiry Date $exp_date Cannot Be The Same Date";
				$all_purpose->redirect("add-drugs-to-pharmacy.php");
			}
			$drug_name = strtoupper($drugname);
			$getNumber = $db->prepare("SELECT * FROM last_numbers WHERE category=:category AND year_number=:year ORDER BY last_id DESC LIMIT 0,1");
				$arrNum = array(':category'=>$category, ':year'=>$year);
				$getNumber->execute($arrNum);
			if($getNumber->rowCount()==0){
				$new_number =0;
				$adding = $new_number+1;
			}else{
				$see_last = $getNumber->fetch();
				$conf = $see_last['numbers'];
				$adding = $conf+1;
			}
			$cut = substr($drug_name, 0,5);
			$len = strtoupper($cut);
			$hos_name = "$len/$break";
			$drug_number =$hos_name."/00".$adding;
			$numbers = "00".$adding;
			$year_employ = $year;
			
			if($hosDrug->addingHospitalDrugs($drug_name, $carton, $sachet, $pack_price, $price, $drug_number, $quantity, $manufacturer, $miligram, $type_id, $category_id, $manu_date, $exp_date) AND ($staffDetails->insertingTheLastNumber($category, $numbers, $year_employ))){
				$action = "Added $drug_name with the Drug number $drug_number to the Drug list";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);

				if($hosDrug->checkDeuplicateStock($drug_name, $miligram, $drug_cate_id, $type_id)){
					$come = $hosDrug->getStock($drug_name, $miligram, $drug_cate_id, $type_id);
					$before = $come['quantity'];
					$new = $quantity;
					$total = $before+$new;
					$new_carton = $come['carton']+$carton;
					$total_sachet = $sachet + $come['total_sachet'];
					$update = $hosDrug->updateStock($drug_name, $total, $drug_cate_id, $type_id, 
						$new_carton, $total_sachet);
					$action = "Updated $drug_name stock with $quantity quantity";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "You Have Added $drug_name with the Drug Number $drug_number added to the Drug list successfully and the Drug Stock is Updated Successfully";
					$all_purpose->redirect("view-all-pharmacy-drugs.php");
				}else{
					$new_carton = $come['carton']+$carton;
					$total_sachet = $sachet + $come['total_sachet'];
					if(!empty($hosDrug->addStock($drug_name, $miligram, $drug_cate_id, $type_id, $quantity, $new_carton, $total_sachet))){
						$action = "Added $drug_name with Drug Number $drug_number to the stock list";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = " You Have Added $drug_name with the Drug number $drug_number to the Drug Stock successfully";
						$all_purpose->redirect("view-all-pharmacy-drugs.php");
					}else{
						$_SESSION['error'] = "Error in adding the Drug $drug_name to the Drug Stock";
						$all_purpose->redirect("add-drugs-to-pharmacy.php");
					}
				}
			}else{
				$_SESSION['error'] = "Unable to add $drug_name to the Drug list at the moment, Please try again later";
				$all_purpose->redirect("add-drugs-to-pharmacy.php");
			}
		}else{

			$_SESSION['error'] = "Please Fill The Below Form To Add Drugs To The Hospital Pharmacy";
			$all_purpose->redirect("add-drugs-to-pharmacy.php");
		}
	}catch(PDOException $e){

		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-drugs-to-pharmacy.php");
	}