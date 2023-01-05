<?php

    if ($action == "index") {

        $wards = $Street->getStreetWard('active');
        $tData['streets'] = $Street->find(array('status'=>'active'));

        foreach ($wards as $skey => $ward) {

            $tData['nwards'][$ward['ward_id']]['ward_id'] = $ward['ward_id'];
            $tData['nwards'][$ward['ward_id']]['ward_name'] = $ward['ward_name'];
            $tData['nwards'][$ward['ward_id']]['created_at'] = $ward['created_at'];
            $tData['nwards'][$ward['ward_id']]['streets'][$skey]['street_id'] = $ward['street_id'];
            $tData['nwards'][$ward['ward_id']]['streets'][$skey]['street_name'] = $ward['name'];
            $tData['nwards'][$ward['ward_id']]['streets'][$skey]['street_created_at'] = $ward['street_created_at'];

        }
        // echo "<pre>";
        // print_r($tData['nwards']);
        // echo "<br>";
        // die();

       $data['content'] = loadTemplate('general/master/ward.tpl.php', $tData);
    }

       if ($action =="save") {

        //  var_dump($_POST);
        // die();
        foreach ($_POST['ward_name'] as $key => $value) {

            $tData['name'] = $_POST['ward_name'][$key];
            
            $tData['status'] = $_POST['ward_status'][$key];
           


            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');

                $tData['updated_by'] = $_SESSION['member']['id'];
                
                $Ward->update($_POST['id'][$key], $tData);

                $lastwardId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $Ward->insert($tData);

                 $lastwardId = $Ward->lastId();

            }

            $Street_ward->deleletStreetWard($lastwardId);

            foreach ($_POST['streets'] as $wkey => $street) {

                $p_status = false;

                $selId = '';

                


                
                foreach ($_POST['street_ids'] as $_wekey => $wids) {
                   
                    if ($wids == $street) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }

                if ($p_status == true) {

                    $Street_ward->update($selId, array("street_id"=>$street, "ward_id"=>$lastwardId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));

                    
                }else{

                    $Street_ward->insert(array("street_id"=>$street, "ward_id"=>$lastwardId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }

        //die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("general/master/ward", "index");

        
    }
    if ($action == "edit") {
        $ward_id = $_GET['id'];
        $wards = $Street->getStreetWard('active', $ward_id);
        $tData['nstreets'] = $Street->find(array('status'=>'active'));

        foreach ($wards as $skey => $ward) {

            $tData['nward'][$ward['ward_id']]['ward_id'] = $ward['ward_id'];
            $tData['nward'][$ward['ward_id']]['ward_name'] = $ward['ward_name'];
            $tData['nward'][$ward['ward_id']]['created_at'] = $ward['created_at'];
            $tData['nward'][$ward['ward_id']]['status'] = $ward['status'];
            $tData['nward'][$ward['ward_id']]['streets'][$skey]['street_ward_id'] = $ward['id'];
            $tData['nward'][$ward['ward_id']]['streets'][$skey]['street_id'] = $ward['street_id'];
            $tData['nward'][$ward['ward_id']]['streets'][$skey]['street_name'] = $ward['name'];
            $tData['nward'][$ward['ward_id']]['streets'][$skey]['street_created_at'] = $ward['street_created_at'];

        }

        // echo "<pre>";
        // print_r($tData['nward']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('general/master/edit_ward.tpl.php', $tData);


        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Ward->update($_GET['id'], $tData);
        $Street_ward->deleletStreetWard($_GET['id']);

        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("general/master/ward", "index");
    }

?>