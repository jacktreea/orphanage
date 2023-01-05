<?php 
   if ($action == "edit") {

        $level_id = $_GET['id'];

        $tData['classes'] = $School_class->find(array('status'=>'active'));

        $levels = $School_level->getLevelClass('active',$level_id);

        foreach ($levels as $dkey => $level) {
               $tData['levels'][$level['level_id']]['level_id'] = $level['level_id'];
               $tData['levels'][$level['level_id']]['level_name'] = $level['level_name'];
               $tData['levels'][$level['level_id']]['created_at'] = $level['created_at'];
               $tData['levels'][$level['level_id']]['status'] = $level['status'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['subject_id'] = $level['subject_id'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['level_class_ids'] = $level['id'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['class_id'] = $level['class_id'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['class_name'] = $level['class_name'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['class_created_at'] = $level['class_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['levels']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('edit_level.tpl.php', $tData);


    }

	if ($action == "index") {
		
        $levels = $School_level->getLevelClass('active');

        $tData['classes'] = $School_class->find(array('status'=>'active'));

        foreach ($levels as $dkey => $level) {
               $tData['levels'][$level['level_id']]['level_id'] = $level['level_id'];
               $tData['levels'][$level['level_id']]['level_name'] = $level['level_name'];
               $tData['levels'][$level['level_id']]['created_at'] = $level['created_at'];
               $tData['levels'][$level['level_id']]['status'] = $level['status'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['class_id'] = $level['class_id'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['level_class_ids'] = $level['id'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['class_id'] = $level['class_id'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['class_name'] = $level['class_name'];
               $tData['levels'][$level['level_id']]['classes'][$level['class_id']]['class_created_at'] = $level['class_created_at'];
           }


        //  echo "<pre>";
        // print_r($tData['levels']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('school_level.tpl.php', $tData);

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
                
                $School_level->update($_POST['id'][$key], $tData);

                $lastLevelId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $School_level->insert($tData);

                 $lastLevelId = $School_level->lastId();

            }

            $Level_class->deleteLevelClass($lastLevelId);


            foreach ($_POST['classes'] as $wkey => $class) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['class_ids'] as $_wekey => $sub) {
                   
                    if ($sub == $class) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }

                if ($p_status == true) {

                    $Level_class->update($selId, array("class_id"=>$class, "level_id"=>$lastLevelId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));


                }else{

                    $Level_class->insert(array("class_id"=>$class, "level_id"=>$lastLevelId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }

        $_SESSION['message']="Infomation Saved Successfull";
        redirect("school_level", "index");
    }



    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $School_level->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("school_level", "index");
    }

 ?>