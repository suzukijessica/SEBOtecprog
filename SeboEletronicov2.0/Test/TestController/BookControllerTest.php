<?php
/*
 File name: BookControllerTest.php
 File description: testing functions of class LivroControlador.php
*/ 

require_once "../../Model/BookModel.php";
require_once "../../Controller/BookController.php";
require_once "../../Dao/BookDao.php";
require_once "../../Utilities/AuthenticateData.php";
require_once "../../Utilities/ExceptionNameWrong.php";
require_once "../../Utilities/ExceptionTitleWrong.php";
require_once "../../Utilities/ExceptionPublishingWrong.php";
require_once "../../Utilities/ConnectionDatabase.php";

class BookControllerTest extends PHPUnit_Framework_TestCase{
    
    protected $bookControllerTest;
    protected $book;

    protected function setUp() {
        $this->book = new BookModel('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal');
        $this->bookControllerTest = new BookController();
    }

    protected function tearDown() {
        unset($this->bookControllerTest);
        unset($this->book);
        
    }

    public function testSavesBook() {
        $return = $this->bookControllerTest->savesBook('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal', 23);
        $this->assertTrue($return);
    }
    
    public function testSearchBook() {
        $return = $this->bookControllerTest->searchesBook($this->book->getTitle(), 'novo', 'usado', 
                'venda', 'troca');
        $this->assertFalse($return);
    }

    public function testGetBookByIdWithNullId() {
            $return = $this->bookControllerTest->getBookById(null);
            $this->assertFalse($return);    
    }
    
    public function testGetBookByIdWithNegativeId() {
            $return = $this->bookControllerTest->getBookById(-3);
            $this->assertFalse($return);    
    }
    
    public function testGetBookByIdWithTruthId() {
            $return = $this->bookControllerTest->getBookById(7);
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
        $return = $this->bookControllerTest->deletesBook(15);
        $this->assertTrue($return);    
    }

    public function testChangeBook() {
         $return = $this->bookControllerTest->changesBook('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal', 23,16);
         $this->assertTrue($return);    
    }

    public function testGetBookByIdUser() {
        $return = $this->bookControllerTest->getBookByIdUser(23);
        $this->assertFalse($return);    
    }
    
    public function testGetAllBooks(){
        $return = $this->bookControllerTest->getAllBook(23);
        $this->assertFalse($return);
    }       
    
}

?>

