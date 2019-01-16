<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/drugs/drugs_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$drugCate = new drugsCategory($db);
		if(isset($_GET['category_name'])){
			$email = $_SESSION['user_name'];
			
			$category_id = $_GET['category_identification'];
			$category_name = $_GET['category_name'];
				
			if($drugCate->deleteCategoryName($category_name, $category_id)){
				$action= "Deleted $category_name Drug Category Name From The Drug Category List";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Deleted $category_name Drug Category Name From The Drug Category List Successfully";
				$all_purpose->redirect("view-all-drug-categories.php");
			}else{
				
				$_SESSION['error'] = "Unable To Delete $category_name Drug Category Name From The Drug Category List at The Moment, Please Try Again Later";
				$all_purpose->redirect("view-all-drug-categories.php");
			}

		}else{
			
			$_SESSION['error'] = "Please Fill The Below Form To Update The Drug Category Details";
			$all_purpose->redirect("view-all-drug-categories.php");
		}
	}catch(PDOException $e){
		
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-drug-categories.php");
	}