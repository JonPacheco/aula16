<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblvendas";
    $qry = $con->query($sql);
    $clientes = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($vendas);
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
    <title>Listar Vendas </title>
</head>
<body>
    
<h1>Lista de Vendas</h1>
<hr>
<a href="index.php">Menu</a>
<hr>
<a href="vendas.php">Novo Cadastro</a>
<hr>
<table border=1>
    <thead>
        <tr>
           <th>id</th> 
           <th>idVendedor</th>
           <th>idProduto</th>
           <th>Quantidade</th>
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cliente) { ?>
        <tr>
            <td><?php echo $cliente->idvendas ?></td>
            <td><?php echo $cliente->idvendedor ?></td>
            <td><?php echo $cliente->idproduto ?></td>
            <td><?php echo $cliente->qtd ?></td>
            <td><a href="vendas.php?idvendas=<?php echo $cliente->idvendas ?>">Editar</a></td>
            <td><a href="vendas.php?op=del&idvendas=<?php echo  $cliente->idvendas ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>