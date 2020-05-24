<?php



 class Usuarios extends Conexao
{
    //Seleciona todos os dados do banco de dados e atribui ao array $data[]

    public function select()
    {
        $sql = "SELECT * FROM usuarios";

        $result = $this->connect()->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //Cadastra os usuários no banco
    public function create($fields)

    {

            //Transformam as chaves do array $fields criado na pagina cadastrar , em campos para serem usados no insert
            $implodeColumns = implode(',', array_keys($fields));

            $implodePlaceholder = implode(" , :", array_keys($fields));

            $sql = "INSERT INTO usuarios ($implodeColumns) VALUES (:" . $implodePlaceholder .")";

            $stmt = $this->connect()->prepare($sql);

            //Percorre o array $fields criado na pagina cadastrar e atribui os valores passados via POST aos nomes dos
            // campos da tabela para realizar  o bindValue dos valores e inseri-los no banco
            foreach ($fields as $key => $value) {
                $stmt->bindValue(':' . $key, $value);

            }
            //Realiza a inserção no banco de dados
            $execute = $stmt->execute();

            //Se a inserção foi feita com sucesso redireciona para a index
            if ($execute) {
                header('Location:index.php');
            }else{
                header('Location:cadastrar.php');
            }

        }



    //Seleciona registro pela id para ser usado pelos metodos update e delete
    public function selectId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;


    }

    //Atualiza os registros do banco

    public function update($fields,$id)
    {
        $name = $fields['nome'];
        $lastName = $fields['sobrenome'];
        $city = $fields['cidade'];
        $sql = ("UPDATE usuarios SET nome = '$name', sobrenome = '$lastName', cidade = '$city' WHERE id = $id");
        $stmt = $this->connect()->prepare($sql);
        $execute= $stmt->execute();
        if ($execute){
            header("location:index.php");
        }
    }

    //Exclui os registros
    public function delete($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
    }

     //Caso as variáveis $name , $lastName e $city estejam vazias atribui os erros aos indíces da sessão para serem
     // exibidos na tela de cadastro
    public function errors()
    {
        if(empty($name)){
            $_SESSION['errors["nameError"]']="O campo Nome é obrigatório!";
        }

        if(empty($lastName)){
            $_SESSION['errors["lastNameError"]']="O campo Sobrenome é obrigatório!";
        }

        if(empty($city)){
            $_SESSION['errors["cityError"]']="O campo Cidade é obrigatório!";
        }

        header('Location:cadastrar.php');
        exit();
    }


}

