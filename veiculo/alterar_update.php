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

		$stmt = $dbh->prepare("update veiculo set marca=?, modelo=?, ano=?, cor=?, cpf_dono=? where renavam=?");
		
		$stmt->bindParam(1, $marca);
		$stmt->bindParam(2, $modelo);
		$stmt->bindParam(3, $ano);
		$stmt->bindParam(4, $cor);
		$stmt->bindParam(5, $cpf_dono);
		$stmt->bindParam(6, $renavam);

		$marca = $_POST["marca"];
		$modelo = $_POST["modelo"];
		$ano = $_POST["ano"];
		$cor = $_POST["cor"];
		$cpf_dono = $_POST["cpf_dono"];
		$renavam = $_POST["renavam"];

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
