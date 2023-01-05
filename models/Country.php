<?php 

	/**
	 * summary
	 */
	class Country extends model
	{
		var $table = "countries";


				    function getCountryRegion($status="", $country_id="", $region_id="",  $district_id="", $street_id="", $ward_id=""){
			        $sql = "select 
								c.name as country_name,
                                c.created_at as country_created_at,
			                    r.name as region_name,
			                    r.created_at as region_created_at,
                                d.id as district_id,
                                d.name as district_name,
                                dw.id as district_ward_id,
                                sw.id as ward_street_id,
                                
			                    d.created_at as district_created_at,
			                    d.status,
			                    s.id as street_id,
			                    s.created_at as street_created_at,  
			                    s.name as street_name ,
                                w.name as ward_name,
                                w.id as ward_id,
                                w.created_at as ward_created_at,
                                cr.*
			                    from countries as c
                                inner join country_regions as cr on cr.country_id = c.id
                                
                                inner join region_districts as rd on rd.region_id = cr.region_id
                                inner join regions as r on r.id = rd.region_id
			                    inner join district_wards as dw on dw.district_id = rd.district_id 
			                    inner join wards as w on w.id = dw.ward_id 
                                inner join street_wards as sw on sw.ward_id = dw.ward_id
                                inner join streets as s on s.id = sw.street_id
                                inner join districts as d on d.id = dw.district_id
                                
                                where 1=1 ";

			        if($status)$sql.=" and d.status='$status'";
			        if($status)$sql.=" and c.status='$status'";
			        if($status)$sql.=" and cr.status='$status'";
			        if($status)$sql.=" and dw.status='$status'";
			        if($status)$sql.=" and rd.status='$status'";
			        if($status)$sql.=" and w.status='$status'";
			        if($status)$sql.=" and sw.status='$status'";
			        if($status)$sql.=" and s.status='$status'";
			        if($district_id)$sql.=" and d.id = $district_id";
			        if($country_id)$sql.=" and c.id = $country_id";
			        if($ward_id)$sql.=" and w.id=$ward_id";
			        if($region_id)$sql.=" and r.id=$region_id";
			        if($street_id)$sql.=" and s.id=$street_id";

			        $sql.=" order by r.created_at,r.id, c.id,d.id,s.id, w.id desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }




	}
 ?>