<?php
	if ($action == "index") {


		// $childDetails = $Child_person->getChildDetails('active', null);


		//$tData['child_details'] = $Person->find(array('type' => 'child','status'=>'active'));
		$tData['child_details'] = $Person->getChildSchool('active', null);


			// echo "<pre>";
			// print_r($tData);
			// die();
		//die("here");

		// foreach ($childDetails as $mkey => $detail) {
		// 	$tData['child_details'][$detail['child_id']]['child_first_name'] = $detail['child_first_name'];
		// 	$tData['child_details'][$detail['child_id']]['child_second_name'] = $detail['child_second_name'];
		// 	$tData['child_details'][$detail['child_id']]['child_last_name'] = $detail['child_last_name'];
		// 	$tData['child_details'][$detail['child_id']]['father_id'] = $detail['father_id'];
		// 	$tData['child_details'][$detail['child_id']]['mother_id'] = $detail['mother_id'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_id'] = $detail['guardian_id'];
		// 	$tData['child_details'][$detail['child_id']]['found_history'] = $detail['found_history'];
		// 	$tData['child_details'][$detail['child_id']]['admission_date'] = $detail['admission_date'];
		// 	$tData['child_details'][$detail['child_id']]['child_dob'] = $detail['child_dob'];
		// 	$tData['child_details'][$detail['child_id']]['child_birth_address'] = $detail['child_birth_address'];
		// 	$tData['child_details'][$detail['child_id']]['child_gender'] = $detail['child_gender'];
		// 	$tData['child_details'][$detail['child_id']]['child_tribe'] = $detail['child_tribe'];
		// 	$tData['child_details'][$detail['child_id']]['child_remarks'] = $detail['child_remarks'];
		// 	$tData['child_details'][$detail['child_id']]['child_religion_name'] = $detail['child_religion_name'];
		// 	$tData['child_details'][$detail['child_id']]['child_religion_id'] = $detail['child_religion_id'];
		// 	$tData['child_details'][$detail['child_id']]['father_first_name'] = $detail['father_first_name'];
		// 	$tData['child_details'][$detail['child_id']]['father_second_name'] = $detail['father_second_name'];
		// 	$tData['child_details'][$detail['child_id']]['father_last_name'] = $detail['father_last_name'];
		// 	$tData['child_details'][$detail['child_id']]['father_dob'] = $detail['father_dob'];
		// 	$tData['child_details'][$detail['child_id']]['father_birth_address'] = $detail['father_birth_address'];
		// 	$tData['child_details'][$detail['child_id']]['father_gender'] = $detail['father_gender'];
		// 	$tData['child_details'][$detail['child_id']]['father_tribe'] = $detail['father_tribe'];
		// 	$tData['child_details'][$detail['child_id']]['father_remarks'] = $detail['father_remarks'];
		// 	$tData['child_details'][$detail['child_id']]['father_life_status'] = $detail['father_life_status'];
		// 	$tData['child_details'][$detail['child_id']]['father_country_id'] = $detail['father_country_id'];
		// 	$tData['child_details'][$detail['child_id']]['father_region_id'] = $detail['father_region_id'];
		// 	$tData['child_details'][$detail['child_id']]['father_district_id'] = $detail['father_district_id'];
		// 	$tData['child_details'][$detail['child_id']]['father_ward_id'] = $detail['father_ward_id'];
		// 	$tData['child_details'][$detail['child_id']]['father_street_id'] = $detail['father_street_id'];
		// 	$tData['child_details'][$detail['child_id']]['father_religion_id'] = $detail['father_religion_id'];
		// 	$tData['child_details'][$detail['child_id']]['father_religion_name'] = $detail['father_religion_name'];
		// 	$tData['child_details'][$detail['child_id']]['father_photos'][$detail['father_photo_id']]['father_photo_id'] = $detail['father_photo_id'];
		// 	$tData['child_details'][$detail['child_id']]['father_photos'][$detail['father_photo_id']]['father_photo_path'] = $detail['father_photo_path'];

		// 	$tData['child_details'][$detail['child_id']]['child_photos'][$detail['child_photo_id']]['child_photo_id'] = $detail['child_photo_id'];
		// 	$tData['child_details'][$detail['child_id']]['child_photos'][$detail['child_photo_id']]['child_photo_path'] = $detail['child_photo_path'];

		// 	$tData['child_details'][$detail['child_id']]['mother_photos'][$detail['mother_photo_id']]['mother_photo_id'] = $detail['mother_photo_id'];
		// 	$tData['child_details'][$detail['child_id']]['mother_photos'][$detail['mother_photo_id']]['mother_photo_path'] = $detail['mother_photo_path'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_photos'][$detail['guardian_photo_id']]['guardian_photo_path'] = $detail['guardian_photo_path'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_photos'][$detail['guardian_photo_id']]['guardian_photo_id'] = $detail['guardian_photo_id'];



		// 	$tData['child_details'][$detail['child_id']]['child_documents'][$detail['mother_photo_id']]['mother_photo_id'] = $detail['mother_photo_id'];
		// 	$tData['child_details'][$detail['child_id']]['child_documents'][$detail['mother_photo_id']]['mother_photo_path'] = $detail['mother_photo_path'];
		// 	$tData['child_details'][$detail['child_id']]['child_documents'][$detail['guardian_photo_id']]['guardian_photo_path'] = $detail['guardian_photo_path'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_photos'][$detail['guardian_photo_id']]['guardian_photo_id'] = $detail['guardian_photo_id'];




		// 	$tData['child_details'][$detail['child_id']]['mother_first_name'] = $detail['mother_first_name'];
		// 	$tData['child_details'][$detail['child_id']]['mother_second_name'] = $detail['mother_second_name'];
		// 	$tData['child_details'][$detail['child_id']]['mother_last_name'] = $detail['mother_last_name'];
		// 	$tData['child_details'][$detail['child_id']]['mother_dob'] = $detail['mother_dob'];
		// 	$tData['child_details'][$detail['child_id']]['mother_birth_address'] = $detail['mother_birth_address'];
		// 	$tData['child_details'][$detail['child_id']]['mother_gender'] = $detail['mother_gender'];
		// 	$tData['child_details'][$detail['child_id']]['mother_tribe'] = $detail['mother_tribe'];
		// 	$tData['child_details'][$detail['child_id']]['mother_remarks'] = $detail['mother_remarks'];
		// 	$tData['child_details'][$detail['child_id']]['mother_life_status'] = $detail['mother_life_status'];
		// 	$tData['child_details'][$detail['child_id']]['mother_country_id'] = $detail['mother_country_id'];
		// 	$tData['child_details'][$detail['child_id']]['mother_region_id'] = $detail['mother_region_id'];
		// 	$tData['child_details'][$detail['child_id']]['mother_district_id'] = $detail['mother_district_id'];
		// 	$tData['child_details'][$detail['child_id']]['mother_ward_id'] = $detail['mother_ward_id'];
		// 	$tData['child_details'][$detail['child_id']]['mother_street_id'] = $detail['mother_street_id'];
		// 	$tData['child_details'][$detail['child_id']]['mother_religion_id'] = $detail['mother_religion_id'];
		// 	$tData['child_details'][$detail['child_id']]['mother_religion_name'] = $detail['mother_religion_name'];

		// 	$tData['child_details'][$detail['child_id']]['guardian_first_name'] = $detail['guardian_first_name'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_second_name'] = $detail['guardian_second_name'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_last_name'] = $detail['guardian_last_name'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_dob'] = $detail['guardian_dob'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_birth_address'] = $detail['guardian_birth_address'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_gender'] = $detail['guardian_gender'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_tribe'] = $detail['guardian_tribe'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_remarks'] = $detail['guardian_remarks'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_life_status'] = $detail['guardian_life_status'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_country_id'] = $detail['guardian_country_id'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_region_id'] = $detail['guardian_region_id'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_district_id'] = $detail['guardian_district_id'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_ward_id'] = $detail['guardian_ward_id'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_street_id'] = $detail['guardian_street_id'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_religion_id'] = $detail['guardian_religion_id'];
		// 	$tData['child_details'][$detail['child_id']]['guardian_religion_name'] = $detail['guardian_religion_name'];

		// }
		// echo "<pre>";
		// print_r($tData);
		// die();
		$data['content'] = loadTemplate("children.tpl.php", $tData);
	 }


	 if ($action == "edit") {
		  
	 	$child_id = $_GET['child_id'];
	 	$child_person_id = $_GET['child_person_id'];
	 	$father_id = $_GET['father_id'];
	 	$mother_id = $_GET['mother_id'];
	 	$guardian_id = $_GET['guardian_id'];


	 	$tData['child_details'] = $Person->find(array('id'=>$child_person_id))[0];
	 	$tData['child_photo'] = $Photo->find(array('person_id'=>$child_person_id,'status'=>'active'))[0];
	 	$tData['father_photo'] = $Photo->find(array('person_id'=>$father_id,'status'=>'active'))[0];
	 	$tData['mother_photo'] = $Photo->find(array('person_id'=>$mother_id,'status'=>'active'))[0];
	 	$tData['guardian_photo'] = $Photo->find(array('person_id'=>$guardian_id,'status'=>'active'))[0];
	 	$tData['father_details'] = $Person->find(array('id'=>$father_id))[0];
	 	$tData['address'][$_GET['child_id']] = $Country->getCountryRegion(null, $tData['father_details']['country_id'],$tData['father_details']['region_id'], $tData['father_details']['district_id'], $tData['father_details']['street_id'], $tData['father_details']['ward_id'])[0];
	 	$tData['mother_details'] = $Person->find(array('id'=>$mother_id))[0];
	 	$tData['guardian_details'] = $Person->find(array('id'=>$guardian_id))[0];
	 	$tData['other_details'] = $Child_person->find(array('id'=>$child_id))[0];
	 	$tData['document_details'] = $Person_document->find(array('person_id'=>$child_person_id));


	 	// 	echo "<pre>";
		// print_r($tData);
		// die();	


	 	$action = 'add';


	 }


	if ($action == "add") {

		$tData['documents'] = $Document->find(array('status'=>'active'));
		$tData['religions'] = $Religion->find(array('status'=>'active'));
		$tData['countries'] = $Country->find(array('status'=>'active'));

		// echo "<pre>";
		// print_r($tData);
		// die();

		$data['content'] = loadTemplate("add_child.tpl.php", $tData);

		
	}


		if ($action == "save") {

		// echo "<pre>";
		// print_r($_FILES);
		// print_r($_POST );
		//die();

		    $tData['person'] = $_POST['person'];
		    $fData['father'] = $_POST['father'];
		    $mData['mother'] = $_POST['mother'];
		    $gData['guardian'] = $_POST['guardian'];
		    $tData['person']['type'] = "child";
		    $fData['father']['type'] = "father";
		    $mData['mother']['type'] = "mother";
		    $gData['guardian']['type'] = "guardian";
		    
		    // if (isset($_POST['id'])) {
		    		
		    // 	$tData['person']['updated_at'] = date('Y-m-d H:i:s');

		    // 	$tData['person']['updated_by'] = $_SESSION['member']['id'];

		    // 	$Person->update($_POST['id'], $tData['child']);

		    // 	$nLastId = $_POST['id'];

		    // }else{


				$fData['father']['gender'] = "male";
				$mData['mother']['gender']= "female";

				if ($_POST['child_id'] != '') {

					$tData['person']['updated_at'] = date('Y-m-d H:i:s');
					$tData['person']['updated_by'] = $_SESSION['member']['id'];
					$Person->update($_POST['child_id'],$tData['person']);
			    	$nLastId = $_POST['child_id'];

				} else {

					$tData['person']['created_by'] = $_SESSION['member']['id'];
					$Person->insert($tData['person']);
			    	$nLastId = $Person->lastid();

				}
				



				if ($_POST['father_id'] != '') {

					$fData['father']['updated_at'] = date('Y-m-d H:i:s');
					$fData['father']['updated_by'] = $_SESSION['member']['id'];
					$Person->update($_POST['father_id'],$fData['father']);
			    	$nLastId = $_POST['father_id'];

				} else {
					$fData['father']['created_by'] = $_SESSION['member']['id'];
			    	$Person->insert($fData['father']);
			    	$fLastId = $Person->lastid();

			    }

				if ($_POST['mother_id'] != '') {
					$mData['mother']['updated_at'] = date('Y-m-d H:i:s');
					$mData['mother']['updated_by'] = $_SESSION['member']['id'];
					$Person->update($_POST['mother_id'],$mData['mother']);
			    	$nLastId = $_POST['mother_id'];

				} else {
					
					$mData['mother']['created_by']= $_SESSION['member']['id'];
			    	$Person->insert($mData['mother']);
			    	$mLastId = $Person->lastid();


		    	}
				if ($_POST['guardian_id'] != '') {
					$gData['guardian']['updated_at'] = date('Y-m-d H:i:s');
					$gData['guardian']['updated_by'] = $_SESSION['member']['id'];
					$Person->update($_POST['guardian_id'],$gData['guardian']);
			    	$nLastId = $_POST['guardian_id'];

				} else {
					
					$gData['guardian']['created_by'] = $_SESSION['member']['id'];
			    	$Person->insert($gData['guardian']);
			    	$gLastId = $Person->lastid();

			    }

		    	$qData['child'] = $_POST['child'];
				$qData['child']['child_id'] = $nLastId;
				$qData['child']['father_id'] = $fLastId;
				$qData['child']['mother_id'] = $mLastId;
				$qData['child']['guardian_id'] = $gLastId;


				if ($_POST['child_person_id'] != '') {

					$qData['child']['updated_at'] = date('Y-m-d H:i:s');
					$qData['child']['updated_by'] = $_SESSION['member']['id'];
					$Person->update($_POST['guardian_id'],$gData['person']);
			    	$nLastId = $_POST['guardian_id'];

				} else {

					$qData['child']['created_by'] = $_SESSION['member']['id'];
			    	$Child_person->insert($qData['child']);

			    }

		    	$count = 0;

		    	foreach ($_POST['document_name'] as $_fkey => $document) {
					
					$qNarray = Array();

		    		foreach ($document as $_pkey => $nValue) {
		    				
		    				$count++;

			    			if ($_FILES['document_file_'.$count]['size'] > 0) {

							    $image = $_FILES['child'];

								$results = uploadImage("documents/", $_FILES['document_file_'.$count] );

								foreach ($_POST['edit_document_id'] as $_dkey => $_dvalue) {
									if ($_dkey == $_phkey) {
										array_push($qNarray, $_dvalue);
									}
								}
								if (sizeof($qNarray)>0) {
								
							    $Person_document->update($qNarray[$count],array('person_id' => $nLastId, "document_id" => $_fkey, "document_name" => $nValue, "path"=>$results->imagePath, "updated_by"=>$_SESSION['member']['id'],"updated_at"=>date('Y-m-d H:i:s') ));

								}else{


							    $Person_document->insert(array('person_id' => $nLastId, "document_id" => $_fkey, "document_name" => $nValue, "path"=>$results->imagePath, "created_by"=>$_SESSION['member']['id'] ));
							}

						    }



		    			}


		    		
		    		}

			    if ($_FILES['father_image']['size'] > 0) {

				    $fImage = $_FILES['father_image'];

			    	$Photo->deletePhoto($fLastId);

					$results = uploadImage("images/father_images/", $fImage );

					if ($results->uploadStatus != "success") {

						$_SESSION['error'] = "Error: Failed to Upload your Image";
						
					}else{

				    	$Photo->insert(array('person_id' => $fLastId, "photo_path"=>$results->imagePath, "created_by"=>$_SESSION['member']['id'] ));

					}



			    }

			    if ($_FILES['mother_image']['size'] > 0) {

				    $mImage = $_FILES['mother_image'];

			    	$Photo->deletePhoto($mLastId);

					$results = uploadImage("images/mother_images/", $mImage );
	
					if ($results->uploadStatus != "success") {

						$_SESSION['error'] = "Error: Failed to Upload your Image";
						
					}else{


				    	$Photo->insert(array('person_id' => $mLastId, "photo_path"=>$results->imagePath, "created_by"=>$_SESSION['member']['id'] ));

					}


			    }
			   	if ($_FILES['guardian_image']['size'] > 0) {

				    $gImage = $_FILES['guardian_image'];

			    	$Photo->deletePhoto($gLastId);

					$results = uploadImage("images/guardian_images/", $gImage );

						if ($results->uploadStatus != "success") {

							$_SESSION['error'] = "Error: Failed to Upload your Image";
							redirectBack();
						}

				    	$Photo->insert(array('person_id' => $gLastId, "photo_path"=>$results->imagePath, "created_by"=>$_SESSION['member']['id'] ));

			    }

				if ($_FILES['person_image']['size'] > 0) {

				    $cImage = $_FILES['person_image'];

			    	$Photo->deletePhoto($nLastId);

					$results = uploadImage("images/child_images/", $cImage );

					if ($results->uploadStatus != "success") {

						$_SESSION['error'] = "Error: Failed to Upload your Image";
						redirectBack();
					}

				    $Photo->insert(array('person_id' => $nLastId, "photo_path"=>$results->imagePath, "created_by"=>$_SESSION['member']['id'] ));

			    }




		  //  }
		 //   die();
		    // $Phonenumber->deletePhoneNumber($nLastId);

		    // if (sizeof($_POST['phone_no']) > 0) {
		    	
			   //  foreach ($_POST['phone_no'] as $nkey => $phone) {
			    	
			   //  	$p_status = false;

      //           	$selId = '';

				  //  	foreach ($_POST['phone_number_ids'] as $_wekey => $reg) {
	                   
	     //                if ($reg == $phone) {
	                        
	     //                    $p_status = true;

	     //                    $selId = $_wekey;

	     //                }

	     //            }

	     //            if ($p_status == true) {

	     //                $Phonenumber->update($selId, array("phone_number"=>$phone, "voluntary_id"=>$nLastId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));

	                    
	     //            }else{

			   //  		$Phonenumber->insert(array('voluntary_id' => $nLastId, "phone_number"=>$phone, "created_by"=>$_SESSION['member']['id'] ));

			   //  	}
			   //  }

		    // }

		    //die("here");

		    $_SESSION['message'] = "Information Saved Successfull";

		    redirect('children', 'index');


	}


	if ($action == 'delete') {
		$id = $_GET['id'];
		
		$Person->update($id, array('status'=>'inactive'));

		$_SESSION['message'] = "Information Deleted Successfull";
		
		redirect('children', 'index');

	}

?>