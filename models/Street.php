<?


/**
 * summary
 */
class Street extends model
{
	var $table = "streets";

    function getStreetWard($status="", $ward_id=""){
        $sql = "select 
                    s.name,
                    s.created_at as street_created_at,
                    s.status,
                    w.created_at,  
                    w.name as ward_name , 
                    sw.* 
                    from streets as s 
                    inner join street_wards as sw on sw.street_id = s.id 
                    inner join wards as w on w.id = sw.ward_id where 1=1 ";

        if($status)$sql.=" and s.status='$status'";
        if($status)$sql.=" and sw.status='$status'";
        if($ward_id)$sql.=" and w.id=$ward_id";

        $sql.=" order by s.created_at desc";

        // echo "<pre>";
        // print_r($sql);
        // echo "<br>";
        // die();

        return fetchRows($sql);
    }
}