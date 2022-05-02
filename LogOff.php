<?php
// inicializa a sessão
session_start();

$_SESSION = array(); // colocando os dados da sessão em um array vazio
					 
// destroy a sessão
session_destroy();

// redireciona o link para a home page "index.php"
header("Location:../index.php");
?>