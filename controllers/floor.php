<?php 
   if ($action == "edit") {

        $Floor_id = $_GET['id'];

		$Floors = $Floor->getFloorRoom('active', $Floor_id);

        $tData['rooms'] = $Room->find(array('status'=>'active'));

        foreach ($Floors as $dkey => $R) {
               $tData['floors'][$R['floor_id']]['floor_id'] = $R['floor_id'];
               $tData['floors'][$R['floor_id']]['floor_name'] = $R['floor_name'];
               $tData['floors'][$R['floor_id']]['created_at'] = $R['created_at'];
               $tData['floors'][$R['floor_id']]['status'] = $R['status'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['room_id'] = $R['room_id'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['floor_room_ids'] = $R['id'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['room_id'] = $R['room_id'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['room_name'] = $R['room_name'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['item_created_at'] = $R['item_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['floors']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('edit_floor.tpl.php', $tData);


    }
	if ($action == "index") {

		$Floors = $Floor->getFloorRoom('active');

        $tData['rooms'] = $Room->find(array('status'=>'active'));

        foreach ($Floors as $dkey => $R) {
               $tData['floors'][$R['floor_id']]['floor_id'] = $R['floor_id'];
               $tData['floors'][$R['floor_id']]['floor_name'] = $R['floor_name'];
               $tData['floors'][$R['floor_id']]['created_at'] = $R['created_at'];
               $tData['floors'][$R['floor_id']]['status'] = $R['status'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['room_id'] = $R['room_id'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['floor_room_ids'] = $R['id'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['room_id'] = $R['room_id'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['room_name'] = $R['room_name'];
               $tData['floors'][$R['floor_id']]['rooms'][$R['room_id']]['item_created_at'] = $R['item_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['floors']);
        // echo "<br>";
        // die();

		$data['content'] = loadTemplate('floor.tpl.php', $tData);
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
                
                $Floor->update($_POST['id'][$key], $tData);

                $lastFloorId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $Floor->insert($tData);

                 $lastFloorId = $Floor_room->lastId();

            }

            $Floor_room->deleteFloorRooms($lastFloorId);


            foreach ($_POST['rooms'] as $wkey => $Room) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['room_ids'] as $_wekey => $sub) {
                   
                    if ($sub == $Room) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }

                if ($p_status == true) {

                    $Floor_room->update($selId, array("room_id"=>$Room, "floor_id"=>$lastFloorId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));


                }else{

                    $Floor_room->insert(array("room_id"=>$Room, "floor_id"=>$lastFloorId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }
        //die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("floor", "index");

        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Floor->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("floor", "index");
    }

 ?>