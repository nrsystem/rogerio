<?php
	session_start();

	require_once "../classes/conexao.class.php";
	require_once "../classes/logintreinamento.class.php";

	if(isset($_SESSION['logado'])):

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/styleCidade.css">
  </head>
  <body>
   
    <div class="navbar">
      <a href="index.html">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Cadastro 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="unidade.php">Unidade</a>
          <a href="cidade.php">Cidade</a>
          <a href="cadastroProfessor.php">Professor</a>
          <a href="empresa.php">Empresa</a>
          <a href="responsavel.php">Responsável</a>
          <a href="area.php">Área</a>
          <a href="contrato.php">Contrato</a>
          <a href="treinamento.html">Treinamento</a>
        </div>
      </div>
      <a href="#home">Treinamentos</a>
      <a href="#home">Relatorios</a>
      <a href="#home">Pesquisa</a>
      <li class="user">
        <span class="welcome">
        <?php
          $login = utf8_encode($_SESSION['nome_usuario']);
          echo "<i class='fas fa-user'></i>" . "Olá, ". $_SESSION['nome_usuario'];
        ?>
        </span>                                       
      </li>  
    </div>
    <div class="div_left"></div>
    <div class="div_center">
        <form method="post" name="cidade" action="cadastrarCidade.php">
            <input class="descrition" type="text" name="date_debit" placeholder="Nome da Cidade" required><br>
            <input class="descritionB" type="text" name="date_debit" placeholder="Nome da Unidade" required><br>
            <input class="botaoA" type="submit" value="Enviar">
            <input class="botaoB" type="reset" value="Limpar">
        </form>
    </div>
    <div class="div_right"></div>

     
  <?php
    else:
      echo "<p style='color:red;margin-top:200px;font-size:140%;text-align:center'>". "Acesso restrito ao(s) profissionais do Senai, faça o <a href=\"..\index.php\" style='color: rgb(59, 89, 152); text-decoration:none'>login</a> para acessar". "</p>";
    endif;
  ?> 
    
  </body>
</html>
