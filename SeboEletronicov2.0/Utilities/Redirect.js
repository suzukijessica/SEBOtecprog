/*
 File name: Redireciona.js
 File description: redirects windows
 */

function livrosDisponiveis() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/livrosDisponiveis.php";
}

function meusLivros() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/meusLivros.php";
}

function home() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/indexLogin.php";
}

function user() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/indexUsuario.php";
}

function cadastra() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/cadastrarUsuario.php";
}

function altera() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/alteraUsuario.php";
}

function deleta() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/excluiUsuario.php";
}

function pesquisa() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/pesquisarUsuario.php";
}

function cadastraLivro() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/cadastrarLivro.php";
}

function pesquisaLivro() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/pesquisarLivro.php";
}

function deletaLivro() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/excluirLivro.php";
}

function livro() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/indexLivro.php";
}
function login() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/entrarLogin.php";
}
function sair() {
    window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/site.php";
}
function loginsuccessfully(id) {
    window.location = 'http://localhost/SEBOtecprog/SeboEletronicov2.0/View/indexLogin.php?idUser=id';
}
function loginfailed() {
    setTimeout("window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/entrarLogin.php'", 0);
}