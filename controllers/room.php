<?php 
   if ($action == "edit") {

        $room_id = $_GET['id'];

		$rooms = $Room->getRoomItem('active', $room_id);

        $tData['items'] = $Item->find(array('status'=>'active'));

        foreach ($rooms as $dkey => $R) {
               $tData['rooms'][$R['room_id']]['room_id'] = $R['room_id'];
               $tData['rooms'][$R['room_id']]['room_name'] = $R['room_name'];
               $tData['rooms'][$R['room_id']]['created_at'] = $R['created_at'];
               $tData['rooms'][$R['room_id']]['status'] = $R['status'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['item_id'] = $R['item_id'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['room_item_ids'] = $R['id'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['item_id'] = $R['item_id'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['item_name'] = $R['item_name'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['item_created_at'] = $R['item_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['rooms']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('edit_room.tpl.php', $tData);


    }
	if ($action == "index") {

		$rooms = $Room->getRoomItem('active');

        $tData['items'] = $Item->find(array('status'=>'active'));

        foreach ($rooms as $dkey => $R) {
               $tData['rooms'][$R['room_id']]['room_id'] = $R['room_id'];
               $tData['rooms'][$R['room_id']]['room_name'] = $R['room_name'];
               $tData['rooms'][$R['room_id']]['created_at'] = $R['created_at'];
               $tData['rooms'][$R['room_id']]['status'] = $R['status'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['item_id'] = $R['item_id'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['room_item_ids'] = $R['id'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['item_id'] = $R['item_id'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['item_name'] = $R['item_name'];
               $tData['rooms'][$R['room_id']]['items'][$R['item_id']]['item_created_at'] = $R['item_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['rooms']);
        // echo "<br>";
        // die();

		$data['content'] = loadTemplate('room.tpl.php', $tData);
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
                
                $Room->update($_POST['id'][$key], $tData);

                $lastRoomId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $Room->insert($tData);

                 $lastRoomId = $Room_item->lastId();

            }

            $Room_item->deleteRoomItem($lastRoomId);


            foreach ($_POST['items'] as $wkey => $item) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['item_ids'] as $_wekey => $sub) {
                   
                    if ($sub == $item) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }

                if ($p_status == true) {

                    $Room_item->update($selId, array("item_id"=>$item, "room_id"=>$lastRoomId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));


                }else{

                    $Room_item->insert(array("item_id"=>$item, "room_id"=>$lastRoomId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }
        //die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("room", "index");

        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Room->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("room", "index");
    }

 ?>