<?php

	/**
	 * 
	 */
	class Child_person extends model
	{
		
		var $table = "child_persons";

		function getChildDetails($status= "", $child_id = ""){

			$sql = "select 
					chp.id as child_id,
					chp.father_id as father_id,
					chp.mother_id as mother_id,
					chp.guardian_id as guardian_id,
					chp.found_history,
					chp.admission_date,
					c.first_name as child_first_name,
					c.second_name as child_second_name,
					c.last_name as child_last_name,
					c.dob as child_dob,
					c.birth_address as child_birth_address,
					c.gender as child_gender,
					c.tribe as child_tribe,
					c.remarks as child_remarks,
					cr.name as child_religion_name,
					cr.id as child_religion_id,
					f.first_name as father_first_name,
					f.second_name as father_second_name,
					f.last_name as father_last_name,
					f.dob as father_dob,
					f.birth_address as father_birth_address,
					f.gender as father_gender,
					f.tribe as father_tribe,
					f.remarks as father_remarks,
					f.life_status as father_life_status,
					f.country_id as father_country_id,
					f.region_id as father_region_id,
					f.district_id as father_district_id,
					f.ward_id as father_ward_id,
					f.street_id as father_street_id,
					fr.name as father_religion_name,
					fr.id as father_religion_id,
					m.first_name as mother_first_name,
					m.second_name as mother_second_name,
					m.last_name as mother_last_name,
					m.dob as mother_dob,
					m.birth_address as mother_birth_address,
					m.gender as mother_gender,
					m.tribe as mother_tribe,
					m.remarks as mother_remarks,
					m.life_status as mother_life_status,
					m.country_id as mother_country_id,
					m.region_id as mother_region_id,
					m.district_id as mother_district_id,
					m.ward_id as mother_ward_id,
					m.street_id as mother_street_id,
					mr.name as mother_religion_name,
					mr.id as mother_religion_id,
					g.first_name as guardian_first_name,
					g.second_name as guardian_second_name,
					g.last_name as guardian_last_name,
					g.dob as guardian_dob,
					g.birth_address as guardian_birth_address,
					g.gender as guardian_gender,
					g.tribe as guardian_tribe,
					g.remarks as guardian_remarks,
					g.life_status as guardian_life_status,
					g.country_id as guardian_country_id,
					g.region_id as guardian_region_id,
					g.district_id as guardian_district_id,
					g.ward_id as guardian_ward_id,
					g.street_id as guardian_street_id,
					gr.name as guardian_religion_name,
					gr.id as guardian_religion_id,
					fph.id as father_photo_id,
					fph.photo_path as father_photo_path,
					mph.id as mother_photo_id,
					mph.photo_path as mother_photo_path,
					gph.id as mother_photo_id,
					gph.photo_path as mother_photo_path,
					cph.id as child_photo_id,
					cph.photo_path as child_photo_path,
					pd.id as child_person_document_id,
					pd.document_id as child_document_id,
					pd.document_name as child_document_name,
					pd.path as child_document_path

			 	from child_persons as chp 
				inner join persons as c on c.id = chp.child_id
				inner join persons as f on f.id = chp.father_id
				inner join persons as m on m.id = chp.mother_id
				inner join persons as g on g.id = chp.guardian_id
				inner join religions as cr on cr.id = c.religion_id
				inner join religions as fr on fr.id = f.religion_id
				inner join religions as mr on mr.id = m.religion_id
				inner join religions as gr on gr.id = g.religion_id
				left join person_documents as pd on pd.person_id = chp.child_id
				left join photos as fph on fph.person_id = chp.father_id
				left join photos as mph on mph.person_id = chp.mother_id
				left join photos as gph on gph.person_id = chp.guardian_id
				left join photos as cph on cph.person_id = chp.child_id
				where 1=1
			";
				if($status) $sql.= " and fph.status='$status'";
				if($status) $sql.= " and mph.status='$status'";
				if($status) $sql.= " and gph.status='$status'";
				if($status) $sql.= " and cph.status='$status'";
				if($status) $sql.= " and f.status='$status'";
				if($status) $sql.= " and m.status='$status'";
				if($status) $sql.= " and g.status='$status'";
				if($status) $sql.= " and c.status='$status'";
				if($status) $sql.= " and pd.status='$status'";
				// echo "<pre>";
				// print_r($sql);
				// die();

				return fetchRows($sql);


		}



		
	}