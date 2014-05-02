<?php
/*
  File name: RecebeForm.php
  File description: gets selected form to register, change, search or delete user
 */

include_once '../ControllerProject/UserController.php';

switch ($_POST['tipo']) {
//switch action selection to be held in the register book, register, change, or delete search

    case "cadastrar": $userName = $_POST['nome'];
        $userEmail = $_POST['email'];
        $userPhone = $_POST['telefone'];
        $userPassword = $_POST['senha'];

        UserController::savesUser($userName, $userEmail, $userPhone, $userPassword);
        ?>

        <script language="Javascript" type="text/javascript">
            alert("Usuario cadastrado com sucesso!!");
        </script>      

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/entrarLogin.php";
        </script>
        <?php
        break;

    case "alterar": $userName = $_POST['nome'];
        $userEmail = $_POST['email'];
        /* @var $userPhone type */
        $userPhone = $_POST['telefone'];
        $userPassword = $_POST['senha'];
        $userId = $_POST['id_pessoa'];
        $oldUserPassword = $_POST['senhaAntiga'];

        UserController::changesCadastre($userName, $userEmail, $userPhone, $userPassword, $userId, $oldUserPassword);
        ?>

        <script language="Javascript" type="text/javascript">
            alert("Usuario alterado com sucesso!!");
        </script>      

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/indexLogin.php";
        </script>

        <?php
        break;
    case "deletar": $userEmail = $_POST['email'];
        $userPassword = $_POST['senha'];

        UserController::deletesCadastre($userEmail, $userPassword);
        ?>
        <script language="Javascript" type="text/javascript">
            alert("Usuario excluido  com sucesso!!");
        </script>   

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/site.php";
        </script>
        <?php
        break;
    case "pesquisar": $userName = $_POST['nome'];
        ?>
        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/usuarioPesquisado.php?nome=<?php echo $userName ?>";
        </script><?php
        break;
}
?>
