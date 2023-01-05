<?php 
   if ($action == "edit") {

        $Grade_id = $_GET['id'];

		$Grades = $Grade->getGradeLevels('active', $Grade_id);

        $tData['levels'] = $School_level->find(array('status'=>'active'));

        foreach ($Grades as $dkey => $grade) {
               $tData['grades'][$grade['grade_id']]['grade_id'] = $grade['grade_id'];
               $tData['grades'][$grade['grade_id']]['grade_name'] = $grade['grade_name'];
               $tData['grades'][$grade['grade_id']]['range_from'] = $grade['range_from'];
               $tData['grades'][$grade['grade_id']]['range_to'] = $grade['range_to'];
               $tData['grades'][$grade['grade_id']]['grade_created_at'] = $grade['grade_created_at'];
               $tData['grades'][$grade['grade_id']]['status'] = $grade['status'];
               $tData['grades'][$grade['grade_id']]['levels'][$grade['level_id']]['level_id'] = $grade['level_id'];
               $tData['grades'][$grade['grade_id']]['levels'][$grade['level_id']]['grade_level_ids'] = $grade['id'];
               $tData['grades'][$grade['grade_id']]['levels'][$grade['level_id']]['level_name'] = $grade['level_name'];
               $tData['grades'][$grade['grade_id']]['levels'][$grade['level_id']]['level_created_at'] = $grade['level_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['grades']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('edit_grade.tpl.php', $tData);


    }
	if ($action == "index") {

		$Grades = $Grade->getGradeLevels('active');

        $tData['levels'] = $School_level->find(array('status'=>'active'));

        foreach ($Grades as $dkey => $grade) {
               $tData['nlevels'][$grade['level_id']]['level_id'] = $grade['level_id'];
               $tData['nlevels'][$grade['level_id']]['level_name'] = $grade['level_name'];
               $tData['nlevels'][$grade['level_id']]['level_created_at'] = $grade['level_created_at'];
               $tData['nlevels'][$grade['level_id']]['status'] = $grade['status'];
               $tData['nlevels'][$grade['level_id']]['grades'][$grade['grade_id']]['grade_id'] = $grade['grade_id'];
               $tData['nlevels'][$grade['level_id']]['grades'][$grade['grade_id']]['grade_level_ids'] = $grade['id'];
               $tData['nlevels'][$grade['level_id']]['grades'][$grade['grade_id']]['grade_name'] = $grade['grade_name'];
               $tData['nlevels'][$grade['level_id']]['grades'][$grade['grade_id']]['range_from'] = $grade['range_from'];
               $tData['nlevels'][$grade['level_id']]['grades'][$grade['grade_id']]['range_to'] = $grade['range_to'];
               $tData['nlevels'][$grade['level_id']]['grades'][$grade['grade_id']]['grade_created_at'] = $grade['grade_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['levels']);
        // echo "<br>";
        // die();

		$data['content'] = loadTemplate('grade.tpl.php', $tData);
	}

	   if ($action =="save") {
        // echo "<pre>";
        // print_r($_POST);
        // echo "<br>";
        // die();
        foreach ($_POST['name'] as $key => $value) {

            $tData['name'] = $_POST['name'][$key];
            $tData['range_from'] = $_POST['range_from'][$key];
            $tData['range_to'] = $_POST['range_to'][$key];
            
            $tData['status'] = $_POST['status'][$key];
           


            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');

                $tData['updated_by'] = $_SESSION['member']['id'];
                
                $Grade->update($_POST['id'][$key], $tData);

                $lastGradeId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $Grade->insert($tData);

                 $lastGradeId = $Grade_level->lastId();

            }

            $Grade_level->deleteGradeLevel($lastGradeId);


            foreach ($_POST['levels'] as $wkey => $level) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['level_ids'] as $_wekey => $sub) {
                   
                    if ($sub == $level) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }

                if ($p_status == true) {

                    $Grade_level->update($selId, array("level_id"=>$level, "grade_id"=>$lastGradeId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));


                }else{

                    $Grade_level->insert(array("level_id"=>$level, "grade_id"=>$lastGradeId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }
        //die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("grade", "index");

        
    }

    if ($action == "delete") {
        // var_dump($_POST);
        // die();
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Grade->update($_GET['id'], $tData);
        $Grade_level->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("grade", "index");
    }

 ?>