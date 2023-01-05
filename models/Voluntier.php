<?

/**
 * 
 */
class Voluntier extends model
{
	
	var $table = "voluntiers";


	function getDetails($status= "", $voluntier_id = ""){


		$sql = "select v.*, 
						p.id as phonenumber_id, 
						ph.id as photo_id, 
						ph.status as photo_status, 
						p.phone_number, 
						p.status as phone_status, 
						ph.photo_path,
						c.name as country_name, 
						r.name as region_name, 
						d.name as district_name, 
						w.name as ward_name, 
						s.name as street_name ,
						sp.name as specialization,
						rel.name as religion_name,
						pos.name as position_name
						from voluntiers as v 
						left join phone_numbers as p on p.voluntary_id = v.id 
						inner join countries as c on v.country_id = c.id 
						inner join regions as r on v.region_id = r.id 
						inner join districts as d on v.district_id = d.id 
						inner join wards as w on v.ward_id = w.id 
						inner join streets as s on v.street_id = s.id 
						inner join specializations as sp on v.speciality = sp.id 
						inner join religions as rel on v.religion_id = rel.id 
						inner join positions as pos on v.position_id = pos.id 
						left join photos as ph on ph.voluntary_id = v.id  where 1=1";

					if($status)$sql.=" and v.status='$status'";
					if($status)$sql.=" and p.status='$status'";
			        if($voluntier_id)$sql.=" and v.id = $voluntier_id";


			        // echo "<pre>";
			        // print_r($sql);
			        // die();

		return fetchRows($sql);
	}
}