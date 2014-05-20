<?php
/*
 File name: BookDaoTest.php
 File description: testing functions of class LivroDaoTest.php.
*/ 

require_once "../../Model/BookModel.php";
require_once "../../Dao/BookDao.php";
require_once "../../Utilities/AuthenticateData.php";
require_once "../../Utilities/ExceptionNameWrong.php";
require_once "../../Utilities/ExceptionTitleWrong.php";
require_once "../../Utilities/ExceptionPublishingWrong.php";
require_once "../../Utilities/ConnectionDatabase.php";

class BookDaoTest extends PHPUnit_Framework_TestCase {

    protected $bookDaoTest;
    protected $book;

    protected function setUp() {
        $this->book = new BookModel('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal');
        $this->bookDaoTest = new BookDao();
    }

    protected function tearDown() {
        unset($this->bookDaoTest);
        unset($this->book);
        
    }

    public function testSaveBook() {
        $return = $this->bookDaoTest->savesBookDao($this->book, 23);
        $this->assertTrue($return);
    }
    
     public function testSearchBook() {
        $return = $this->bookDaoTest->searchesBookDao($this->book->getTitulo(), 'novo', 'usado', 
                'venda', 'troca');
        $this->assertFalse($return);
    }

    public function testGetBookByIdDaoWithNullId() {
        $return = $this->bookDaoTest->getBookByIdDao(null);
        $this->assertFalse($return);    
    }
    
    public function testGetBookByIdDaoWithNegativeId() {
        $return = $this->bookDaoTest->getBookByIdDao(-3);
        $this->assertFalse($return);    
    }
    
    public function testGetBookByIdDaoWithValidId() {
            $return = $this->bookDaoTest->getBookByIdDao(7);
            $this->assertEquals(23, $return[1]);
            $this->assertEquals($this->book->getTitle(), $return[2]);
            $this->assertEquals($this->book->getPublisher(), $return[3]);
            $this->assertEquals($this->book->getAuthor(), $return[4]);
            $this->assertEquals($this->book->getEdition(), $return[5]);
            $this->assertEquals($this->book->getGenre(), $return[6]);
            $this->assertEquals($this->book->getStatus(), $return[7]);
            $this->assertEquals($this->book->getDescription(), $return[8]);
            $this->assertEquals($this->book->getSale(), $return[9]);
            $this->assertEquals($this->book->getSwap(), $return[10]);  
    }

    public function testDeleteBook() {
        $return = $this->bookDaoTest->deletesBookDao(15);
        $this->assertTrue($return);    
    }


    public function testChangeBook() {
        $return = $this->bookDaoTest->changesBookDao($this->book, 23,16);
        $this->assertTrue($return);    
    }

    public function testGetBookByIdUser() {
        $return = $this->bookDaoTest->getBookByIdUserDao(23);
        $this->assertFalse($return);    
    }
    
    public function testGetBookByIdUserWithValidReturn() {
        $return = $this->bookDaoTest->getBookByIdUserDao(23);
        $this->assertNotSame(null, $return);    
    }
    
    public function testGetAllBook(){
        $return = $this->bookDaoTest->getAllBookDao(23);
        $this->assertFalse($return);
    }
    
    public function testGetAllBookWithValidReturn(){
        $return = $this->bookDaoTest->getAllBookDao(23);
        $this->assertNotSame(null, $return);
    }


}
