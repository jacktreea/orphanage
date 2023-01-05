<?php

/**
 * 
 */
class Event extends model
{
	
	var $table = "events";

	function getFormatedEvent(){

		$sql = " select id, name as title , event_start_date as start, event_end_date as end, color as className from events where status = 'active'";

		return fetchRows($sql);
	}

}