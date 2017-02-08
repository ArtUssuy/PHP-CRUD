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



		$cliente = array(
			'nome' => 'Daniela',
			'idade' => 21,
			'endereco' => 'Rua igarapava',
			'senha' => 123
			);

		$drop = DBDelete('clientes', 'id = 6');
	?>

</body>
</html>

