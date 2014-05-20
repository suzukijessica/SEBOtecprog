<?php
/*
 File name: UserDaoTest.php
 File description: testing function of class UsuarioDao.php
*/ 

require_once "../../Model/UserModel.php";
require_once "../../Dao/UserDao.php";
require_once "../../Utilities/AuthenticateData.php";
require_once "../../Utilities/ExceptionNameWrong.php";
require_once "../../Utilities/ExceptionPasswordWrong.php";
require_once "../../Utilities/ExceptionPhoneWrong.php";
require_once "../../Utilities/ExceptionEmailWrong.php";
require_once "../../Utilities/ConnectionDatabase.php";

class UserDaoTest extends PHPUnit_Framework_TestCase {

    protected $userDaoTest;
    protected $user;
    
    protected function setUp() {
        $password = array(123123,123123);
        $this->user = new UserModel('lucas', 98989898, 'lucas@lucas.com', $password);
        $this->userDaoTest = new UserDao();
    }

    protected function tearDown() {
        unset($this->userDaoTest);
        unset($this->user);
    }

    public function testSaveUser() {
        $return = $this->userDaoTest->savesUserDao($this->user);
        $this->assertTrue($return);
    }
    
    public function testChangeUser(){
        $return = $this->userDaoTest->changesUserDao($this->user, 11, 123456);
        $this->assertTrue($return);
    }
    
    public function testSearchUser(){
        $return = $this->userDaoTest->searchesUserDao(null);
        $this->assertFalse($return);
    }
    
    public function testDeleteUser(){
        $password = $this->user->getPassword();
        $return = $this->userDaoTest->deletesUserDao($this->user->getEmail(), $password[0]);
        $this->assertTrue($return);
    }
    
    public function testGetCadastredByIdWithNullId(){
        $return = $this->userDaoTest->getCadastredById(null);
        $this->assertFalse($return);
    }
    
    public function testGetCadastredByIdWithInvalidId(){
        $return = $this->userDaoTest->getCadastredById(-2);
        $this->assertFalse($return);
    }
    
    public function testGetCadastredByIdWithValideId(){
        $password = $this->user->getPassword();
        $return = $this->userDaoTest->getCadastredById(23);
        $this->assertEquals($this->user->getEmail(), $return[4]);
        $this->assertEquals($this->user->getName(), $return[1]);
        $this->assertEquals($this->user->getTelephone(), $return[3]);

    }
}
