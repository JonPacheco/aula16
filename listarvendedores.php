<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblvendedores";
    $qry = $con->query($sql);
    $clientes = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($vendedor);
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
    <title>Listar Vendedores </title>
</head>
<body>
    
<h1>Lista de Vendedores</h1>
<hr>
<a href="index.php">Menu</a>
<hr>
<a href="vendedores.php">Novo Cadastro</a>
<hr>
<table border=1>
    <thead>
        <tr>
           <th>id</th> 
           <th>Vendedor</th>
           <th>Data Admissão</th>
           <th>Salário</th>
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cliente) { ?>
        <tr>
            <td><?php echo $cliente->idvendedor ?></td>
            <td><?php echo $cliente->vendedor ?></td>
            <td><?php echo $cliente->dataadmissao ?></td>
            <td><?php echo $cliente->salario ?></td>
            <td><a href="vendedores.php?idvendedor=<?php echo $cliente->idvendedor ?>">Editar</a></td>
            <td><a href="vendedores.php?op=del&idvendedor=<?php echo  $cliente->idvendedor ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>