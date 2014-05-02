/*
 File name: Redireciona.js
 File description: redirects windows
 */

function livrosDisponiveis() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/AvailableBooks.php";
}

function meusLivros() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/MyBooks.php";
}

function home() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/Login.php";
}

function user() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/IndexUser.php";
}

function cadastra() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/RegisterUser.php";
}

function altera() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/ChangeUser.php";
}

function deleta() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/DeleteUser.php";
}

function pesquisa() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/SearchUser.php";
}

function cadastraLivro() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/RegisterBook.php";
}

function pesquisaLivro() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/SearchBook.php";
}

function deletaLivro() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/DeleteBook.php";
}

function livro() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/IndexBook.php";
}
function login() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/Login.php";
}
function sair() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/Site.php";
}
function loginsuccessfully(id) {
    window.location = 'http://localhost/SEBOtecprog/SeboEletronicov2.0/View/IndexLogin.php?idUser=id';
}
function loginfailed() {
    setTimeout("window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/Login.php'", 0);
}