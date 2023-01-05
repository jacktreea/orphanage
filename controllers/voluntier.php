<?php
	// var_dump($action == "add");
	// die();
	if ($action == "index") {

		$voluntiers = $Voluntier->getDetails('active');

		foreach ($voluntiers as $key => $vol) {
			$tData['voluntiers'][$vol['id']]['id'] = $vol['id'];
			$tData['voluntiers'][$vol['id']]['names'] = $vol['first_name'].' '. $vol['second_name'].' '. $vol['last_name'];
			$tData['voluntiers'][$vol['id']]['address'] = $vol['country_name'].' -> '. $vol['region_name'].' -> '. $vol['district_name'].' -> '. $vol['ward_name'] .' -> '. $vol['street_name'];
			$tData['voluntiers'][$vol['id']]['specialization'] = $vol['specialization'];
			$tData['voluntiers'][$vol['id']]['created_at'] = $vol['created_at'];
			$tData['voluntiers'][$vol['id']]['work_duration'] =  $vol['start_date'] .' - '.$vol['end_date'];
			$tData['voluntiers'][$vol['id']]['phone_numbers'][$vol['phonenumber_id']]['phonenumber_id'] = $vol['phonenumber_id'];
			$tData['voluntiers'][$vol['id']]['phone_numbers'][$vol['phonenumber_id']]['phone_status'] = $vol['phone_status'];
			$tData['voluntiers'][$vol['id']]['phone_numbers'][$vol['phonenumber_id']]['phone_number'] = $vol['phone_number'];
			$tData['voluntiers'][$vol['id']]['photos'][$vol['photo_id']]['photo_id'] = $vol['photo_id'];
			$tData['voluntiers'][$vol['id']]['photos'][$vol['photo_id']]['phone_status'] = $vol['phone_status'];
			$tData['voluntiers'][$vol['id']]['photos'][$vol['photo_id']]['photo_path'] = $vol['photo_path'];

		}

		$data['content'] = loadTemplate("voluntiers.tpl.php", $tData);
	}
	if ($action == "edit") {

		$id = $_GET['id'];
		
		$voluntiers = $Voluntier->getDetails('active', $id);


		foreach ($voluntiers as $key => $vol) {
			$tData['voluntiers'][$vol['id']]['id'] = $vol['id'];
			$tData['voluntiers'][$vol['id']]['first_name'] = $vol['first_name'];
			$tData['voluntiers'][$vol['id']]['second_name'] = $vol['second_name'];
			$tData['voluntiers'][$vol['id']]['last_name'] = $vol['last_name'];
			$tData['voluntiers'][$vol['id']]['dob'] = $vol['dob'];
			$tData['voluntiers'][$vol['id']]['birth_address'] = $vol['birth_address'];
			$tData['voluntiers'][$vol['id']]['position_id'] = $vol['position_id'];
			$tData['voluntiers'][$vol['id']]['gender'] = $vol['gender'];
			$tData['voluntiers'][$vol['id']]['responsibility'] = $vol['responsibility'];
			$tData['voluntiers'][$vol['id']]['speciality'] = $vol['speciality'];
			$tData['voluntiers'][$vol['id']]['voluntary_hours'] = $vol['voluntary_hours'];
			$tData['voluntiers'][$vol['id']]['start_date'] = $vol['start_date'];
			$tData['voluntiers'][$vol['id']]['end_date'] = $vol['end_date'];
			$tData['voluntiers'][$vol['id']]['residence'] = $vol['residence'];
			$tData['voluntiers'][$vol['id']]['tribe'] = $vol['tribe'];
			$tData['voluntiers'][$vol['id']]['religion_id'] = $vol['religion_id'];
			$tData['voluntiers'][$vol['id']]['status'] = $vol['status'];
			$tData['voluntiers'][$vol['id']]['position_name'] = $vol['position_name'];
			$tData['address'][$vol['id']]['country_name'] = $vol['country_name'];
			$tData['address'][$vol['id']]['region_name'] = $vol['region_name'];
			$tData['address'][$vol['id']]['district_name'] = $vol['district_name'];
			$tData['address'][$vol['id']]['ward_name'] = $vol['ward_name'];
			$tData['address'][$vol['id']]['street_name'] = $vol['street_name'];
			$tData['address'][$vol['id']]['country_id'] = $vol['country_id'];
			$tData['address'][$vol['id']]['district_id'] = $vol['district_id'];
			$tData['address'][$vol['id']]['region_id'] = $vol['region_id'];
			$tData['address'][$vol['id']]['ward_id'] = $vol['ward_id'];
			$tData['address'][$vol['id']]['street_id'] = $vol['street_id'];
			$tData['voluntiers'][$vol['id']]['address'] = $vol['country_name'].' -> '. $vol['region_name'].' -> '. $vol['district_name'].' -> '. $vol['ward_name'] .' -> '. $vol['street_name'];
			$tData['voluntiers'][$vol['id']]['specialization'] = $vol['specialization'];
			$tData['voluntiers'][$vol['id']]['created_at'] = $vol['created_at'];
			$tData['voluntiers'][$vol['id']]['work_duration'] =  $vol['start_date'] .' - '.$vol['end_date'];
			$tData['voluntiers'][$vol['id']]['phone_numbers'][$vol['phonenumber_id']]['phonenumber_id'] = $vol['phonenumber_id'];
			$tData['voluntiers'][$vol['id']]['phone_numbers'][$vol['phonenumber_id']]['phone_status'] = $vol['phone_status'];
			$tData['voluntiers'][$vol['id']]['phone_numbers'][$vol['phonenumber_id']]['phone_number'] = $vol['phone_number'];
			$tData['voluntiers'][$vol['id']]['photos'][$vol['photo_id']]['photo_id'] = $vol['photo_id'];
			$tData['voluntiers'][$vol['id']]['photos'][$vol['photo_id']]['photo_status'] = $vol['photo_status'];
			$tData['voluntiers'][$vol['id']]['photos'][$vol['photo_id']]['photo_path'] = $vol['photo_path'];

		}

		// echo "<pre>";
		// print_r($tData);
		// die();

		$action = "add";

	}

	if ($action == "add") {
		// var_dump("expression");
		// die();
		$tData['countries'] = $Country->find(array('status'=>'active'));
		$tData['specializations'] = $Specialization->find(array('status'=>'active'));
		$tData['positions'] = $Position->find(array('status'=>'active'));
		$tData['religions'] = $Religion->find(array('status'=>'active'));

		$data['content'] = loadTemplate("add_voluntier.tpl.php", $tData);

		
	}

	if ($action == "save") {

		// echo "<pre>";
		// //print_r($_POST);
		// print_r($_FILES['voluntary']['size'] == 0 );
		// die();

		    $tData['voluntary'] = $_POST['voluntary'];
		    $tData['voluntary']['country_id'] = $_POST['address']['country_id'];
		    $tData['voluntary']['ward_id'] = $_POST['address']['ward_id'];
		    $tData['voluntary']['street_id'] = $_POST['address']['street_id'];
		    $tData['voluntary']['district_id'] = $_POST['address']['district_id'];
		    $tData['voluntary']['region_id'] = $_POST['address']['region_id'];

		    if (isset($_POST['id'])) {
		    		
		    	$tData['voluntary']['updated_at'] = date('Y-m-d H:i:s');

		    	$tData['voluntary']['updated_by'] = $_SESSION['member']['id'];

		    	$Voluntier->update($_POST['id'], $tData['voluntary']);

		    	$nLastId = $_POST['id'];

		    }else{
		    	
		    	$tData['voluntary']['created_by'] = $_SESSION['member']['id'];

		    	$Voluntier->insert($tData['voluntary']);

		    	$nLastId = $Voluntier->lastid();

		    }

		    $Phonenumber->deletePhoneNumber($nLastId);

		    if (sizeof($_POST['phone_no']) > 0) {
		    	
			    foreach ($_POST['phone_no'] as $nkey => $phone) {
			    	
			    	$p_status = false;

                	$selId = '';

				   	foreach ($_POST['phone_number_ids'] as $_wekey => $reg) {
	                   
	                    if ($reg == $phone) {
	                        
	                        $p_status = true;

	                        $selId = $_wekey;

	                    }

	                }

	                if ($p_status == true) {

	                    $Phonenumber->update($selId, array("phone_number"=>$phone, "voluntary_id"=>$nLastId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));

	                    
	                }else{

			    		$Phonenumber->insert(array('voluntary_id' => $nLastId, "phone_number"=>$phone, "created_by"=>$_SESSION['member']['id'] ));

			    	}
			    }

		    }

		    if ($_FILES['voluntary']['size'] > 0) {

			    $image = $_FILES['voluntary'];

		    	$Photo->deletePhoto($nLastId);

				$results = uploadImage("images/voluntiers_images/", $image );

				if ($results->uploadStatus != "success") {

					$_SESSION['error'] = "Error: Failed to Upload your Image";
					redirectBack();
				}

			    $Photo->insert(array('voluntary_id' => $nLastId, "photo_path"=>$results->imagePath, "created_by"=>$_SESSION['member']['id'] ));

		    }

		   // die("here");

		    $_SESSION['message'] = "Information Saved Successfull";

		    redirect('voluntier', 'index');


	}

?>