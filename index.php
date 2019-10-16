<form action="" method="POST">
	<h1> CLIENTE </h1>
    
    <label>Rg:</label><input type="text" name="rg" value="<?= @$usuarios['rg']?>"><br><br>
  	<label>Nome:</label><input type="text" name="nome" value="<?= @$usuarios['nome']?>"><br><br>

 <button type="submit">Enviar</button><br>
</form>

<form action="" method="POST">
	<h1> VENDA </h1>
    
    <label>id:</label><input type="text" name="id" value=""><br><br>
    <label>Data Venda:</label><input type="text" name="dataVenda" value=""><br><br>
  	
 <button type="submit">Enviar</button><br>
</form>

<form action="" method="POST">
	<h1> ITEM VENDA </h1>
    
    <label>id:</label><input type="text" name="id" value=""><br><br>
    <label>Quantidade:</label><input type="text" name="quantidade" value=""><br><br>
  	
 <button type="submit">Enviar</button><br>
</form>

<form action="" method="POST">
	<h1> PRODUTO </h1>
    
    <label>Descricao:</label><input type="text" name="descricao" value="<?= @$produtos['descricao']?>"><br><br>
    <label>Quantidade:</label><input type="text" name="quantidade" value="<?= @$produtos['quantidade']?>"><br><br>
  	
 <button type="submit">Enviar</button><br>
</form>