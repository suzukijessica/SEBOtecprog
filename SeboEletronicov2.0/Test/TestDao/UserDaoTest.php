<?php
/*
 File name: UserDaoTest.php
 File description: testing function of class UsuarioDao.php
*/ 

require_once "../../Model/UserModel.php";
require_once "../../Dao/UserDao.php";
require_once "../../Utilities/AuthenticateData.php";
require_once "../../Exceptions/ExceptionNameWrong.php";
require_once "../../Exceptions/ExceptionPasswordWrong.php";
require_once "../../Exceptions/ExceptionPhoneWrong.php";
require_once "../../Exceptions/ExceptionEmailWrong.php";
require_once "../../Utilities/ConnectionDatabase.php";

class UserDaoTest extends PHPUnit_Framework_TestCase {

    protected $userDaoTest;
    protected $user;
    
    protected function setUp() {
        /**
         * creates objects which will be used in the tests
         * no parameters
         * no return
        */
        $password = array(123123,123123);
        $this->user = new UserModel('lucas', 98989898, 'lucas@lucas.com', $password);
        $this->userDaoTest = new UserDao();
    }

    protected function tearDown() {
        /**
         * clean objects which were used in the tests
         * no parameters
         * no return
        */
        unset($this->userDaoTest);
        unset($this->user);
    }

    public function testSaveUser() {
         /**
         * tests save a user in database with all its parameters
         * no parameters
         * no return
        */
        $return = $this->userDaoTest->savesUserDao($this->user);
        $this->assertTrue($return);
    }
    
    public function testChangeUser(){
         /**
         * testschange informations about a user in database with all its parameters
         * no parameters
         * no return
        */
        $return = $this->userDaoTest->changesUserDao($this->user, 11, 123456);
        $this->assertTrue($return);
    }
    
    public function testSearchUser(){
         /**
         * tests search a user in database with all its parameters
         * no parameters
         * no return
        */
        $return = $this->userDaoTest->searchesUserDao(null);
        $this->assertFalse($return);
    }
    
    public function testDeleteUser(){
         /**
         * tests delete a user from database
         * no parameters
         * no return
        */
        $password = $this->user->getPassword();
        $return = $this->userDaoTest->deletesUserDao($this->user->getEmail(), $password[0]);
        $this->assertTrue($return);
    }
    
    public function testGetCadastredByIdWithNullId(){
         /**
         * tests get user cadastre with identifier null
         * no parameters
         * no return
        */
        $return = $this->userDaoTest->getCadastredById(null);
        $this->assertFalse($return);
    }
    
    public function testGetCadastredByIdWithInvalidId(){
         /**
         *  tests get user cadastre with invalid identifier 
         * no parameters
         * no return
        */
        $return = $this->userDaoTest->getCadastredById(-2);
        $this->assertFalse($return);
    }
    
    public function testGetCadastredByIdWithValideId(){
        /**
         *  tests get user cadastre with valid identifier 
         * no parameters
         * no return
        */
        $password = $this->user->getPassword();
        $return = $this->userDaoTest->getCadastredById(23);
        $this->assertEquals($this->user->getEmail(), $return[4]);
        $this->assertEquals($this->user->getName(), $return[1]);
        $this->assertEquals($this->user->getTelephone(), $return[3]);

    }
}
