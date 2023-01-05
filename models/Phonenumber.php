<?php

/**
 * 
 */
class Phonenumber extends model
{
	
		var $table  = "phone_numbers";


		function deletePhoneNumber($id){

			$sql = "update phone_numbers set status = 'inactive' where voluntary_id = $id";
			
			return executeQuery($sql);
		}
}