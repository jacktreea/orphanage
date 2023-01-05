<?
/**
 * 
 */
class School_levels extends model
{
	
	var $table  = "school_levels";


		function deleteSchoolLevel($school_id=""){

	        $sql = "update school_levels set status = 'inactive' where school_id = $school_id";

	        return executeQuery($sql);
	    }

}