<?php

include '../Utilidades/ValidaDados.php';
include '../Utilidades/ExcessaoNomeInvalido.php';
include '../Utilidades/ExcessaoTelefoneInvalido.php';
include '../Utilidades/ExcessaoEmailInvalido.php';
include '../Utilidades/ExcessaoSenhaInvalida.php';
include '../Dao/UsuarioDao.php';

class Usuario {
  
    private $nome;
    private $telefone;
    private $email;
    private $senha;
    
    public function __construct($nome, $telefone, $email, $senha) {
    //Método construtor da classe
        $this->setNome($nome);
        $this->setTelefone($telefone);
        $this->setEmail($email);
        $this->setSenha($senha);
    }
 
    public function getNome() {
    //Método para acessar a instância do atributo nome
        return $this->nome;
    }
        
    public function setNome($nome){
    //Método para modificar a instância do atributo nome
        
        if(!ValidaDados::validaCamposNulos($nome)){
        //Condicao para validar se o campo nome é nulo
            throw new ExcessaoNomeInvalido("Nome nao pode ser nulo!");
            
        }elseif(ValidaDados::validaNome($nome) == 1){
         //Condicao para validar se o campo nome contem caracteres invalidos
            throw new ExcessaoNomeInvalido("Nome contem caracteres invalidos!");
            
        }elseif(ValidaDados::validaNome($nome) == 2){
         //Condicao para validar se o campo nome tem espacos seguidos
            throw new ExcessaoNomeInvalido("Nome contem espaços seguidos!");
        }else{
            $this->nome = $nome;
        }
    }

    public function getTelefone() {
    //Método para acessar a instância do atributo telefone
        return $this->telefone;
    }

    public function setTelefone($telefone) {
    //Método para modificar a instância do atributo telefone
        
        if(!ValidaDados::validaCamposNulos($telefone)){
        //Condicao para validar se o campo telefone é nulo
            throw new ExcessaoTelefoneInvalido("Telefone nao pode ser nulo!");
            
        }elseif(ValidaDados::validaTelefone($telefone) == 1){
        //Condicao para validar se o campo telefone contem caracteres invalidos
            throw new ExcessaoTelefoneInvalido("Telefone nao pode conter caracteres alfabeticos!");
            
        }elseif(ValidaDados::validaTelefone($telefone) == 2){
        //Condicao para validar a quantidade de 8 digitos do campo telefone 
            throw new ExcessaoTelefoneInvalido("Telefone deve conter exatamente oito (8) digitos!");
        }else{
            $this->telefone = $telefone;
        }
    }

    public function getEmail() {
    //Método para acessar a instância do atributo email
	return $this->email;
    }

    public function setEmail($email) {
    //Método para modificar a instância do atributo email
        
        if(!ValidaDados::validaCamposNulos($email)){
        //Condicao para validar se o campo email é nulo
            throw new ExcessaoEmailInvalido("E-mail nao pode ser nulo!");
            
        }elseif(ValidaDados::validaEmail($email) == 1){
        //Condicao para validar se o campo email tem o formato valido xxxx@aa.jjf  
            throw new ExcessaoEmailInvalido("E-mail nao válido!");
        }else{
            $this->email = $email;
        }
    }

    public function getSenha() {
    //Método para acessar a instância do atributo senha
        return $this->senha;
    }

    public function setSenha($senha) {
    //Método para modificar a instância do atributo senha   
        
        $auxiliar = ValidaDados::validaSenha($senha);
        //variável para controlar a validacao do atributo senha
        
        if(!ValidaDados::validaSenhaNula($senha)){
        //Condicao para validar se o campo senha é nulo
            throw new ExcessaoSenhaInvalida("Senha nao pode ser nula!");
            
        }elseif($auxiliar == 1){
        //Condicao para validar se o campo senha tem caracteres invalidos
            throw new ExcessaoSenhaInvalida("Senha contem caracteres invalidos!");
            
        }elseif($auxiliar == 2){
        //Condicao para validar se o campo senha tem 6 digitos
            throw new ExcessaoSenhaInvalida("Senha deve conter exatamente seis (6) digitos!");
            
        }elseif($auxiliar == 3){
        //Condicao para validar se a senha está correta
            throw new ExcessaoSenhaInvalida("Senha e confirmação estão diferentes!");
        }else{
            $this->senha = $senha;
        } 
    }
    
//    public function checaCadastro($email, $senha){
//        return UsuarioDao::checaCadastro($email, $senha);
//    }
//    
//    public function checaCadastroId($id){
//        return UsuarioDao::getCadastradosPorId($id);
//    }
//    
//    public function checaSenhaId($idSenha){
//        return UsuarioDao::getSenhaPorId($idSenha);
//    }
//
//    public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
//        $usuario = new Usuario($nome, $telefone, $email, $senha);
//        return UsuarioDao::alteraUsuario($usuario->getNome(), $usuario->getEmail(), $usuario->getTelefone(), $usuario->getSenha(),$id,$senhaVelha);
//    }
//
//    public function deletaCadastro($email, $senha){
//        return UsuarioDao::deletaUsuario($email, $senha);
//    }
//
//    public function pesquisaUsuario($nome){
//        return UsuarioDao::pesquisaUsuario($nome);
//    }
}

?>
