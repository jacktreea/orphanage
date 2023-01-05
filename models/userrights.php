<?php

	class UserRights extends model 
	{ 
		var $table = "userrights";
	
		function getUserMenus($userid) {
			$sql = "select m.id as mid, m.label as mlabel, m.module as mmod, m.action as mact, m.icon as micon, s.id as sid, s.label as slabel, s.module as smod, s.action as sact
					from userrights as ur
					INNER JOIN menus AS m ON m.id = ur.menuid
					LEFT JOIN submenus AS s ON s.id = ur.submenuid
					where ur.userid = ".$userid;
					
			$sql .= " order by m.sortno asc, s.sortno asc";
			//echo $sql;
			return fetchRows($sql);
		}
	}

?>