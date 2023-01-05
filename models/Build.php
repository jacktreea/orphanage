<?php

	/**
	 * 
	 */
	class Build extends model
	{
		
		var $table = "builds";


				function getBuildFloor($status="", $build_id="", $floor_id=""){
			        $sql = "select 
								b.name as build_name,
                                b.created_at as build_created_at,
                                f.created_at as floor_created_at,
                                f.name as floor_name,
                                bf.*
			                    from builds as b
                                inner join build_floors as bf on bf.build_id = b.id
                                inner join floors as f on bf.floor_id = f.id
                                where 1=1 ";

			        if($status)$sql.=" and b.status='$status'";
			        if($status)$sql.=" and bf.status='$status'";
			        if($status)$sql.=" and f.status='$status'";
			        if($build_id)$sql.=" and b.id = $build_id";
			        if($floor_id)$sql.=" and f.id=$floor_id";
			        
			        $sql.=" order by b.created_at desc";

			        // echo "<pre>";
			        // print_r(($sql));
			        // echo "<br>";
			        // die();

			        return fetchRows($sql);
			    }
	}