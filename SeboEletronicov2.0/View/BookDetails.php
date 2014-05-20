<?php
/*
  File name: BookDetails.php
  File description: data view to see details of the book
 */

session_start();
$idUser = $_SESSION['id_usuario'];
?>
<!DOCTYPE HTML>
<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/img/android.ico">
        <script src="http://localhost/SEBOtecprog/SeboEletronicov2.0/Utilities/Redirect.js"></script> 

        <title>Sebo Eletronico</title>

    </head>
    <body>
        <?php
        $_POST['mural'];
        $_POST['nome_comprador'];
        $_POST ['id_livro'];
        $wall = $_POST['mural'];

        include "..\Utilities\ConnectionDataBase.php";
        if (!$dataBase)
            die("<h1>Falha no bd </h1>");

        //Acessar Informações do comprador
        $idBook = $_POST['id_livro'];

        $emailUser = $_SESSION["email"];

        $strSQL4 = "SELECT * FROM usuario WHERE email_usuario = '$emailUser' ";

        $rs4 = mysql_query($strSQL4);

        while ($row = mysql_fetch_array($rs4)) {
            $nameBuyer = $row['nome_usuario'];
        }

        $put = mysql_query("INSERT INTO mural (texto,nome_pergunta,id_livro) VALUES ('$wall', '$nameBuyer', '$idBook')");
        ?>

        <div id="header">
            <div id="logo"><img src="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/img/sebo_header.png" class="imgHeader"/></div>
        </div>

        <div id="mainmenu">

            <button class="button" onclick="home();">Home</button>
            <button class="button" onclick="user();">Usuario</button>
            <button class="button" onclick="livro();">Livro</button>
            <button class="button" onclick="login();">Login</button>

        </div>




        <?php
        include "..\Utilidades\ConexaoComBanco.php";
        if (!$dataBase)
            die("<h1>Falha no bd </h1>");

        //Acessar Informações do comprador
        $strSQL2 = "SELECT * FROM usuario WHERE email_usuario = '" . $emailUser . "' ";

        $rs2 = mysql_query($strSQL2);

        while ($row = mysql_fetch_array($rs2)) {

            $nameBuyer = $row['nome_usuario'] . "<br />";
            $phoneBuyer = $row['telefone_usuario'] . "<br />";
        }

        //Acessando informações do livro escolhido 
        $idBook = $_POST["id_livro"];

        $idBook = 1;

        $stringSQL = "SELECT * FROM livro WHERE id_livro = '$idBook' ";

        $result = mysql_query($stringSQL);

        while ($row = mysql_fetch_array($result)) {

            $titulo2 = $row['titulo_livro'] . "<br />";
            $bookCondition = $row['estado_conserv'] . "<br />";
            $bookPublisher = $row ['editora'] . "<br />";
            $bookAuthor = $row ['autor'] . "<br />";
            $bookDescription = $row ['descricao_livro'] . "<br />";
            $idBookOwner = $row['id_dono'] . "<br />";
        }


        //Exibir 
        echo '<h6> <h1>';
        echo $titulo2;
        echo '</h1> </h6><br /><br />';

        echo'<h6>Autor: ';
        echo $bookAuthor;
        echo'</h6><br />';

        echo'<h6>Editora: ';
        echo $bookPublisher;
        echo'</h6><br />';


        echo'<h6>Descricao: ';
        echo $bookDescription;
        echo'</h6><br /><br />';
        ?>

        <div id="formulario">
            <form name="comprarlivro" method="post" action="compralivro.php">

                <input type = "hidden" name="nome_comprador" value= "<?php echo $nameBuyer; ?>" >
                <input type="hidden" name="tel_comprador" value= " <?php echo $phoneBuyer; ?>" >
                <input type="hidden" name="id_livro" value=" <?php echo $idBook; ?>" >
                <input type="hidden" name="id_dono" value=" <?php echo $idBookOwner; ?>" >
                <input type="submit" value="Comprar" />
                <label for="pergunta"></label>
            </form>
        </div>


        <div id="formulariotop"> 
            <form name="enviarpergunta" method="post" action="detalheslivro.php"> 
                <h6>Envie sua mensagem:</h6>
                <br>
                <textarea name="mural" value="mural" rows="5" cols="45" ></textarea>
                <input type="hidden" value="nome_comprador" name="nome_comprador">
                <input type="hidden" name="id_livro" value="<?php echo $idBook; ?>">
                <input type="submit" value="Enviar" />  
            </form>

            <br/><br/><br/>

            <?php
            include "..\Dao\conexao_bd.inc";
            if (!$dataBase)
                die("<h1>Falha no bd </h1>");

            $strSQL3 = "SELECT * FROM mural WHERE id_livro = '" . $idBook . "' ORDER BY id_comentario DESC";

            $rs3 = mysql_query($strSQL3);

            while ($row3 = mysql_fetch_array($rs3)) {
                echo $row3['nome_pergunta'];
                echo " disse: ";
                echo $row3['texto'];
                echo " <br /> <br />";
            }
            ?> 

        </div>

    </body>
</html>