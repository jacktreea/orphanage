<?php



if($action=='ajax_country_region'){
    
    
    $country_id= $_GET['country_id'];

    // var_dump($country_id);
    // die();
    
    
    $countries= $Country->getCountryRegion('active',$country_id);
            foreach ($countries as $dkey => $country) {
               $tData['regions'][$country['region_id']]['region_id'] = $country['region_id'];
               $tData['regions'][$country['region_id']]['region_name'] = $country['region_name'];
               $tData['regions'][$country['region_id']]['created_at'] = $country['created_at'];

           }

           $formattedArray = Array();
           foreach ($tData['regions'] as $key => $region) {
           	array_push($formattedArray, $region);
           }
    
     $data['content'] = $formattedArray;
    
    
}



if($action=='ajax_region_districts'){
    
    $region_id= $_GET['region_id'];

    if ($region_id == '') {

        $region_id = "empty";

    }
    
    
    $regions= $Region->getRegionDistrict('active', $region_id);
            
            foreach ($regions as $dkey => $region) {
               $tData['regions'][$region['district_id']]['district_id'] = $region['district_id'];
               $tData['regions'][$region['district_id']]['district_name'] = $region['district_name'];
               $tData['regions'][$region['district_id']]['created_at'] = $region['created_at'];

           }

           $formattedArray = Array();
           foreach ($tData['regions'] as $key => $region) {
           	array_push($formattedArray, $region);
           }
    
     $data['content'] = $formattedArray;
}


if($action=='ajax_district_wards'){
    
    
    $district_id= $_GET['district_id'];

    if ($district_id == '') {

        $district_id = "empty";
        
    }
    
    
    $districts= $District->getDistrictWard('active',$district_id);

    // var_dump($districts);
    // die();
    
            foreach ($districts as $dkey => $ward) {
               $tData['districts'][$ward['ward_id']]['ward_id'] = $ward['ward_id'];
               $tData['districts'][$ward['ward_id']]['ward_name'] = $ward['ward_name'];
               $tData['districts'][$ward['ward_id']]['created_at'] = $ward['created_at'];

           }

           $formattedArray = Array();
           foreach ($tData['districts'] as $key => $_ward) {
           	array_push($formattedArray, $_ward);
           }
    
     $data['content'] = $formattedArray;
     
     
}


if($action=='ajax_ward_streets'){
    
    $ward_id= $_GET['ward_id'];
    
    if ($ward_id == '') {

        $ward_id = "empty";
        
    }
    
    $wards= $Street->getStreetWard('active', $ward_id);

    // var_dump($wards);
    // die();
            foreach ($wards as $dkey => $ward) {
               $tData['wards'][$ward['street_id']]['street_id'] = $ward['street_id'];
               $tData['wards'][$ward['street_id']]['street_name'] = $ward['name'];
               $tData['wards'][$ward['street_id']]['created_at'] = $ward['created_at'];

           }

           $formattedArray = Array();

           foreach ($tData['wards'] as $key => $_ward) {

           	array_push($formattedArray, $_ward);

           }
    
     $data['content'] = $formattedArray;
     
     
}