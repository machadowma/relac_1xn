<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Relacionamento 1xN</title>
<meta charset="UTF-8">
</head>
<body>
	<h1>Cadastro</h1>
	<form method="post" action="cadastro_insert.php">
		<br>Renavam: <input type="text" name="renavam">
		<br>Marca: <input type="text" name="marca">
		<br>Modelo: <input type="text" name="modelo">
		<br>Ano: <input type="text" name="ano">
		<br>Cor: <input type="text" name="cor">
		<br>Proprietário: 
		<select name="cpf_dono">
			<?php
			include("../banco_dados_conexao.php");
			try {
			
				$dbh = new PDO( $dsn );
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sth = $dbh->prepare('SELECT cpf,nome from pessoa');
				$sth->execute();
				$result = $sth->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row) {
					echo "<option value='".$row["cpf"]."'>".$row["nome"]."</option>";
				}
				$dbh = null;
				
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
				die();
			}

			?>
		</select>
		<br><input type="submit" name="inserir" value="Inserir">
	</form>
<br><br><a href="index.php">voltar</a>
</body>
</html>
 

