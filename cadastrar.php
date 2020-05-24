<?php
//Cria um sessão
session_start();

//Classes necessárias
require_once 'classes/Conexao.php';
require_once 'classes/Usuarios.php';

//Verifica se o formulário foi enviado e atribui os índices passados via post para as variáveis
if(isset($_POST['Cadastrar'])) {
    $name = $_POST['nome'];
    $lastName = $_POST['sobrenome'];
    $city = $_POST['cidade'];

    //Verifica se os campos nome , sobrenome e cidade não estão vazios
    if (!empty($name) && !empty($lastName) && !empty($city)) {

        //Filtra as campos antes de inserir
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
        $city = filter_var($city, FILTER_SANITIZE_STRING);

        //Array com todos os campos da tabela para serem cadastrados
        $fields = [
            'nome' => $name,
            'sobrenome' => $lastName,
            'cidade' => $city
        ];

        $user = new Usuarios();
        $user->create($fields);

        //Se os estiverem vazios executa o método de erro do arquivo Usuarios.php
    }else{
        $user= new Usuarios();
        $user->errors();

    }

}
    ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h4 class="mb-4">Cadastrar usuários</h4>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control"  name="nome" >
                        <?php
                        //Verifica se há exitem os indíces de erro da sessão .Se existirem exibem as mensagens de erro
                           if(isset($_SESSION['errors["nameError"]'])){ ?>
                               <div class="alert alert-danger mt-2" role="alert">
                                   <?php echo $_SESSION['errors["nameError"]'];?>
                               </div>
                          <?php
                           }
                          ?>


                    </div>
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome">

                        <?php
                        if(isset($_SESSION['errors["lastNameError"]'])){ ?>
                            <div class="alert alert-danger mt-2" role="alert">
                                <?php echo $_SESSION['errors["lastNameError"]'];?>
                            </div>
                            <?php
                        }
                        ?>

                        <?php
                        session_unset();
                        ?>

                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" >

                        <?php
                        if(isset($_SESSION['errors["cityError"]'])){ ?>
                            <div class="alert alert-danger mt-2" role="alert">
                                <?php echo $_SESSION['errors["cityError"]'];?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <input type="submit" name="Cadastrar" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>