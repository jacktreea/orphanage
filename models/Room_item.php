<?php

	/**
	 * 
	 */
	class Room_item extends model
	{
		
		var $table = "room_items";


		function deleteRoomItem($room_id=""){

	        $sql = "update room_items set status = 'inactive' where room_id = $room_id";

	        return executeQuery($sql);
	    }


	}