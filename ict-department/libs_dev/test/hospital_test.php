<?php
	
	class hospitalTest{
		public $db;
		function __construct($db)
		{
			$this->db =$db;
		}

		public function checkExistenceTest($test_name, $unit_id)
		{
			try {
				$checkTest = $this->db->prepare("SELECT * FROM hospital_test WHERE test_name=:test_name AND unit_id=:unit_id");
				$arrcheckTest = array(':test_name'=>$test_name, ':unit_id'=>$unit_id);
				$checkTest->execute($arrcheckTest);
				if($checkTest->rowCount()==1){
					return true;
				}else{
					return false;
				}
			} catch (PDPException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getHospitalTest($test_id)
		{
			try {
				$getTest = $this->db->prepare("SELECT * FROM hospital_test WHERE test_id=:test_id");
				$arrGEtTEs= array(':test_id'=>$test_id);
				$getTest->execute($arrGEtTEs);
				$body = $getTest->fetch();
				return $body;
			} catch (PDPException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertIntoHospitalTest($test_name, $unit_id, $test_amount)
		{
			try {
				$addTest = $this->db->prepare("INSERT INTO hospital_test(test_name, unit_id, test_amount)VALUES(:test_name, :unit_id, :test_amount)");
				$arrAddTest = array(':test_name'=>$test_name, ':unit_id'=>$unit_id, ':test_amount'=>$test_amount);
				if(!empty($addTest->execute($arrAddTest))){
					return true;
				}else{
					return false;
				}
			} catch (PDPException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateHospitalTest($test_id, $test_name, $unit_id, $test_amount)
		{
			try {
				$updateHosTest = $this->db->prepare("UPDATE hospital_test SET test_name=:test_name, unit_id=:unit_id, test_amount=:test_amount WHERE test_id=:test_id");
				$arrUpTest = array(':test_name'=>$test_name, ':unit_id'=>$unit_id, ':test_amount'=>$test_amount, ':test_id'=>$test_id);
				if(!empty($updateHosTest->execute($arrUpTest))){
					return true;
				}else{
					return false;
				}
			} catch (PDPException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteHospitalTest($test_id)
		{
			try {
				$deleteTest = $this->db->prepare("DELETE FROM hospital_test WHERE test_id=:test_id");
				$arrDelTest = array(':test_id'=>$test_id);
				if(!empty($deleteTest->execute($arrDelTest))){
					return true;
				}else{
					return false;
				}
			} catch (PDPException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
	}
	class hospitalPayment extends hospitalTest{
		function __construct($db){
			parent:: __construct($db);
		}

		public function addingThePayment($staff_number, $card_number, $payment_type, $amount, $receipt_number)
		{
			try {
				$addPayment = $this->db->prepare("INSERT INTO patient_payment(staff_number, card_number, payment_type, amount, receipt_number)VALUES(:staff_number, :card_number, :payment_type, :amount, :receipt_number)");
				$arrAddPay = array(':staff_number'=>$staff_number, ':card_number'=>$card_number, ':payment_type'=>$payment_type, ':amount'=>$amount, ':receipt_number'=>$receipt_number);
				if(!empty($addPayment->execute($arrAddPay))){
					return true;
				}
			} catch (PDPException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingPaymentReciept($receipt_number)
		{
			try {
				$seePayment = $this->db->prepare("SELECT * FROM patient_payment WHERE receipt_number=:receipt_number");
				$arrsee = array(':receipt_number'=>$receipt_number);
				$seePayment->execute($arrsee);
				$rick = $seePayment->fetch();
				return $rick;
			} catch (PDPException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deletePayment($receipt_number, $card_number)
		{
			try {
				$delePay = $this->db->prepare("DELETE FROM patient_payment WHERE receipt_number=:receipt_number AND card_number=:card_number");
				$arrDelPay = array(':receipt_number'=>$receipt_number, ':card_number'=>$card_number);
				if(!empty($delePay->execute($arrDelPay))){
					return true;
				}else{
					return false;
				}
			} catch (PDPException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

	}
?>