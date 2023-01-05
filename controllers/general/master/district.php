<?php

    if ($action == "index") {

       $districts = $District->getDistrictWard('active');
         $tData['wards'] = $Ward->find(array('status'=>'active'));

         $ncount = 0;

           foreach ($districts as $dkey => $district) {

               $tData['ndistrict'][$district['district_id']]['district_id'] = $district['district_id'];
               $tData['ndistrict'][$district['district_id']]['district_name'] = $district['name'];
               $tData['ndistrict'][$district['district_id']]['created_at'] = $district['created_at'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['district_ward_id'] = $district['id'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_id'] = $district['ward_id'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_name'] = $district['ward_name'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_created_at'] = $district['ward_created_at'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_streets'][$dkey]['street_id'] = $district['street_id'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_streets'][$dkey]['street_name'] = $district['street_name'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_streets'][$dkey]['street_created_at'] = $district['street_created_at'];
               $ncount++;
           }


        //            echo "<pre>";
        // print_r($tData['ndistrict']);
        // echo "<br>";
        // die();
       $data['content'] = loadTemplate('general/master/district.tpl.php', $tData);
    }

           if ($action =="save") {
            // var_dump($_POST);
            // die();
        foreach ($_POST['district_name'] as $key => $value) {

            $tData['name'] = $_POST['district_name'][$key];
            
            $tData['status'] = $_POST['district_status'][$key];
           


            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');

                $tData['updated_by'] = $_SESSION['member']['id'];
                
                $District->update($_POST['id'][$key], $tData);

                $lastDistrictId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $District->insert($tData);

                 $lastDistrictId = $District->lastId();

            }
             //die("here");
            $District_ward->deleletDistrictWard($lastDistrictId);
            //die();

            foreach ($_POST['wards'] as $wkey => $ward) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['ward_ids'] as $_wekey => $wids) {
                   
                    if ($wids == $ward) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }
               // var_dump("here");
                if ($p_status == true) {

                    $District_ward->update($selId, array("ward_id"=>$ward, "district_id"=>$lastDistrictId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));

                    
                }else{

                    $District_ward->insert(array("ward_id"=>$ward, "district_id"=>$lastDistrictId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }

       // die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("general/master/district", "index");

        
    }
    if ($action == "edit") {
        $district_id = $_GET['id'];
       $districts = $District->getDistrictWard('active', $district_id);
         $tData['wards'] = $Ward->find(array('status'=>'active'));

           foreach ($districts as $dkey => $district) {

               $tData['ndistrict'][$district['district_id']]['district_id'] = $district['district_id'];
               $tData['ndistrict'][$district['district_id']]['district_name'] = $district['name'];
               $tData['ndistrict'][$district['district_id']]['created_at'] = $district['created_at'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['district_ward_id'] = $district['id'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_id'] = $district['ward_id'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_name'] = $district['ward_name'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_created_at'] = $district['ward_created_at'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_streets'][$dkey]['street_id'] = $district['ward_id'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_streets'][$dkey]['street_name'] = $district['ward_name'];
               $tData['ndistrict'][$district['district_id']]['wards'][$district['ward_id']]['ward_streets'][$dkey]['street_created_at'] = $district['ward_created_at'];
         
           }

        // echo "<pre>";
        // print_r($districts);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('general/master/edit_district.tpl.php', $tData);


        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $District->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Deleted Successfull";
        
        redirect("general/master/district", "index");
    }

?>

