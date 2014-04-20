<?php
/*
  File name: RecebeForm.php
  File description: gets selected form to register, change, search or delete user
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

include_once '../Controle/UsuarioControlador.php';

switch ($_POST['tipo']) {
//switch action selection to be held in the register book, register, change, or delete search

    case "cadastrar": $username = $_POST['nome'];
        $userEmail = $_POST['email'];
        $userTelphone = $_POST['telefone'];
        $userPassword = $_POST['senha'];

        UsuarioControlador::salvaUsuario($username, $userEmail, $userTelphone, $userPassword);
        ?>

        <script language="Javascript" type="text/javascript">
            alert("Usuario cadastrado com sucesso!!");
        </script>      

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/entrarLogin.php";
        </script>
        <?php
        break;

    case "alterar": $username = $_POST['nome'];
        $userEmail = $_POST['email'];
        $userTelphone = $_POST['telefone'];
        $userPassword = $_POST['senha'];
        $userId = $_POST['id_pessoa'];
        $oldUserPassword = $_POST['senhaAntiga'];

        UsuarioControlador::alterarCadastro($username, $userEmail, $userTelphone, $userPassword, $userId, $oldUserPassword);
        ?>

        <script language="Javascript" type="text/javascript">
            alert("Usuario alterado com sucesso!!");
        </script>      

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLogin.php";
        </script>

        <?php
        break;
    case "deletar": $userEmail = $_POST['email'];
        $userPassword = $_POST['senha'];

        UsuarioControlador::deletaCadastro($userEmail, $userPassword);
        ?>
        <script language="Javascript" type="text/javascript">
            alert("Usuario excluido  com sucesso!!");
        </script>   

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/site.php";
        </script>
        <?php
        break;
    case "pesquisar": $username = $_POST['nome'];
        ?>
        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/usuarioPesquisado.php?nome=<?php echo $username ?>";
        </script><?php
        break;
}
?>
