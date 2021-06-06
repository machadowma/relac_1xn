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
		




		$stmt = $dbh->prepare("insert into veiculo (renavam,marca,modelo,ano,cor,cpf_dono) values (?,?,?,?,?,?);");

		$stmt->bindParam(1,$renavam);
		$stmt->bindParam(2,$marca);
		$stmt->bindParam(3,$modelo);
		$stmt->bindParam(4,$ano);
		$stmt->bindParam(5,$cor);
		$stmt->bindParam(6,$cpf_dono);

		$renavam = $_POST["renavam"];
		$marca = $_POST["marca"];
		$modelo = $_POST["modelo"];
		$ano = $_POST["ano"];
		$cor = $_POST["cor"];
		$cpf_dono = $_POST["cpf_dono"];

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
