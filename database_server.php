<?php

	function DBExecute($query, $insertID = false){

		$link = DBConnect();
		$result = mysqli_query($link, $query) or die(mysqli_error($link));

		if($insertID){
			$result = mysqli_insert_id($link);
		}
		DBClose($link);

		return $result;

	}


	function DBCreate($table, array $data, $insertID = false){

		$fields = implode(', ', array_keys($data));
		$values = "'".implode("', '", $data)."'";

		$query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

		return DBExecute($query, $insertID);

	}


	function DBRead($table, $params = null, $fields = '*'){

		$query = "SELECT {$fields} FROM {$table}{$params}";
		$result = DBExecute($query);

		if(!mysqli_num_rows($result))
			return false;

			else{
				while($res = mysqli_fetch_assoc($result))
					$data[] = $res;
			}

		return $data;
	}

	function DBUpdate($table, $data, $where = null, $insertID = false){

		foreach($data as $key => $value)
			$fields[] = "{$key} = '{$value}'";

		$fields = implode(', ', $fields);

		$where = ($where) ? " WHERE {$where}" : null;

		$query = "UPDATE $table SET {$fields}{$where}";
		
		return DBExecute($query, $insertID);
}

	function DBDelete($table, $where = null){

	 	$where = ($where) ? " WHERE {$where}" : null;

	 	$query = "DELETE FROM {$table}{$where}";

		
		return DBExecute($query);
	 }


?>