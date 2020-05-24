<?php
//Classes necessárias para o projeto
require_once 'classes/Conexao.php';
require_once 'classes/Usuarios.php';

//Verifica se existe o indice del na url se existir atribui a ele a $id do usuario a ser deletado
if(isset($_GET['del'])) {
    $id = $_GET['del'];

//Instancia da classe Usuarios para realizar o delete
    $user = new Usuarios();
    $user->delete($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<!--tabela com a lista dos usuários-->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <a href="cadastrar.php" class="float-right btn btn-success">Cadastrar Usuário</a>
                <h4 class="mb-4">Todos os Usuários</h4>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    //Criando uma nova instancia da classe Usuarios e usando o select para exibir todos os dados da
                    // tabela através de um foreach
                    $user = new Usuarios();
                    $rows = $user->select();
                    foreach ((array) $rows as $row){
                        ?>
                        <tr>
                        <th scope="row"><?php echo $row['id'];?></th>
                        <td><?php echo $row['nome'];?></td>
                        <td><?php echo $row['sobrenome'];?></td>
                        <td><?php echo $row['cidade'];?></td>
                        <td><a class="btn btn-sm btn-primary" href="editar.php?id=<?php echo $row['id'];?>">Editar</a> &nbsp <a class="btn btn-sm btn-danger" href="index.php?del=<?php echo $row['id'];?>">Excluir</a> </td>
                    </tr>
                    <?php }
                    ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</body>
</html>