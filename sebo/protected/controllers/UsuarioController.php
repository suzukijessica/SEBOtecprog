<?php

class UsuarioController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionAlterar(){
            $this->render('alteraUsuario');
        }
        
        public function actionDeletar(){
            $this->render('excluiUsuario');
        }
    
	public function actionCadastrar(){
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            
            
            Usuario::Cadastrar($nome, $email, $telefone, $senha);
        ?>
        <script language = "Javascript">
            alert("Cadastro efetuado com sucesso");
        </script>
        <script language = "Javascript">
        window.location="<?php echo Yii::app()->request->baseUrl; ?>";
        </script>
<?php     
        }

        public function actionAlterarCadastro(){
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            
            
            Usuario::Alterar($nome, $email, $telefone, $senha);
        ?>
        <script language = "Javascript">
            alert("Cadastro efetuado com sucesso");
        </script>
        <script language = "Javascript">
        window.location="<?php echo Yii::app()->request->baseUrl; ?>";
        </script>
<?php
            
        }
}