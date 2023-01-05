<?php 

	/**
	 * summary
	 */
	class School_class extends model
	{
	    /**
	     * summary
	     */
	    var $table = "s_classes";

	    function getClassSubject($status="", $class_id="", $subject_id=""){
			        $sql = "select 
								c.name as class_name,
                                c.created_at as class_created_at,
                                s.created_at as subject_created_at,
                                s.name as subject_name,
                                cs.*
			                    from s_classes as c
                                inner join class_subjects as cs on cs.class_id = c.id
                                inner join s_subjects as s on cs.subject_id = s.id
                                where 1=1 ";

			        if($status)$sql.=" and c.status='$status'";
			        if($status)$sql.=" and cs.status='$status'";
			        if($status)$sql.=" and s.status='$status'";
			        if($subject_id)$sql.=" and s.id = $subject_id";
			        if($class_id)$sql.=" and c.id=$class_id";
			        
			        $sql.=" order by c.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }


	}

 ?>