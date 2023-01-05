<?php

/**
 * 
 */
class Level_class extends model
{
	
	var $table = "level_classes";



			function deleteLevelClass($level_id=""){

	        $sql = "update level_classes set status = 'inactive' where level_id = $level_id";

	        return executeQuery($sql);
	    }

}