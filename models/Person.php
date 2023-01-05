<?php

	/**
	 * 
	 */
	class Person extends model
	{
		
		var $table = "persons";


		function getChildSchool($status = "", $child_school_id=""){

			$sql =  "select cp.id as child_id, 
					cp.child_id as child_person_id,
					cp.father_id, 
					cp.mother_id, cp.guardian_id, 
					ps.status as child_school_status, 
					ps.id as child_school_id, 
					p.* from persons as p 

			left join person_schools as ps on ps.person_id = p.id
			inner join child_persons as cp on cp.child_id  = p.id


			where 1=1 and p.status='$status' and cp.status = '$status' and p.status = '$status'";

			if ($child_school_id) $sql.=" and ps.id =  $child_school_id";


			// echo "<pre>";
			// print_r($sql);
			// die();


			return fetchRows($sql);
		}
	}