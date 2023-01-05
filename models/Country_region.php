<?php 

	/**
	 * summary
	 */
	class Country_region extends model
	{

		var $table = "country_regions";


		function deleteCountryRegion($country_id=""){

	        $sql = "update country_regions set status = 'inactive' where country_id = $country_id";

	        return executeQuery($sql);
	    }

	}

 ?>