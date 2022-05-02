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
    <link rel="stylesheet" type="text/css" href="../css/styleProfessor.css">
  </head>
  <body>
   
  <div class="navbar">
      <a href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Cadastro 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="CadastroEmpresa.php">Empresa</a>
          <a href="CadastroColaborador.php">Colaborador</a>
        </div>
      </div>
      <a href="Agenda.php">Agenda</a>
      <a href="Relatorios.php">Relatorios</a>
      <a href="Pesquisa.php">Pesquisa</a>
      <a href="logOff.php">LogOff</a>
      <li class="user">
        <span class="welcome">
        <?php
          $login = utf8_encode($_SESSION['nome_usuario']);
          echo "<i class='fas fa-user'></i>" . "Olá, ". $_SESSION['nome_usuario'];
        ?>
        </span>                                       
      </li>  
    </div>

    <p style="font-size:20px;color:yellow;text-align:center">Página em construção</P
    
    
    <script type="text/javascript" src="../js/jquery-menu.js"></script>
        <script type="text/javascript" src="../js/jquery-latest.min.js"></script>
        <script type="text/javascript" src="../js/jquery.mask.min.js"></script>
        <script src="../js/examples.js"></script>
        <script src="../js/jquery-img.js"></script>
  
      <?php
        else:
          echo "<p style='color:red;margin-top:200px;font-size:140%;text-align:center'>". "Acesso restrito ao(s) profissionais do Senai, faça o <a href=\"..\index.php\" style='color: rgb(59, 89, 152); text-decoration:none'>login</a> para acessar". "</p>";
        endif;
      ?>  
    
  </body>
</html>
