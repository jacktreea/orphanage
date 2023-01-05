<?php 
    if ($action == "edit") {

            $tData['selected_icd_code'] = $Icd_code->find(array('id'=>$_GET['id']))[0];

            $action = "index";
        
        }
    if ($action == "index") {
        
        $tData['icd_codes'] = $Icd_code->find(array('status'=>'active'),"id desc", (isset($_GET['count']))? $_GET['count']+100 : 100 );

        $data['content'] = loadTemplate('icd_code.tpl.php', $tData);
    }

    if ($action =="save") {
        // echo "<pre>";
        // print_r($_POST);
        // die();
        foreach ($_POST['type'] as $key => $value) {
            $tData['type'] = $_POST['type'][$key];
            $tData['code'] = $_POST['code'][$key];
            $tData['description'] = $_POST['description'][$key];
            $tData['status'] = $_POST['status'][$key];
            $tData['created_by'] = $_SESSION['member']['id'];

            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');
                $tData['updated_by'] = $_SESSION['member']['id'];
                $Icd_code->update($_POST['id'][$key], $tData);
                
            }else{

                 $Icd_code->insert($tData);

            }
            
        }
     //die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("icd_codes", "index");
// die();
        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Icd_code->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("icd_codes", "index");
    }

 ?>