<?php 

	/**
	 * summary
	 */
	class District_ward extends model
	{
		
		var $table = "district_wards";

	    function deleletDistrictWard($district_id=""){

	        $sql = "update district_wards set status = 'inactive' where district_id = $district_id";

	        return executeQuery($sql);
	    }


	}

 ?>