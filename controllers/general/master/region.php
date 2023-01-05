<?php

    if ($action == "index") {

        $regions = $Region->getRegionDistrict('active');
        
         $tData['districts'] = $District->find(array('status'=>'active'));

         $ncount = 0;

           foreach ($regions as $dkey => $region) {

               $tData['_nregions'][$region['region_id']]['region_id'] = $region['region_id'];
               $tData['_nregions'][$region['region_id']]['region_name'] = $region['region_name'];
               $tData['_nregions'][$region['region_id']]['created_at'] = $region['created_at'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['district_id'] = $region['district_id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['region_district_id'] = $region['id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['district_name'] = $region['district_name'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['district_created_at'] = $region['district_created_at'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['ward_id'] = $region['ward_id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['ward_district_id'] = $region['ward_district_id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['ward_name'] = $region['ward_name'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['ward_created_at'] = $region['ward_created_at'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['streets'][$dkey]['street_id'] = $region['street_id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['streets'][$dkey]['street_name'] = $region['street_name'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['streets'][$dkey]['street_created_at'] = $region['street_created_at'];
               $ncount++;
           }

        //            echo "<pre>";
        // print_r($tData['_nregions']);
        // echo "<br>";
        // die();
       $data['content'] = loadTemplate('general/master/region.tpl.php', $tData);
    }


              if ($action =="save") {
            // var_dump($_POST);
            // die();
        foreach ($_POST['region_name'] as $key => $value) {

            $tData['name'] = $_POST['region_name'][$key];
            
            $tData['status'] = $_POST['region_status'][$key];
           


            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');

                $tData['updated_by'] = $_SESSION['member']['id'];
                
                $Region->update($_POST['id'][$key], $tData);

                $lastRegionId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $Region->insert($tData);

                 $lastRegionId = $Region->lastId();

            }
             //die("here");
            $Region_district->deleteRegionDistrict($lastRegionId);
            //die();

            foreach ($_POST['districts'] as $wkey => $district) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['district_ids'] as $_wekey => $dist) {
                   
                    if ($dist == $district) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }
               // var_dump("here");
                if ($p_status == true) {

                    $Region_district->update($selId, array("district_id"=>$district, "region_id"=>$lastRegionId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));

                    
                }else{

                    $Region_district->insert(array("district_id"=>$district, "region_id"=>$lastRegionId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }

       // die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("general/master/region", "index");

        
    }
    if ($action == "edit") {

        $region_id = $_GET['id'];
        
        $regions = $Region->getRegionDistrict('active', $region_id);
        
         $tData['districts'] = $District->find(array('status'=>'active'));

         $ncount = 0;

           foreach ($regions as $dkey => $region) {

               $tData['_nregions'][$region['region_id']]['region_id'] = $region['region_id'];
               $tData['_nregions'][$region['region_id']]['region_name'] = $region['region_name'];
               $tData['_nregions'][$region['region_id']]['created_at'] = $region['created_at'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['district_id'] = $region['district_id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['region_district_id'] = $region['id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['district_name'] = $region['district_name'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['district_created_at'] = $region['district_created_at'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['ward_id'] = $region['ward_id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['ward_district_id'] = $region['ward_district_id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['ward_name'] = $region['ward_name'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['ward_created_at'] = $region['ward_created_at'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['streets'][$dkey]['street_id'] = $region['street_id'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['streets'][$dkey]['street_name'] = $region['street_name'];
               $tData['_nregions'][$region['region_id']]['districts'][$region['district_id']]['wards'][$region['ward_id']]['streets'][$dkey]['street_created_at'] = $region['street_created_at'];
               $ncount++;
           }

        // echo "<pre>";
        // print_r($tData['_nregions']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('general/master/edit_region.tpl.php', $tData);


        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Region->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Deleted Successfull";
        
        redirect("general/master/region", "index");
    }

?>
