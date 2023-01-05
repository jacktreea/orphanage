<?php 

	/**
	 * summary
	 */
	class School_level extends model
	{
		var $table = "s_levels";

			    function getLevelClass($status="", $level_id="", $class_id=""){
			        $sql = "select 
								l.name as level_name,
                                l.created_at as level_created_at,
                                c.created_at as class_created_at,
                                c.name as class_name,
                                lc.*
			                    from s_levels as l
                                inner join level_classes as lc on lc.level_id = l.id
                                inner join s_classes as c on lc.class_id = c.id
                                where 1=1  ";

			        if($status)$sql.=" and l.status='$status'";
			        if($status)$sql.=" and lc.status='$status'";
			        if($status)$sql.=" and c.status='$status'";
			        if($level_id)$sql.=" and l.id = $level_id";
			        if($class_id)$sql.=" and c.id=$class_id";
			        
			        $sql.=" order by l.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }

	}
 ?>