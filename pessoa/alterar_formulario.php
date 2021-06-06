<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Relacionamento 1xN</title>
<meta charset="UTF-8">
</head>
<body>

	<?php
		include("../banco_dados_conexao.php");
	?>


	<h1>Alterar</h1>
	<form method="post" action="alterar_update.php">
	
		<?php
			try {
			
				$dbh = new PDO( $dsn );
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $dbh->prepare('SELECT * from pessoa where cpf = ?');
				$stmt->bindParam(1, $cpf);
				$cpf = $_GET["cpf"];
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$dbh = null;
				
				
				echo "<br>CPF: <input type='text' name='cpf' value='" . $result[0]["cpf"] . "' readonly>";
				echo "<br>Nome: <input type='text' name='nome' value='" . $result[0]["nome"] . "'>";
				echo "<br>Endereço:";
				echo "<br>Rua: <input type='text' name='ender_rua' value='" . $result[0]["ender_rua"] . "'>";
				echo "<br>UF: <input type='text' name='ender_uf' value='" . $result[0]["ender_uf"] . "'>";
				echo "<br>Cidade: <input type='text' name='ender_cidade' value='" . $result[0]["ender_cidade"] . "'>";
				echo "<br>Telefone fixo: <input type='text' name='fone_residencial' value='" . $result[0]["fone_residencial"] . "'>";
				echo "<br>Telefone celular: <input type='text' name='fone_celular' value='" . $result[0]["fone_celular"] . "'>";
				
				
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
				die();
			}
		?>

	
	<br><input type="submit" name="alterar" value="Alterar">
	</form>
<br><br><a href="index.php">voltar</a>
</body>
</html>
