<?php 

	/**
	 * summary
	 */
	class Region_district extends model
	{
		var $table = "region_districts";

		function deleteRegionDistrict($region_id=""){

	        $sql = "update region_districts set status = 'inactive' where region_id = $region_id";

	        return executeQuery($sql);
	    }

	}

 ?>