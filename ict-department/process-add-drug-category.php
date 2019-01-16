<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/drugs/drugs_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$drugCate = new drugsCategory($db);
		if(isset($_POST['add-ward'])){
			$email = $_SESSION['user_name'];
			$category = $all_purpose->sanitizeInput($_POST['category_name']);
			$category_name = strtoupper($category);
				
			if($drugCate->checkDuplicateName($category_name)){
				$_SESSION['error'] = "You Have Added $category_name To The Drug Category List Before";
				$all_purpose->redirect("add-drug-category.php");
			}else{
				if($drugCate->addingNewCategory($category_name)){
					$action= "Added $category_name To The Drug Category List";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Added $category_name To The Drug Category Successfully";
					$all_purpose->redirect("view-all-drug-categories.php");
				}else{

					$_SESSION['error'] = "Unable To Add $category_name to The Drug Category List at The Moment, Please Try Again Later";
					$all_purpose->redirect("add-drug-category.php");
				}
			}
		}else{

			$_SESSION['error'] = "Please Fill The Below Form To The Drug Category";
			$all_purpose->redirect("add-drug-category.php");
		}
	}catch(PDOException $e){

		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-drug-category.php");
	}