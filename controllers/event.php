<?php 
    if ($action == "edit") {
       
            $tData['selected_event'] = $Event->find(array('id'=>$_GET['id']))[0];

            $action = "edit_list";


    }


    if ($action == "edit_list") {

            $tData['events'] = $Event->find(array('status'=>'active'));

            $data['content'] = loadTemplate('edit_event_list.tpl.php', $tData);

        }
    if ($action == "index") {
        
        $tData['events'] = $Event->getFormatedEvent();

        $data['content'] = loadTemplate('event.tpl.php', $tData);
    }

    if ($action =="save") {
        // var_dump($_POST);
        // die();
        foreach ($_POST['name'] as $key => $value) {
            $tData['name'] = $_POST['name'][$key];
            $tData['color'] = $_POST['event_color'][$key];
            $tData['venue'] = $_POST['venue'][$key];
            $tData['event_start_date'] = $_POST['start_date'][$key];
            $tData['event_end_date'] = $_POST['end_date'][$key];
            $tData['created_by'] = $_SESSION['member']['id'];

            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');
                $tData['updated_by'] = $_SESSION['member']['id'];
                $Event->update($_POST['id'][$key], $tData);
                
            }else{

                 $Event->insert($tData);

            }
            
        }
        //die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("event", "index");
// die();
        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Event->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("event", "index");
    }

 ?>