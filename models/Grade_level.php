<?php

/**
 * 
 */
class Grade_level extends model
{
	
	var $table = "grade_levels";

		function deleteGradeLevel($grade_id=""){

	        $sql = "update grade_levels set status = 'inactive' where grade_id = $grade_id";

	        return executeQuery($sql);
	    }
}