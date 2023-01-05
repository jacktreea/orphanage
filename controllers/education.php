<?php 
   if ($action == "edit") {

        $school_id = $_GET['id'];

		$Schools = $School->getSchoolLevel('active', $school_id);

        $tData['levels'] = $School_level->find(array('status'=>'active'));

        foreach ($Schools as $dkey => $School) {
               $tData['schools'][$School['school_id']]['school_id'] = $School['school_id'];
               $tData['schools'][$School['school_id']]['school_name'] = $School['school_name'];
               $tData['schools'][$School['school_id']]['created_at'] = $School['created_at'];
               $tData['schools'][$School['school_id']]['status'] = $School['status'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['level_id'] = $School['level_id'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['school_level_ids'] = $School['id'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['level_id'] = $School['level_id'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['level_name'] = $School['level_name'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['level_created_at'] = $School['level_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['schools']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('edit_school.tpl.php', $tData);


    }
	if ($action == "index") {

		$Schools = $School->getSchoolLevel('active');

        $tData['levels'] = $School_level->find(array('status'=>'active'));

        foreach ($Schools as $dkey => $School) {
               $tData['schools'][$School['school_id']]['school_id'] = $School['school_id'];
               $tData['schools'][$School['school_id']]['school_name'] = $School['school_name'];
               $tData['schools'][$School['school_id']]['created_at'] = $School['created_at'];
               $tData['schools'][$School['school_id']]['status'] = $School['status'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['level_id'] = $School['level_id'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['school_level_ids'] = $School['id'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['level_id'] = $School['level_id'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['level_name'] = $School['level_name'];
               $tData['schools'][$School['school_id']]['levels'][$School['level_id']]['level_created_at'] = $School['level_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['schools']);
        // echo "<br>";
        // die();

		$data['content'] = loadTemplate('education.tpl.php', $tData);
	}

	   if ($action =="save") {
        // echo "<pre>";
        // print_r($_POST);
        // echo "<br>";
        // die();
        foreach ($_POST['name'] as $key => $value) {

            $tData['name'] = $_POST['name'][$key];
            
            $tData['status'] = $_POST['status'][$key];
           


            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');

                $tData['updated_by'] = $_SESSION['member']['id'];
                
                $School->update($_POST['id'][$key], $tData);

                $lastSchoolId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $School->insert($tData);

                 $lastSchoolId = $School_level->lastId();

            }

            $School_levels->deleteSchoolLevel($lastSchoolId);


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

                    $School_levels->update($selId, array("level_id"=>$level, "school_id"=>$lastSchoolId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));


                }else{

                    $School_levels->insert(array("level_id"=>$level, "school_id"=>$lastSchoolId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }
        //die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("education", "index");

        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $School_level->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("education", "index");
    }

 ?>