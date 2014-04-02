<?php
/*
 File name: Usuario.php
 File description: model of user
 Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
*/ 

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
    //Constructor method of class
        $this->setNome($nome);
        $this->setTelefone($telefone);
        $this->setEmail($email);
        $this->setSenha($senha);
    }
 
    public function getNome() {
    //Method to access the instance of name attribute
        return $this->nome;
    }
        
    public function setNome($nome){
    //Method to modify the instance of the name attribute 
        
        if(!ValidaDados::validaCamposNulos($nome)){
            throw new ExcessaoNomeInvalido("Nome nao pode ser nulo!");
            
        }elseif(ValidaDados::validaNome($nome) == 1){
            throw new ExcessaoNomeInvalido("Nome contem caracteres invalidos!");
            
        }elseif(ValidaDados::validaNome($nome) == 2){
            throw new ExcessaoNomeInvalido("Nome contem espaços seguidos!");
        }else{
            $this->nome = $nome;
        }
    }

    public function getTelefone() {
    //Method to access the instance of phone attribute
        return $this->telefone;
    }

    public function setTelefone($telefone) {
    //Method to modify the instance of the telephone attribute 
        
        if(!ValidaDados::validaCamposNulos($telefone)){
            throw new ExcessaoTelefoneInvalido("Telefone nao pode ser nulo!");
            
        }elseif(ValidaDados::validaTelefone($telefone) == 1){
            throw new ExcessaoTelefoneInvalido("Telefone nao pode conter caracteres alfabeticos!");
            
        }elseif(ValidaDados::validaTelefone($telefone) == 2){
            throw new ExcessaoTelefoneInvalido("Telefone deve conter exatamente oito (8) digitos!");
        }else{
            $this->telefone = $telefone;
        }
    }

    public function getEmail() {
    //Method to access the instance of email attribute
	return $this->email;
    }

    public function setEmail($email) {
    //Method to modify the instance of the email attribute 
        
        if(!ValidaDados::validaCamposNulos($email)){
            throw new ExcessaoEmailInvalido("E-mail nao pode ser nulo!");
            
        }elseif(ValidaDados::validaEmail($email) == 1){
            throw new ExcessaoEmailInvalido("E-mail nao válido!");
        }else{
            $this->email = $email;
        }
    }

    public function getSenha() {
    //Method to access the instance of password attribute
        return $this->senha;
    }

    public function setSenha($senha) {
    //Method to modify the instance of the password attribute   
        
        $auxiliar = ValidaDados::validaSenha($senha);
        
        if(!ValidaDados::validaSenhaNula($senha)){
            throw new ExcessaoSenhaInvalida("Senha nao pode ser nula!");
            
        }elseif($auxiliar == 1){
            throw new ExcessaoSenhaInvalida("Senha contem caracteres invalidos!");
            
        }elseif($auxiliar == 2){
            throw new ExcessaoSenhaInvalida("Senha deve conter exatamente seis (6) digitos!");
            
        }elseif($auxiliar == 3){
            throw new ExcessaoSenhaInvalida("Senha e confirmação estão diferentes!");
        }else{
            $this->senha = $senha;
        } 
    }
    
}

?>
