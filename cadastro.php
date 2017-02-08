<!DOCTYPE html>

<html lang="pt-br">

<head>
	<meta charset="UTF-9">
	<title>Cadastro</title>
</head>

<body>
	
	<?php

		require 'connection_server.php';
		require 'config_server.php';
		require 'database_server.php';

		echo '<pre>';
		print_r(DBRead('clientes'));
		echo '</pre>';

	?>

</body>
</html>

