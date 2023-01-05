<?php 
    if ($action == "edit") {

        $class_id = $_GET['id'];

        $classes = $School_class->getClassSubject('active', $class_id);
        
        $tData['subjects'] = $School_subject->find(array('status'=>'active'));


        foreach ($classes as $dkey => $class) {
               $tData['classes'][$class['class_id']]['class_id'] = $class['class_id'];
               $tData['classes'][$class['class_id']]['class_name'] = $class['class_name'];
               $tData['classes'][$class['class_id']]['created_at'] = $class['created_at'];
               $tData['classes'][$class['class_id']]['status'] = $class['status'];
               $tData['classes'][$class['class_id']]['subjects'][$class['subject_id']]['subject_id'] = $class['subject_id'];
               $tData['classes'][$class['class_id']]['subjects'][$class['subject_id']]['class_subject_ids'] = $class['id'];
               $tData['classes'][$class['class_id']]['subjects'][$class['subject_id']]['subject_name'] = $class['subject_name'];
               $tData['classes'][$class['class_id']]['subjects'][$class['subject_id']]['subject_created_at'] = $class['subject_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['classes']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('edit_class.tpl.php', $tData);


    }
    if ($action == "index") {
        
       $classes = $School_class->getClassSubject('active', null);


        
        $tData['subjects'] = $School_subject->find(array('status'=>'active'));


        foreach ($classes as $dkey => $class) {
               $tData['classes'][$class['class_id']]['class_id'] = $class['class_id'];
               $tData['classes'][$class['class_id']]['name'] = $class['class_name'];
               $tData['classes'][$class['class_id']]['created_at'] = $class['created_at'];
               $tData['classes'][$class['class_id']]['status'] = $class['status'];
               $tData['classes'][$class['class_id']]['subjects'][$class['subject_id']]['subject_id'] = $class['subject_id'];
               $tData['classes'][$class['class_id']]['subjects'][$class['subject_id']]['class_subject_id'] = $class['id'];
               $tData['classes'][$class['class_id']]['subjects'][$class['subject_id']]['subject_name'] = $class['subject_name'];
               $tData['classes'][$class['class_id']]['subjects'][$class['subject_id']]['subject_created_at'] = $class['subject_created_at'];
           }
        $tData['subjects'] = $School_subject->find(array('status'=>'active'));

        $data['content'] = loadTemplate('school_class.tpl.php', $tData);
    }

    if ($action =="save") {

        // echo("<pre>");
        // print_r($_POST);
        // die();


        foreach ($_POST['name'] as $key => $value) {

            $tData['name'] = $_POST['name'][$key];
            
            $tData['status'] = $_POST['status'][$key];
           


            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');

                $tData['updated_by'] = $_SESSION['member']['id'];
                
                $School_class->update($_POST['id'][$key], $tData);

                $lastClassId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $School_class->insert($tData);

                 $lastClassId = $School_class->lastId();

            }

            $Class_subject->deleteClassSubject($lastClassId);


            foreach ($_POST['subjects'] as $wkey => $subject) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['subject_ids'] as $_wekey => $sub) {
                   
                    if ($sub == $subject) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }



                if ($p_status == true) {

                    $Class_subject->update($selId, array("subject_id"=>$subject, "class_id"=>$lastClassId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));

            
                }else{

                    $Class_subject->insert(array("subject_id"=>$subject, "class_id"=>$lastClassId, 'created_by'=>$_SESSION['member']['id']));

                }
            }
                



                 

            
        }

        $_SESSION['message']="Infomation Saved Successfull";
        redirect("school_class", "index");

        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $School_class->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("school_class", "index");
    }

 ?>