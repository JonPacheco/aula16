<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblprodutos";
    $qry = $con->query($sql);
    $clientes = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($clientes);
    //die();
} catch(PDOException $e){
    echo $e->getMessage();

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos </title>
</head>
<body>
    
<h1>Lista de Produtos</h1>
<hr>
<a href="index.php">Menu</a>
<hr>
<a href="produtos.php">Novo Cadastro</a>
<hr>
<table border=1>
    <thead>
        <tr>
           <th>id</th> 
           <th>Produto</th>
           <th>Preço</th>
           <th>Estoque</th>
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cliente) { ?>
        <tr>
            <td><?php echo $cliente->idproduto ?></td>
            <td><?php echo $cliente->produto ?></td>
            <td><?php echo $cliente->preco ?></td>
            <td><?php echo $cliente->estoque ?></td>
            <td><a href="produtos.php?idproduto=<?php echo $cliente->idproduto ?>">Editar</a></td>
            <td><a href="produtos.php?op=del&idproduto=<?php echo  $cliente->idproduto ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>