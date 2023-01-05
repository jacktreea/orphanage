<?php 

	/**
	 * summary
	 */
	class Region extends model
	{
		var $table = "regions";

				    function getRegionDistrict($status="", $region_id="",  $district_id="", $street_id="", $ward_id=""){
			        $sql = "select 
			                    r.name as region_name,
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
                                rd.*
			                    from regions as r
                                inner join region_districts as rd on rd.region_id = r.id
			                    inner join district_wards as dw on dw.district_id = rd.district_id 
			                    inner join wards as w on w.id = dw.ward_id 
                                inner join street_wards as sw on sw.ward_id = dw.ward_id
                                inner join streets as s on s.id = sw.street_id
                                inner join districts as d on d.id = dw.district_id
                                
                                where 1=1 ";

			        if($status)$sql.=" and d.status='$status'";
			        if($status)$sql.=" and dw.status='$status'";
			        if($status)$sql.=" and rd.status='$status'";
			        if($status)$sql.=" and r.status='$status'";
			        if($status)$sql.=" and w.status='$status'";
			        if($status)$sql.=" and sw.status='$status'";
			        if($status)$sql.=" and s.status='$status'";
			        if($district_id)$sql.=" and d.id = $district_id";
			        if($ward_id)$sql.=" and w.id=$ward_id";
			        if($region_id)$sql.=" and r.id=$region_id";

			        $sql.=" order by r.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }


	}

 ?>