<?php 
    if ($action == "edit") {

            $tData['selected_subject'] = $School_subject->find(array('id'=>$_GET['id']))[0];

            $action = "index";
        
        }
    if ($action == "index") {
        
        $tData['types'] = $School_subject->find(array('status'=>'active'));

        $data['content'] = loadTemplate('school_subject.tpl.php', $tData);
    }

    if ($action =="save") {

        foreach ($_POST['name'] as $key => $value) {
            $tData['name'] = $_POST['name'][$key];
            $tData['status'] = $_POST['status'][$key];
            $tData['created_by'] = $_SESSION['member']['id'];

            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');
                $tData['updated_by'] = $_SESSION['member']['id'];
                $School_subject->update($_POST['id'][$key], $tData);
                
            }else{

                 $School_subject->insert($tData);

            }
            
        }
       // die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("school_subject", "index");
// die();
        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $School_subject->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("school_subject", "index");
    }

 ?>