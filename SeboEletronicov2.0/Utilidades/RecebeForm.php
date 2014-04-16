<?php
/*
  File name: RecebeForm.php
  File description: gets selected form to register, change, search or delete user
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

include_once '../Controle/UsuarioControlador.php';

switch ($_POST['tipo']) {
//switch action selection to be held in the register book, register, change, or delete search

    case "cadastrar": $name = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $password = $_POST['senha'];

        UsuarioControlador::salvaUsuario($name, $email, $telefone, $password);
        ?>

        <script language="Javascript" type="text/javascript">
            alert("Usuario cadastrado com sucesso!!");
        </script>      

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/entrarLogin.php";
        </script>
        <?php
        break;

    case "alterar": $name = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $password = $_POST['senha'];
        $id = $_POST['id_pessoa'];
        $senhaVelha = $_POST['senhaAntiga'];

        UsuarioControlador::alterarCadastro($name, $email, $telefone, $password, $id, $senhaVelha);
        ?>

        <script language="Javascript" type="text/javascript">
            alert("Usuario alterado com sucesso!!");
        </script>      

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLogin.php";
        </script>

        <?php
        break;
    case "deletar": $email = $_POST['email'];
        $password = $_POST['senha'];

        UsuarioControlador::deletaCadastro($email, $password);
        ?>
        <script language="Javascript" type="text/javascript">
            alert("Usuario excluido  com sucesso!!");
        </script>   

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/site.php";
        </script>
        <?php
        break;
    case "pesquisar": $name = $_POST['nome'];
        ?>
        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/usuarioPesquisado.php?nome=<?php echo $name ?>";
        </script><?php
        break;
}
?>
