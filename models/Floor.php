<?php

	/**
	 * 
	 */
	class Floor extends model
	{
		
		var $table = "floors";



				function getFloorRoom($status="", $floor_id="", $room_id=""){
			        $sql = "select 
								f.name as floor_name,
                                f.created_at as floor_created_at,
                                r.created_at as room_created_at,
                                r.name as room_name,
                                fr.*
			                    from floors as f
                                inner join floor_rooms as fr on fr.floor_id = f.id
                                inner join rooms as r on fr.room_id = r.id
                                where 1=1 ";

			        if($status)$sql.=" and f.status='$status'";
			        if($status)$sql.=" and fr.status='$status'";
			        if($status)$sql.=" and r.status='$status'";
			        if($floor_id)$sql.=" and f.id = $floor_id";
			        if($room_id)$sql.=" and r.id=$room_id";
			        
			        $sql.=" order by f.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }


	}