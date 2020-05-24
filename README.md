<h1>CRUD usando PHP , PDO e bootstrap </h1>

Sistema de cadastro de clientes com os campos nome , sobrenome e cidade.
O projeto contém a seguinte estrutura:

  - A pasta classes contendo os arquivos Conexao.php e Usuarios.php.

  - Os arquivos cadastrar.php , editar.php , index.php  e crud.sql.
  
  Para utilizar o sistema primeiro deve ser criado o banco crud e ser executado o arquivo crud.sql para criar a tabela
  necessária no banco de dados. Após criado o banco é necessário alterar no arquivo Conexao.php  os
  campos host , dbname , user e pass com as respectivas credenciais do seu banco .
  
  Após ter configurado a conexão abra o arquivo index.php no navegador. Nessa tela aparecerá a listagem de todos os 
  usuários cadastrados. Possui:
   - O botão cadastrar usuário que o levará para a página cadastrar.php onde podem ser 
  inseridos novos registros.Para sair da área de cadastro , volte uma página no navegador.
   - O  botão editar que o fica ao lado de cada registro e leva para editar.php onde é possível fazer a atualização 
  de registros.  Se executado com sucesso leva de volta para index.php.
   - O botão excluir que assim como o editar fica ao lado de cada registro e exclui o mesmo.
  
  O arquivo Usuarios.php é responsável por executar todas as queries no banco de dados.Possui os métodos:
  
  - Select : Realiza o seleção de todos os registros disponíveis no banco e os exibe na index.
  - Create:Insere os dados informados via formulário  de cadastro no banco de dados.Só funciona se todos os campos forem 
  preenchido caso contrário retorna mensagem informando que o campo(s) não pode(m) estar vazio(s).
  - SelectId: Seleciona um determinado registro pelo id do banco.Auxilia na execução do update e delete.
  - Update:Atualiza os dados do usuário selecionado através de seu id.
  - Delete:Exclui o registro do usuário selecionado através do seu id.
  - Errors: Responsável por atribuir mensagens de erro através dos indíces de uma sessão para serem exibidos na página 
   cadastrar  caso algum dos campos esteja vazio.
   
   O index.php é responsável  por exibir os dados vindos do select  .
   O cadastrar.php possui um formulário de cadastro feito com bootstrap para a realização do insert no banco.
   O editar.php é responsável por trazer os dados do registro que se deseja atualizar e executar o update no banco.
   O Conexao.php faz a conexão com o banco usando a classe PDO.
   