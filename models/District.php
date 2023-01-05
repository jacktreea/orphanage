<?php 

	/**
	 * summary
	 */
	class District extends model
	{
		var $table = "districts";

		    function getDistrictWard($status="", $district_id="", $street_id="", $ward_id=""){
			        $sql = "select 
			                    d.name,
			                    d.created_at,
			                    d.status,
			                    s.id as street_id,
			                    s.created_at as street_created_at,  
			                    s.name as street_name , 
			                    dw.*,
                                w.name as ward_name,
                                w.id as ward_id,
                                w.created_at as ward_created_at
			                    from districts as d 
			                    inner join district_wards as dw on dw.district_id = d.id 
			                    inner join wards as w on w.id = dw.ward_id 
                                inner join street_wards as sw on sw.ward_id = dw.ward_id
                                inner join streets as s on s.id = sw.street_id
                                
                                where 1=1 ";

			        if($status)$sql.=" and d.status='$status'";
			        if($status)$sql.=" and dw.status='$status'";
			        if($status)$sql.=" and w.status='$status'";
			        if($status)$sql.=" and sw.status='$status'";
			        if($status)$sql.=" and s.status='$status'";
			        if($district_id)$sql.=" and d.id = $district_id";
			        if($ward_id)$sql.=" and w.id=$ward_id";

			        $sql.=" order by d.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }
	}

 ?>