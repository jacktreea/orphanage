<?php


/**
 * 
 */
class Photo extends model
{
	
	var $table = "photos";

	function deletePhoto($id){

			$sql = "update photos set status = 'inactive' where voluntary_id = $id";
			
			return executeQuery($sql);
		}
}