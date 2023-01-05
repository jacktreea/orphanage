<?php 
    if ($action == "edit") {

            $tData['selected_behaviour'] = $Behaviour->find(array('id'=>$_GET['id']))[0];

            $action = "index";
        
        }
    if ($action == "index") {
        
        $tData['behaviours'] = $Behaviour->find(array('status'=>'active'));

        $data['content'] = loadTemplate('behaviour.tpl.php', $tData);
    }

    if ($action =="save") {

    	// echo "<pre>";
    	// print_r($_POST);
    	// die();

        foreach ($_POST['name'] as $key => $value) {
            $tData['name'] = $_POST['name'][$key];
            $tData['rate_size'] = $_POST['rate'][$key];
            $tData['status'] = $_POST['status'][$key];
            $tData['created_by'] = $_SESSION['member']['id'];

            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');
                $tData['updated_by'] = $_SESSION['member']['id'];
                $Behaviour->update($_POST['id'][$key], $tData);
                
            }else{

                 $Behaviour->insert($tData);

            }
            
        }
       // die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("behaviour", "index");
// die();
        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Behaviour->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("behaviour", "index");
    }

 ?>