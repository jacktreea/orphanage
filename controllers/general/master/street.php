<?php
    
    if ($action == "edit") {

            $tData['selected_street'] = $Street->find(array('id'=>$_GET['id']))[0];

            $action = "index";
        
        }

    if ($action == "index") {

            $tData['streets'] = $Street->find(array('status'=>'active'));

            $data['content'] = loadTemplate('general/master/street.tpl.php', $tData);
    }

    if ($action =="save") {

        foreach ($_POST['street_name'] as $key => $value) {
            $tData['name'] = $_POST['street_name'][$key];
            $tData['status'] = $_POST['street_status'][$key];
            $tData['created_by'] = $_SESSION['member']['id'];

            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');
                $tData['updated_by'] = $_SESSION['member']['id'];
                $Street->update($_POST['id'][$key], $tData);
                
            }else{

                 $Street->insert($tData);

            }
            
        }
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("general/master/street", "index");

        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Street->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("general/master/street", "index");
    }

?>