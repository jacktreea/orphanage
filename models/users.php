<?php

	class Users extends model
	{
		var $table = "users";
		function searchResults($name="") {
				$sql = "select * from users where status = 'active' and username like '%".$name."%' order by name";

				// echo $sql;die();
			return fetchRows($sql);
		}

		function getAllStaffs(){
			$sql = "SELECT * FROM users WHERE status = 'active'";

			// echo $sql;die();
			return fetchRows($sql);
		}


	}

?>
