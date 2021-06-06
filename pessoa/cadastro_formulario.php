<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Relacionamento 1xN</title>
<meta charset="UTF-8">
</head>
<body>
	<h1>Cadastro</h1>
	
	<form method="post" action="cadastro_insert.php">
		<br>CPF: <input type="text" name="cpf">
		<br>Nome: <input type="text" name="nome">
		<br>Endereço:
		<br>Rua: <input type="text" name="ender_rua">
		<br>UF: <input type="text" name="ender_uf">
		<br>Cidade: <input type="text" name="ender_cidade">
		<br>Telefone fixo: <input type="text" name="fone_residencial">
		<br>Telefone celular: <input type="text" name="fone_celular">
		<br><input type="submit" name="inserir" value="Inserir">
	</form>
	
<br><br><a href="index.php">voltar</a>

</body>
</html>
