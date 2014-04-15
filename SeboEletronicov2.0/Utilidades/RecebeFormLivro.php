<?php
/*
 File name: RecebeFormLivro.php
 File description: gets selected form to register, change, search or delete book
 Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
*/ 

include_once '../Controle/LivroControlador.php';
//require_once '';

switch($_POST['tipo']){
//switch action selection to be held in the register book, register, change, or delete search     
    
      case "cadastraLivro":  
                         $titulo = $_POST['titulo'];
                         $author = $_POST['autor'];
                         $publishing = $_POST['editora'];
                         $edicao = $_POST['edicao'];
                         $venda= $_POST['venda'];
                         $troca= $_POST['troca'];
                         $genero = $_POST['genero'];
                         $preservation = $_POST['estado'];
                         $description = $_POST['descricao'];
                         $idOwner = $_POST['id_dono'];
                        
                         
                        $salvo = LivroControlador::salvaLivro($titulo, $author, $genero, $edicao, $publishing, $venda, $troca, $preservation, $description, $idOwner);
                         
                         
                         if (!empty($salvo)){
                              echo "<script>altert('Livro cadastrado com sucesso!')</script>";
                         }
                         else {
                             echo "<script>('Falha ao cadastrar o livro, tente novamente.')</script>";
                         }
                           
                            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLivro.php';</script>";
                            
                          break;
      
      case "alterarLivro":   
                         $titulo = $_POST['titulo'];
                         $author = $_POST['autor'];
                         $publishing = $_POST['editora'];
                         $edicao = $_POST['edicao'];
                         $venda= $_POST['venda'];
                         $troca= $_POST['troca'];
                         $genero = $_POST['genero'];
                         $preservation = $_POST['estado'];
                         $description = $_POST['descricao'];
                         $idOwner = $_POST['id_dono'];
                         $id = $_POST['id'];
                        
                        LivroControlador::alteraLivro($titulo, $author, $genero, $edicao, $publishing,$venda, $troca, $preservation, $description, $id, $idOwner);
                        ?>
                            <script language="Javascript" type="text/javascript">
                                alert("Livro alterado com sucesso!!");
                            </script>  
                            
                            <script language = "Javascript">
                                window.location="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLivro.php";
                            </script><?php
                        
                    break;
                    
        case "pesquisaLivro":
                        $titulo = $_POST['titulo'];
                        $estadoNovo = $_POST['novo'];
                        $estadoUsado = $_POST['usado'];
                        $disponibilidadeVenda = $_POST['venda'];
                        $disponibilidadeTroca = $_POST['troca'];

                        $listOfBooks = LivroControlador::pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
                        $idLivro = $listOfBooks['id_livro'];
                 
                        ?>
                            <script language = "Javascript">
                                window.location="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/listaDeLivros.php?livros=<?php echo $idLivro?>";
                            </script><?php
                break;
            
    }
    
   if($_REQUEST['id_livro']) {
    $idLivro = $_REQUEST['id_livro'];
    LivroControlador::deletaLivro($idLivro);
          
                        ?>
                            <script language="Javascript" type="text/javascript">
                                alert("Livro excluido com sucesso!!");
                            </script>
                            
                            <script language = "Javascript">
                                window.location="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLivro.php";
                            </script><?php
   }
            
    
?>
