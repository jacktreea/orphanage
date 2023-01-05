<?php

	/**
	 * 
	 */
	class Floor_room extends model
	{
		
		var $table = "floor_rooms";

		function deleteFloorRooms($floor_id=""){

	        $sql = "update floor_rooms set status = 'inactive' where floor_id = $floor_id";

	        return executeQuery($sql);



		}
	}