<?php

	/**
	 * 
	 */
	class Room extends model
	{
		
		var $table = "rooms";


		function getRoomItem($status="", $room_id="", $item_id=""){
			        $sql = "select 
								r.name as room_name,
                                r.created_at as room_created_at,
                                i.created_at as item_created_at,
                                i.name as item_name,
                                ri.*
			                    from rooms as r
                                inner join room_items as ri on ri.room_id = r.id
                                inner join items as i on ri.item_id = i.id
                                where 1=1 ";

			        if($status)$sql.=" and r.status='$status'";
			        if($status)$sql.=" and ri.status='$status'";
			        if($status)$sql.=" and i.status='$status'";
			        if($room_id)$sql.=" and r.id = $room_id";
			        if($item_id)$sql.=" and i.id=$item_id";
			        
			        $sql.=" order by r.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }
	}