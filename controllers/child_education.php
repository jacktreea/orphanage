<?php


if ($action == "add") {

	$tData['schools'] = $School->find(array('status'=>'active'));

	$tData['child_image'] = $Photo->find(array('person_id'=>$_GET['person_id']))[0]['photo_path'];

	if($_GET['child_school_id'] != '') $tData['education_detail'] = $Child_school->getSchoolDetails($_GET['child_school_id'])[0];

			// echo "<pre>";
			// print_r($tData['education_detail']);
			// die();

	$data['content'] = loadTemplate('add_child_education.tpl.php', $tData);
}


if ($action == "save") {
	// 	echo "<pre>";
	//  print_r($_POST);
	// die();
		$tData['child_education'] = $_POST['child_education'];



		    if (($_POST['id'] != 'empty')) {

		    			echo "<pre>";
				print_r($_POST);
		    		
		    	$tData['child_education']['status'] = 'inactive';

		    	$tData['child_education']['updated_at'] = date('Y-m-d H:i:s');

		    	$tData['child_education']['updated_by'] = $_SESSION['member']['id'];

		    	$Child_school->update($_POST['id'], $tData['child_education']);


		    }

		    	$tData['child_education']['status'] = 'active';
		    	
		    	$tData['child_education']['created_by'] = $_SESSION['member']['id'];
		    	
		    	$Child_school->insert($tData['child_education']);

		    	$nLastId = $Child_school->lastid();


// die();
		    $_SESSION['message'] = "Information Saved Successfull";

		    redirect('child_education&child_school_id='.$nLastId.'&person_id='.$tData['child_education']['person_id'], 'add');

}




if($action=='ajax_school_level'){
    
    
    $school_id= $_GET['school_id'];

    $schools= $School->getSchoolLevel('active',$school_id);
            foreach ($schools as $dkey => $level) {
               $tData['levels'][$level['level_id']]['level_id'] = $level['level_id'];
               $tData['levels'][$level['level_id']]['level_name'] = $level['level_name'];
               $tData['levels'][$level['level_id']]['created_at'] = $level['created_at'];

           }

           $formattedArray = Array();
           foreach ($tData['levels'] as $key => $level) {
           	array_push($formattedArray, $level);
           }
    
     $data['content'] = $formattedArray;
    
    
}



if($action=='ajax_level_class'){
    
    $level_id= $_GET['level'];
    
    
    $classes= $School_level->getLevelClass('active', $level_id);

    //var_dump($classes);
            
            foreach ($classes as $dkey => $region) {
               $tData['classes'][$region['class_id']]['class_id'] = $region['class_id'];
               $tData['classes'][$region['class_id']]['class_name'] = $region['class_name'];
               $tData['classes'][$region['class_id']]['created_at'] = $region['created_at'];

           }

           $formattedArray = Array();
           foreach ($tData['classes'] as $key => $region) {
           	array_push($formattedArray, $region);
           }
    
     $data['content'] = $formattedArray;
}

