<?php
/*
 File name: BookDaoTest.php
 File description: testing functions of class BookDao.php.
*/ 

require_once "../../Model/BookModel.php";
require_once "../../Dao/BookDao.php";
require_once "../../Utilities/AuthenticateData.php";
require_once "../../Exceptions/ExceptionNameWrong.php";
require_once "../../Exceptions/ExceptionTitleWrong.php";
require_once "../../Exceptions/ExceptionPublishingWrong.php";
require_once "../../Utilities/ConnectionDatabase.php";

class BookDaoTest extends PHPUnit_Framework_TestCase {

    protected $bookDaoTest;
    protected $book;

    protected function setUp() {
        /**
         * creates objects which will be used in the tests
         * no parameters
         * no return
        */
        $this->book = new BookModel('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal');
        $this->bookDaoTest = new BookDao();
    }

    protected function tearDown() {
        unset($this->bookDaoTest);
        unset($this->book);
        /**
         * clean objects which were used in the tests
         * no parameters
         * no return
        */
    }

    public function testSaveBook() {
         /**
         * tests save a book in database with all its parameters
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->savesBookDao($this->book, 23);
        $this->assertTrue($return);
    }
    
     public function testSearchBook() {
         /**
         * tests search for a book in database with all its parameters
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->searchesBookDao($this->book->getTitulo(), 'novo', 'usado', 
                'venda', 'troca');
        $this->assertFalse($return);
    }
    
    public function testValidatesBookSelling() {
         /**
         * tests validation of book selling
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->validatesBookSelling($this->book->getTitulo(), 'novo', 'usado', 
                'venda');
        $this->assertFalse($return);
    }
    
    public function testValidatesBookExchanging() {
         /**
         * tests validation of book exchanging
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->validatesBookExchanging($this->book->getTitulo(), 'novo', 'usado', 
                'troca');
        $this->assertFalse($return);
    }

    public function testGetBookByIdDaoWithNullId() {
         /**
         * tests get a book in database using identifier null
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->getBookByIdDao(null);
        $this->assertFalse($return);    
    }
    
    public function testGetBookByIdDaoWithNegativeId() {
        /**
         * tests get a book in database using negative identifier
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->getBookByIdDao(-3);
        $this->assertFalse($return);    
    }
    
    public function testValidatesBookArray(){
        $return = $this->bookDaoTest->validatesBookArray(booksArray);
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
    public function testGetBookByIdDaoWithValidId() {
        /**
         * tests get a book in database using valid identifier
         * no parameters
         * no return
        */
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
        /**
         * tests delete a book from database
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->deletesBookDao(15);
        $this->assertTrue($return);    
    }


    public function testChangeBook() {
         /**
         * tests change informations about a book in database
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->changesBookDao($this->book, 23,16);
        $this->assertTrue($return);    
    }

    public function testGetBookByIdUser() {
         /**
         * tests get a book in database using user identifier
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->getBookByIdUserDao(23);
        $this->assertFalse($return);    
    }
    
    public function testGetBookByIdUserWithValidReturn() {
        /**
         * tests get a book in database using user identifier valid return of function
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->getBookByIdUserDao(23);
        $this->assertNotSame(null, $return);    
    }
    
    public function testGetAllBook(){
        /**
         * tests get all books in database
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->getAllBookDao(23);
        $this->assertFalse($return);
    }
    
    public function testGetAllBookWithValidReturn(){
        /**
         * tests get all books in database with valid return
         * no parameters
         * no return
        */
        $return = $this->bookDaoTest->getAllBookDao(23);
        $this->assertNotSame(null, $return);
    }


}
