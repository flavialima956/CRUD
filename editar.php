<?php
//Arquivos necessarios para executar projeto
require 'classes/Conexao.php';
require 'classes/Usuarios.php';

//verifica se existe o indice na variavel POST e se existir atribui a variavel $user_id
if(isset($_GET['id'])){
    $id_user = $_GET['id'];
    //Cria nova instancia da classe Usuarios e atribui a $result o metodo selectId passando $user_id como parametro
    $user = new Usuarios();
    //Se houver resultado para a $id vai para a página de ediçao caso contrario vai para o index.php
    $result = $user->selectId($id_user);
}else{
    header('Location:index.php');
}

if (isset($_POST['Atualizar'])) {
    $name = $_POST['nome'];
    $lastName = $_POST['sobrenome'];
    $city = $_POST['cidade'];

    $fields = [
        'nome' => $name,
        'sobrenome' => $lastName,
        'cidade' => $city

    ];

    $id = $_POST['id'];

    //Instancia da classe Usuarios e uso do metodo update para atualizar os registros
    $user = new Usuarios();
    $user->update($fields,$id);
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h4 class="mb-4">Atualizar usuários</h4>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $result['nome'];?>">
                    </div>
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" value="<?php echo $result['sobrenome'];?>">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" value="<?php echo $result['cidade'];?>">
                    </div>
                    <input type="submit" name="Atualizar" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>
