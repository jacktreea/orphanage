<?php
global $db_connection, $db_result;

$db_connection = false; 
$db_connection = mysqli_connect($config['server'], $config['username'], $config['password'], $config['database']);

mysqli_select_db($db_connection,$config['database']);
mysqli_query($db_connection,"SET CHARACTER SET utf8"); 
mysqli_query($db_connection,"SET NAMES 'utf8'");
$db_result = false;


function fetchRow($sql) {
	global $db_connection, $db_result;
	$db_result = mysqli_query($db_connection, $sql);
	if ( $db_result ) return mysqli_fetch_assoc($db_result);
	else return false;
}

$total_pages = 0;

function fetchRows($sql, $paginate=false) {
	global $db_connection, $db_result;
	global $total_pages;
	
	$total_pages = 0;
	
	$db_result = mysqli_query($db_connection,$sql);
	
	if ( $db_result ) {
	
		if ( $paginate ) {
			// implement pagination
			$page = $_GET['pg'];
			$pg_size = $_GET['pg_size'];
			if(empty($page)) $page = 1;
			if(empty($pg_size)) $pg_size = 20;
			$st = ($page-1)*$pg_size;
			$total_pages = ceil(mysqli_num_rows($db_result) / $pg_size);
			$sql .= ' LIMIT ' . $st . ', ' . $pg_size;
			
			$db_result = mysqli_query($db_connection, $sql);
		}
	
		$results = array();
		while ($row = mysqli_fetch_assoc($db_result)) {
			$results[] = $row;
		}
		return $results;
	} else return false;
}

function totalPages() {
	global $total_pages;
	return $total_pages;
}

function executeQuery($sql) {
	global $db_connection, $db_result;
	$db_result = mysqli_query($db_connection, $sql);
	return $db_result;
}

function countRows($rs=null) {
	global $db_connection, $db_result;
	if ( empty($rs) ) $rs = $db_result;
	return mysqli_num_rows($rs);
}

function lastInsertId() {
	global $db_connection;
	return mysqli_insert_id($db_connection);
}

class model {
	var $table;	
	var $paginate = false;
	
	function get($id) {
		$sql = 'select * from ' . $this->table . ' where id="'.$id.'"';
		// echo $sql;
		return fetchRow($sql);
	}
	
	function getAll($orderby="", $limit="") {
		$sql = 'select * from ' . $this->table . '';
		if ( $orderby ) $sql .= ' order by ' . $orderby;
		if ( $limit ) $sql .= ' limit ' . $limit;
		// echo $sql;
		return fetchRows($sql, $this->paginate);
	}
	
	function getAllActive($orderby="", $limit="") {
		$sql = 'select * from ' . $this->table . ' where ' . $this->table . '.status="active"';
		if ( $orderby ) $sql .= ' order by ' . $orderby;
		if ( $limit ) $sql .= ' limit ' . $limit;
		return fetchRows($sql, $this->paginate);
	}
	
	function getAllVisible($orderby="", $limit="") {
		$sql = 'select * from ' . $this->table . ' where ' . $this->table . '.hide="N"';
		if ( $orderby ) $sql .= ' order by ' . $orderby;
		if ( $limit ) $sql .= ' limit ' . $limit;
		return fetchRows($sql, $this->paginate);
	}
	
	function getAllDeleted($orderby="", $limit="") {
		$sql = 'select * from ' . $this->table . ' where ' . $this->table . '.hide="Y"';
		if ( $orderby ) $sql .= ' order by ' . $orderby;
		if ( $limit ) $sql .= ' limit ' . $limit;
		return fetchRows($sql, $this->paginate);
	}
	
	function getHidden() {
	}

	function insert($data) {
		$keys = implode(', ', array_keys($data) );
		$values = '"' . implode('", "', array_values($data) ) . '"';		
		$sql = 'insert into ' . $this->table . ' (' . $keys . ') values (' . $values . ')';
		// echo $sql.'<br>';
		// die();
		return executeQuery($sql);
	}

	function update($id, $data) {
		$updateClause = array();
		foreach ( $data as $iid=>$val ) {
			$updateClause[] = $iid . ' = "' . $val . '"';
		}
		$updateClause = implode(', ', $updateClause);
		$sql = 'update ' . $this->table . ' set ' . $updateClause . ' where id = "' . $id . '"';
		// echo $sql;
		// die();
		return executeQuery($sql);
	}
	
	function updateWhere($updateData, $data) {
		$updateClause = array();
		$whereClause = array();
		if(is_array($data)) foreach ( $data as $iid=>$val ) {
			$updateClause[] = $iid . " = " . $val;
		}
		if(is_array($updateData)) foreach ( $updateData as $iid=>$val ) {
			$whereClause[] = $iid . " = " . $val;
		}
		$updateClause = implode(", ", $updateClause);
		$whereClause = implode(" and ", $whereClause);
		$sql = "update " . $this->table . " set " . $updateClause . " where " . $whereClause;
		// echo $sql ;
		// die();
		return executeQuery($sql);
	}
	
	function real_delete($id) {
		$sql = 'delete from ' . $this->table . ' where id="'.$id.'"';
		return executeQuery($sql);
	}
	
	function delete($id) {
		$sql = 'update ' . $this->table . ' set status="inactive" where id="'.$id.'"';
		return executeQuery($sql);
	}

	function undelete($id) {
		$sql = 'update ' . $this->table . ' set status="active" where id="'.$id.'"';
		return executeQuery($sql);
	}
	
	function deleteWhere($data) {
		$whereClause = array();
		foreach ( $data as $id=>$val ) {
			$whereClause[] = $id . ' = "' . $val . '"';
		}
		$whereClause = implode(' and ', $whereClause);
		
		$sql = 'delete from ' . $this->table . ' where '.$whereClause;
		// echo $sql;
		return executeQuery($sql);
	}

	function find($data, $sortby = 'id', $limit="") {
		$whereClause = array();
		
		if ( is_array($data) ) {
			foreach ( $data as $id=>$val ) {
				$whereClause[] = $id . ' = "' . $val . '"';
			}
			$whereClause = implode(' and ', $whereClause);
		} else $whereClause = $data;
		
		$sql = 'select * from ' . $this->table . ' where ' . $whereClause . ' order by ' . $sortby;

		if($limit)$sql.= " limit $limit";
		// echo $sql .'<br />';
		// die();
		return fetchRows($sql);
	}
	
	
	
	function count($rs="") {
		return countRows($rs);
	}
	
	function lastId() {
		return lastInsertId();
	}
	
	function totalPages() {
		return totalPages();
	}
}

?>