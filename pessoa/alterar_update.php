<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Relacionamento 1xN</title>
<meta charset="UTF-8">
</head>
<body>

<?php
	include("../banco_dados_conexao.php");
	
	try {
	
		$dbh = new PDO( $dsn );
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $dbh->prepare("update pessoa set nome=?, ender_rua=?, ender_uf=?, ender_cidade=?, fone_residencial=?, fone_celular=? where cpf=?");
		
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $ender_rua);
		$stmt->bindParam(3, $ender_uf);
		$stmt->bindParam(4, $ender_cidade);
		$stmt->bindParam(5, $fone_residencial);
		$stmt->bindParam(6, $fone_celular);
		$stmt->bindParam(7, $cpf);

		$nome = $_POST["nome"];
		$ender_rua = $_POST["ender_rua"];
		$ender_uf = $_POST["ender_uf"];
		$ender_cidade = $_POST["ender_cidade"];
		$fone_residencial = $_POST["fone_residencial"];
		$fone_celular = $_POST["fone_celular"];
		$cpf = $_POST["cpf"];

		if($stmt->execute())
			echo "Sucesso!";

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
?>

<br><br><a href="index.php">voltar</a>
</body>
</html>
