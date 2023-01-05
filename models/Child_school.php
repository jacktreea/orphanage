<?php

	/**
	 * 
	 */
	class Child_school extends model
	{
		var $table = "person_schools";



		function getSchoolDetails($school_id=""){

			$sql = "select 
			sl.name as school_level, 
			s.name as school_name, 
			sc.name as school_class, 
			ps.* from person_schools as ps 
			inner join schools as s on s.id = ps.school_id
			inner join s_levels as sl on sl.id = ps.level_id
			inner join s_classes as sc on sc.id = ps.class_id
			where 1=1
			";
			if ($school_id) $sql.= " and ps.id = $school_id";

			// echo "<pre>";
			// print_r($sql);
			// die();

			return fetchRows($sql);
		}

	}