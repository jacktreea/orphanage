<?php


/**
 * 
 */
class Grade extends model
{
	
	var $table = "grades";



	function getGradeLevels($status="", $grade_id="", $level_id=""){
			        $sql = "select 
			                    g.created_at as grade_created_at,
                                g.name as grade_name,
                                g.range_from as range_from,
                                g.range_to as range_to,
								l.name as level_name,
                                l.created_at as level_created_at,
                                gl.*
			                    from grades as g
                                inner join grade_levels as gl on gl.grade_id = g.id
                                inner join s_levels as l on gl.level_id = l.id
                                where 1=1  ";

			        if($status)$sql.=" and l.status='$status'";
			        if($status)$sql.=" and gl.status='$status'";
			        if($status)$sql.=" and g.status='$status'";
			        if($level_id)$sql.=" and l.id = $level_id";
			        if($grade_id)$sql.=" and g.id=$grade_id";
			        
			        $sql.=" order by g.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
	}
}