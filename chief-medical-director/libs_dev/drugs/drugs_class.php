<?php
	class hospitaldrugs{

		public $db;
		function __construct($db){
			$this->db=$db;
		}

		public function addingHospitalDrugs($drug_name, $carton, $sachet, $pack_price, $price, $drug_number, $quantity, $manufacturer, $miligram, $type_id, $category_id, $manu_date, $exp_date)
		{
			try {
				$addingDrugs= $this->db->prepare("INSERT INTO drugs(drug_name, carton, sachet, pack_price, price, drug_number, quantity, manufacturer, miligram, type_id, category_id, manu_date, exp_date)VALUES(:drug_name, :carton, :sachet, :pack_price, :price, :drug_number, :quantity, :manufacturer, :miligram, :type_id, :category_id, :manu_date, :exp_date)");
				$arrAdding = array(':drug_name'=>$drug_name, ':carton'=>$carton, ':sachet'=>$sachet, 
					':pack_price'=>$pack_price, ':price'=>$price, ':drug_number'=>$drug_number, 
					':quantity'=>$quantity, ':manufacturer'=>$manufacturer, ':miligram'=>$miligram, 
					':type_id'=>$type_id, ':category_id'=>$category_id, ':manu_date'=>$manu_date, 
					':exp_date'=>$exp_date);
				if(!empty($addingDrugs->execute($arrAdding))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updateDrugsDetails($drug_name, $carton, $sachet, $pack_price, $price, 
			$drug_number, $quantity, $manufacturer, $miligram, $type_id, $category_id, $manu_date, 
			$exp_date)
		{
			try {
				$updatindDrugs = $this->db->prepare("UPDATE drugs SET drug_name=:drug_name, carton=:carton, sachet=:sachet, pack_price=:pack_price, price=:price, quantity=:quantity, manufacturer=:manufacturer, miligram=:miligram, type_id=:type_id, category_id=:category_id, manu_date=:manu_date, exp_date=:exp_date WHERE drug_number=:drug_number");
				$arrUpDrugs = array(':drug_name'=>$drug_name, ':carton'=>$carton, ':sachet'=>$sachet, ':pack_price'=>$pack_price, ':price'=>$price, ':quantity'=>$quantity, ':manufacturer'=>$manufacturer, ':miligram'=>$miligram, ':type_id'=>$type_id, ':category_id'=>$category_id, ':manu_date'=>$manu_date, ':exp_date'=>$exp_date, ':drug_number'=>$drug_number);
				if(!empty($updatindDrugs->execute($arrUpDrugs))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingDrugsDetails($drug_number)
		{
			try {
				$getDrugs = $this->db->prepare("SELECT * FROM drugs WHERE drug_number=:drug_number");
				$arrGetD = array(':drug_number'=>$drug_number);
				$getDrugs->execute($arrGetD);
				$foll = $getDrugs->fetch();
				return $foll;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteDrugsDetails($drug_number){
			try {
				$delDrugs = $this->db->prepare("DELETE FROM drugs WHERE drug_number=:drug_number");
				$arrdelDrugs = array(':drug_number'=>$drug_number);
				if(!empty($delDrugs->execute($arrdelDrugs))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkDeuplicateStock($drug_name, $miligram, $drug_cate_id, $type_id){
			try{
				$check = $this->db->prepare("SELECT * FROM drug_stock WHERE drug_name=:drug_name AND miligram=:miligram AND drug_cate_id=:drug_cate_id AND type_id=:type_id");
				$arrCheck = array(':drug_name'=>$drug_name, ':miligram'=>$miligram, ':drug_cate_id'=>$drug_cate_id, ':type_id'=>$type_id);
				$check->execute($arrCheck);
				if($check->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateQuantity($drug_name, $miligram, $drug_cate_id, $type_id, $sub){
			try{
				$qty = $this->db->prepare("UPDATE drug_stock SET quantity=:sub WHERE drug_name=:drug_name AND miligram=:miligram AND drug_cate_id=:drug_cate_id AND type_id=:type_id");
				$arrqty = array(':drug_name'=>$drug_name, ':miligram'=>$miligram,
					':drug_cate_id'=>$drug_cate_id, ':type_id'=>$type_id, ':sub'=>$sub);
				if(!empty($qty->execute($arrqty))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function addStock($drug_name, $miligram, $drug_cate_id, $type_id, $quantity, $new_carton, $total_sachet){
			try{
				$stocking = $this->db->prepare("INSERT INTO drug_stock(drug_name, miligram, drug_cate_id, type_id, quantity, carton, total_sachet) VALUES(:drug_name, :miligram, :drug_cate_id, :type_id, :quantity, :new_carton, :total_sachet)");
				$arr2 = array(':drug_name'=>$drug_name, ':miligram'=>$miligram, ':drug_cate_id'=>$drug_cate_id, ':type_id'=>$type_id, ':quantity'=>$quantity, ':new_carton'=>$new_carton, ':total_sachet'=>$total_sachet);
				if(!empty($stocking->execute($arr2))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getStock($drug_name, $miligram, $drug_cate_id, $type_id){
			try{
				$sele = $this->db->prepare("SELECT * FROM drug_stock WHERE drug_name=:drug_name AND miligram=:miligram AND drug_cate_id=:drug_cate_id AND type_id=:type_id");
				$arrSele = array(':drug_name'=>$drug_name, ':miligram'=>$miligram, ':drug_cate_id'=>$drug_cate_id, ':type_id'=>$type_id);
				$sele->execute($arrSele);
				$see = $sele->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateStock($drug_name, $total, $drug_cate_id, $type_id, $new_carton, $total_sachet){
			try{
				$updateStock = $this->db->prepare("UPDATE drug_stock SET quantity=:total, carton=:new_carton, total_sachet=:total_sachet WHERE drug_name=:drug_name AND drug_cate_id=:drug_cate_id AND type_id=:type_id");
				$arrUp = array(':drug_name'=>$drug_name, ':total'=>$total, ':drug_cate_id'=>$drug_cate_id, ':type_id'=>$type_id, ':new_carton'=>$new_carton, ':total_sachet'=>$total_sachet);
				if(!empty($updateStock->execute($arrUp))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		

        public function getManufacturerDetails($manufacturer_id){
			try{
				$getting = $this->db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
				$arr = array(':manufacturer_id'=>$manufacturer_id);
				$getting->execute($arr);
				$see = $getting->fetch();
				return $see;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}


	}

	class drugsCategory extends hospitaldrugs{
		function __construct($db){
			parent:: __construct($db);
		}

		public function getTypeDetails($type_id){
			try{
				$getting = $this->db->prepare("SELECT * FROM drug_type WHERE type_id=:type_id");
				$arr = array(':type_id'=>$type_id);
				$getting->execute($arr);
				$see = $getting->fetch();
				return $see;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function addingNewCategory($category_name){
			try{
				$insert = $this->db->prepare("INSERT INTO drug_category(drug_category_name) VALUES (:category_name)");
				$arr = array(':category_name'=>$category_name);
				if($exe = $insert->execute($arr)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkDuplicateName($category_name){
			try{
				$check = $this->db->prepare("SELECT * FROM drug_category WHERE drug_category_name=:category_name");
				$arr = array(':category_name'=>$category_name);
				$check->execute($arr);
				if($check->rowCount()>0){
					return true;
				}else{
					return false;
				}

			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getCategoryDetails($category_name){
			try{
				$getting = $this->db->prepare("SELECT * FROM drug_category WHERE drug_category_name=:category_name");
				$arr = array(':category_name'=>$category_name);
				$getting->execute($arr);
				$see = $getting->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getCategoryDetailsId($category_id){
			try{
				$getting = $this->db->prepare("SELECT * FROM drug_category WHERE drug_cate_id=:category_id");
				$arr = array(':category_id'=>$category_id);
				$getting->execute($arr);
				$see = $getting->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}
	

		public function updateCategory($category_name, $category_id){
			try{
				$update = $this->db->prepare("UPDATE drug_category SET drug_category_name=:category_name WHERE drug_cate_id=:category_id");
				$arr = array(':category_name'=>$category_name, ':category_id'=>$category_id);
				if($update->execute($arr)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteCategoryName($category_name, $category_id){
			try{
				$delete = $this->db->prepare("DELETE FROM drug_category WHERE drug_category_name=:category_name AND drug_cate_id=:category_id");
				$arr = array(':category_name'=>$category_name, ':category_id'=>$category_id);
				if($delete->execute($arr)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingAllCategory($query){
            try{
                $detail = $this->db->prepare($query);
                $detail->execute();
                if($detail->rowCount()==0){ ?>
                    <p style="color: red;" align="center"><h3 align="center">You have not added any Drug category to the Drug category list. </h3></p><?php
                }else{ ?>
                    <thead align="center">
                        <tr>
                            <th>S/N</th>
                            <th>Category Name</th>
                            <th>Operation</th>
                        </tr>
                    </thead>

                    <tfoot align="center">
                        <tr>
                            <th>S/N</th>
                            <th>Category Name</th>
                            <th>Operation</th>
                        </tr>
                    </tfoot>

                    <tbody><?php
                        $y =1;
                        while($row = $detail->fetch()){ 
							$category_id = $row['drug_cate_id']; ?>
                            <tr>
                                
                                <td><?php echo $y; ?></td>
								<td><?php echo $name = $row['drug_category_name']; ?></td>
                                <td align="center">
                                    <a href="edit-drug-category.php?drug_category_name=<?php echo $name; ?>" onclick="return(confirmToEdit());" class="btn btn-success waves-effect">
                                    <!-- <i class="material-icons">edit</i> -->
                                    <span>EDIT</span></a>
                                    <a href="delete-category.php?drug_category_name=<?php echo $name ?>&&category_id=<?php echo $category_id; ?>" onclick="return(confirmToDelete());" class="btn btn-danger waves-effect">
                                    <!-- <i class="material-icons">delete</i> -->
                                    <span>DELETE</span></a>
                                </td>

                            </tr><?php
                            $y++;
                        } ?> 
                    </tbody><?php
                    
                }
            }catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
                return false;;
            }
        }
	}