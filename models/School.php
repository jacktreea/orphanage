<?php




/**
 * 
 */
class School extends model
{
	var $table = "schools";

		function getSchoolLevel($status="", $school_id="", $level_id=""){
			        $sql = "select 
								s.name as school_name,
                                s.created_at as school_created_at,
                                l.created_at as level_created_at,
                                l.name as level_name,
                                sl.*
			                    from schools as s
                                inner join school_levels as sl on sl.school_id = s.id
                                inner join s_levels as l on sl.level_id = l.id
                                where 1=1  ";

			        if($status)$sql.=" and s.status='$status'";
			        if($status)$sql.=" and sl.status='$status'";
			        if($status)$sql.=" and l.status='$status'";
			        if($school_id)$sql.=" and s.id = $school_id";
			        if($level_id)$sql.=" and l.id=$level_id";
			        
			        $sql.=" order by s.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }


}