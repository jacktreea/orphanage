<?php

    if ($action == "index") {

        $countries = $Country->getCountryRegion('active');

        $tData['regions'] = $Region->find(array("status"=>'active'));

        foreach ($countries as $dkey => $country) {
               $tData['_pcountries'][$country['country_id']]['country_id'] = $country['country_id'];
               $tData['_pcountries'][$country['country_id']]['country_name'] = $country['country_name'];
               $tData['_pcountries'][$country['country_id']]['created_at'] = $country['created_at'];
               $tData['_pcountries'][$country['country_id']]['regions'][$country['region_id']]['region_id'] = $country['region_id'];
               $tData['_pcountries'][$country['country_id']]['regions'][$country['region_id']]['country_region_id'] = $country['id'];
               $tData['_pcountries'][$country['country_id']]['regions'][$country['region_id']]['region_name'] = $country['region_name'];
               $tData['_pcountries'][$country['country_id']]['regions'][$country['region_id']]['region_created_at'] = $country['region_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['_pcountries']);
        // echo "<br>";
        // die();

        $data['content'] = loadTemplate('general/master/country.tpl.php', $tData);
    
    }

    if ($action =="save") {
// var_dump($_POST);
// die();
        foreach ($_POST['country_name'] as $key => $value) {

            $tData['name'] = $_POST['country_name'][$key];
            
            $tData['status'] = $_POST['country_status'][$key];
           


            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');

                $tData['updated_by'] = $_SESSION['member']['id'];
                
                $Country->update($_POST['id'][$key], $tData);

                $lastCountryId = $_POST['id'][$key];
                
            }else{

                 $tData['created_by'] = $_SESSION['member']['id'];

                 $Country->insert($tData);

                 $lastCountryId = $Country->lastId();

            }

            $Country_region->deleteCountryRegion($lastCountryId);


            foreach ($_POST['regions'] as $wkey => $region) {

                $p_status = false;

                $selId = '';

                foreach ($_POST['region_ids'] as $_wekey => $reg) {
                   
                    if ($reg == $region) {
                        
                        $p_status = true;

                        $selId = $_wekey;

                    }

                }
               // var_dump("here");
                if ($p_status == true) {

                    $Country_region->update($selId, array("region_id"=>$region, "country_id"=>$lastCountryId, "status"=>'active', 'updated_at'=>date('Y-m-d H:i:s'), 'updated_by'=>$_SESSION['member']['id']));

                    
                }else{

                    $Country_region->insert(array("region_id"=>$region, "country_id"=>$lastCountryId, 'created_by'=>$_SESSION['member']['id']));

                }
                
                
            }

                 

            
        }

       // die();
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("general/master/country", "index");

        
    }
    if ($action == "edit") {

        $country_id = $_GET['id'];

        $countries = $Country->getCountryRegion('active', $country_id);
        
        $tData['regions'] = $Region->find(array('status'=>'active'));

        foreach ($countries as $dkey => $country) {
               $tData['_pcountries'][$country['country_id']]['country_id'] = $country['country_id'];
               $tData['_pcountries'][$country['country_id']]['country_name'] = $country['country_name'];
               $tData['_pcountries'][$country['country_id']]['created_at'] = $country['created_at'];
               $tData['_pcountries'][$country['country_id']]['status'] = $country['status'];
               $tData['_pcountries'][$country['country_id']]['regions'][$country['region_id']]['region_id'] = $country['region_id'];
               $tData['_pcountries'][$country['country_id']]['regions'][$country['region_id']]['country_region_id'] = $country['id'];
               $tData['_pcountries'][$country['country_id']]['regions'][$country['region_id']]['region_name'] = $country['region_name'];
               $tData['_pcountries'][$country['country_id']]['regions'][$country['region_id']]['region_created_at'] = $country['region_created_at'];
           }

        // echo "<pre>";
        // print_r($tData['regions']);
        // echo "<br>";
        // die();
        $data['content'] = loadTemplate('general/master/edit_country.tpl.php', $tData);


    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Country->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Deleted Successfull";
        
        redirect("general/master/country", "index");
    }

?>
