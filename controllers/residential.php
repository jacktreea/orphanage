<?php 
   if ($action == "edit") {

        $Build_id = $_GET['id'];

        $Builds = $Build->getBuildFloor('active', $Build_id);

        $tData['floors'] = $Floor->find(array('status'=>'active'));

        foreach ($Builds as $dkey => $R) {
               $tData['builds'][$R['build_id']]['build_id'] = $R['build_id'];
               $tData['builds'][$R['build_id']]['build_name'] = $R['build_name'];
               $tData['builds'][$R['build_id']]['created_at'] = $R['created_at'];
               $tData['builds'][$R['build_id']]['status'] = $R['status'];
               $tData['builds'][$R['build_id']]['floors'][$R['floor_id']]['build_floor_ids'] = $R['id'];
               $tData['builds'][$R['build_id']]['floors'][$R['floor_id']]['floor_id'] = $R['floor_id'];
               $tData['builds'][$R['build_id']]['floors'][$R['floor_id']]['floor_name'] = $R['floor_name'];
               $tData['builds'][$R['build_id']]['floors'][$R['floor_id']]['floor_created_at'] = $R['floor_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['builds']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('edit_build.tpl.php', $tData);


    }
    if ($action == "index") {

        $Builds = $Build->getBuildFloor('active');

        $tData['floors'] = $Floor->find(array('status'=>'active'));

        foreach ($Builds as $dkey => $R) {
               $tData['builds'][$R['build_id']]['build_id'] = $R['build_id'];
               $tData['builds'][$R['build_id']]['build_name'] = $R['build_name'];
               $tData['builds'][$R['build_id']]['created_at'] = $R['created_at'];
               $tData['builds'][$R['build_id']]['status'] = $R['status'];
               $tData['builds'][$R['build_id']]['floors'][$R['floor_id']]['build_floor_ids'] = $R['id'];
               $tData['builds'][$R['build_id']]['floors'][$R['floor_id']]['floor_id'] = $R['floor_id'];
               $tData['builds'][$R['build_id']]['floors'][$R['floor_id']]['floor_name'] = $R['floor_name'];
               $tData['builds'][$R['build_id']]['floors'][$R['floor_id']]['floor_created_at'] = $R['floor_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['builds']);
        // echo "<br>";
        // die();

        $data['content'] = loadTemplate('residential.tpl.php', $tData);
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
                
                $Build->update($_POST['id'][$key], $tData);

                $lastBuildId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $Build->insert($tData);

                 $lastBuildId = $Build->lastId();

            }

            $Build_floor->deleteBuildFloor($lastBuildId);


            foreach ($_POST['floors'] as $wkey => $Floor) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['floor_ids'] as $_wekey => $sub) {
                   
                    if ($sub == $Floor) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }

                if ($p_status == true) {

                    $Build_floor->update($selId, array("floor_id"=>$Floor, "build_id"=>$lastBuildId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));


                }else{

                    $Build_floor->insert(array("floor_id"=>$Floor, "build_id"=>$lastBuildId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }
       // die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("residential", "index");

        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Build->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("residential", "index");
    }

 ?>