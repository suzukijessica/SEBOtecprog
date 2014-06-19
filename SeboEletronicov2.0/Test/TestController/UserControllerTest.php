<?php
/*
 File name: UserControllerTest.php
 File description: testing function of class UsuarioControlador.php
*/ 

require_once "../../Model/UserModel.php";
require_once "../../Controller/UserController.php";
require_once "../../Dao/UserDao.php";
require_once "../../Utilities/AuthenticateData.php";
require_once "../../Exceptions/ExceptionNameWrong.php";
require_once "../../Exceptions/ExceptionPasswordWrong.php";
require_once "../../Exceptions/ExceptionPhoneWrong.php";
require_once "../../Exceptions/ExceptionEmailWrong.php";
require_once "../../Utilities/ConnectionDatabase.php";

class UserControllerTest extends PHPUnit_Framework_TestCase {

    protected $userControllerTest;
    protected $user;
    
    protected function setUp() {
        /**
         * creates objects which will be used in the tests
         * no parameters
         * no return
        */
        $password = array(123123,123123);
        $this->user = new UserModel('lucas', 98989898, 'lucas@lucas.com', $password);
        $this->userControllerTest = new UserController();
    }

    protected function tearDown() {
        /**
         * clean objects which were used in the tests
         * no parameters
         * no return
        */
        unset($this->userControllerTest);
        unset($this->user);
    }

    public function testSavesUser() {
        /**
         * tests save a user in database with all its parameters
         * no parameters
         * no return
        */
        $password = array(123123,123123);
        $return = $this->userControllerTest->savesUser('lucas', 98989898, 'lucas@lucas.com', $password);
        $this->assertTrue($return);
    }
    
//    public function testChecaCadastroId(){
//            
//    }
//    
//    public function testAlteraUsuario(){
//        $retorno = $this->usuarioControladorTest->alteraUsuario($this->usuario, 11, 123456);
//        $this->assertTrue($retorno);
//    }
//    
//    public function testPesquisaUsuario(){
//        $retorno = $this->usuarioControladorTest->pesquisaUsuario(null);
//        $this->assertFalse($retorno);
//    }
//    
//    public function testDeletaUsuario(){
//        $senha = $this->usuario->getSenha();
//        $retorno = $this->usuarioControladorTest->deletaUsuario($this->usuario->getEmail(), $senha[0]);
//        $this->assertTrue($retorno);
//    }
//    
//    public function testGetCadastradosPorIdComIdNulo(){
//        $retorno = $this->usuarioControladorTest->getCadastradosPorId(null);
//        $this->assertFalse($retorno);
//    }
//    
//    public function testGetCadastradosPorIdComIdInvalido(){
//        $retorno = $this->usuarioControladorTest->getCadastradosPorId(-2);
//        $this->assertFalse($retorno);
//    }
//    
//    public function testGetCadastradosPorIdComIdValido(){
//        $senha = $this->usuario->getSenha();
//        $retorno = $this->usuarioControladorTest->getCadastradosPorId(23);
//        $this->assertEquals($this->usuario->getEmail(), $retorno[4]);
//        $this->assertEquals($this->usuario->getNome(), $retorno[1]);
//        $this->assertEquals($this->usuario->getTelefone(), $retorno[3]);
//
//    }

}

