<?php

	/**
	 * 
	 */
	class Item extends model
	{
		
		var $table = "items";

		function maxID()
			{
				$sql = "SELECT MAX(id) AS maxID FROM items";
				
				return fetchRow($sql);
			}
	}