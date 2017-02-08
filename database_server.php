<?php

	function DBExecute($query){

		$link = DBConnect();
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		DBClose($link);

		return $result;

	}


	function DBCreate($table, array $data){

		$fields = implode(', ', array_keys($data));
		$values = "'".implode("', '", $data)."'";

		$query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

		return DBExecute($query);

	}


	function DBRead($table, $params = null, $fields = "*"){

		$query = "SELECT * FROM {$table}";
		$result = DBExecute($query);

		if(!mysqli_num_rows($result))
			return false;

			else{
				while($res = mysqli_fetch_assoc($result))
					$data[] = $res;
			}
				
		return $data;
	}














?>