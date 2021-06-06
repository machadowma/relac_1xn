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

		$stmt = $dbh->prepare("delete from veiculo where renavam = ?;");
		$stmt->bindParam(1, $renavam);

		$renavam = $_GET["renavam"];

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
