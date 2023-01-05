<?php

	/**
	 * 
	 */
	class Build_floor extends model
	{
		
		var $table = "build_floors";

		function deleteBuildFloor($build_id=""){

	        $sql = "update build_floors set status = 'inactive' where build_id = $build_id";

	        return executeQuery($sql);
	    }

	}
