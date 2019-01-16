<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/drugs/drugs_class.php';
	
	try{
		$all_purpose = new all_purpose($db);
		$hosDrug = new hospitaldrugs($db);
		
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
			$drug_number = $_POST['drug_number'];
			$prev_name = $_POST['prev_name'];
			$prev_sachet = $_POST['prev_sachet'];
			$prev_carton = $_POST['prev_carton'];
			$drug_name = strtoupper($drugname);
			$qty = $_POST['qty'];
			
			if($manu_date == $exp_date){
				$return = $_POST['return'];
				$_SESSION['error'] = "Manufacturer Date $manu_date And Expiry Date $exp_date Cannot Be The Same Date";
				$all_purpose->redirect("$return");
			}

			if($hosDrug->updateDrugsDetails($drug_name, $carton, $sachet, $pack_price, $price, 
			$drug_number, $quantity, $manufacturer, $miligram, $type_id, $category_id, $manu_date, 
			$exp_date)){
				$action = "Updated $drug_name with the Drug number $drug_number in the Drug list";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);

				if($hosDrug->checkDeuplicateStock($drug_name, $miligram, $drug_cate_id, $type_id)){
					$come = $hosDrug->getStock($drug_name, $miligram, $drug_cate_id, $type_id);
					$before = $come['quantity'];
					$pre_carton = $come['carton'];
					$prev_total_sachet = $come['total_sachet'];
					$nnow = $before - $qty;
					$new_caon = $pre_carton - $prev_carton;
					$tot_sachet =  $prev_total_sachet - $prev_sachet;
					$new_carton = $new_caon+$carton;
					$total_sachet = $tot_sachet + $sachet;

					$new = $quantity;
					$total = $nnow+$new;
					$update = $hosDrug->updateStock($drug_name, $total, $drug_cate_id, $type_id, 
						$new_carton, $total_sachet);
					$action = "Updated Drug Number $drug_number With The Drug Name From $prev_name to $drug_name";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "You Have Updated Drug Number $drug_number With The Drug Name From $prev_name to $drug_name Details successfully and the Drug Stock is Updated Successfully";
					$all_purpose->redirect("view-all-pharmacy-drugs.php");
				}else{
					$total = $nnow+$new;
					$new_carton = $new_caon+$carton;
					$total_sachet = $tot_sachet + $sachet;
					if(!empty($hosDrug->addStock($drug_name, $miligram, $drug_cate_id, $type_id, $quantity, $new_carton, $total_sachet))){
						$action = "Added $drug_name with Drug Number $drug_number to the stock list";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = "You Have Added $drug_name with the Drug number $drug_number to the Drug Stock successfully";
						$all_purpose->redirect("drug-details.php?drug_number=$drug_number");
					}else{
						$_SESSION['error'] = "Error in adding the Drug $drug_name to the Drug Stock";
						$return = $_POST['return'];
						$all_purpose->redirect($return);
					}
				}
			}else{
				$_SESSION['error'] = "Unable to Update $drug_name with the drug number $drug_number to the Drug list at the moment, Please try again later";
				$return = $_POST['return'];
				$all_purpose->redirect($return);
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Update $drug_name Details";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}