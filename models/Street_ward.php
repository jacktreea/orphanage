<?

/**
 * summary
 */
class Street_ward extends model
{
	var $table = "street_wards";


    function deleletStreetWard($ward_id=""){

        $sql = "update street_wards set status = 'inactive' where ward_id = $ward_id";
        //var_dump($sql);
        return executeQuery($sql);
    }

}