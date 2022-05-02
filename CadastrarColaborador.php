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
    <meta http-equiv="refresh" content="5; CadastroColaborador.php">
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
    <div class="div_left"></div>
    <div class="div_center">


<div class="confirmacao">

<?php
# Recebe os dados do colaborador
$nif                               = $_POST['nif'];
$nome_colaborador                  = $_POST['nome_colaborador'];
$email_colaborador                 = $_POST['email_colaborador'];
$celular_colaborador               = $_POST['celular_colaborador'];
$cpf_colaborador                   = $_POST['cpf_colaborador'];
$rg_colaborador                    = $_POST['rg_colaborador'];
$unidade_colaborador               = $_POST['unidade_colaborador'];
$tipo_contrato                     = $_POST['tipo_contrato'];
$area_atuacao                      = $_POST['area_atuacao'];
$foto_perfil                       = $_POST['foto_perfil'];

//$con = mysqli_connect("localhost","equi1650_Agenda","Equip3Sen@!","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
$con->set_charset("utf8");
if (mysqli_connect_errno()){
  echo "Falha ao conectar ao banco de dados!";
  }

$sql = "INSERT INTO colaborador (nif,nome_colaborador,area_atuacao,foto_perfil,tipo_contrato,email_colaborador,celular_colaborador,cpf_colaborador,rg_colaborador,unidade_colaborador) 
VALUES ('$nif','$nome_colaborador','$area_atuacao','$foto_perfil','$tipo_contrato','$email_colaborador','$celular_colaborador','$cpf_colaborador','$rg_colaborador','$unidade_colaborador')";

if (mysqli_query($con, $sql)) {
  echo "<span style='color:yellow;font-weight:600'>"."&nbsp;&nbsp;Colaborador cadastrado com sucesso!"."<span>";
} else {
  echo "<span style='color:yellow;font-weight:600'>"."&nbsp;&nbsp;Falha ao gravar os dados: " ."<span>". mysqli_error($con);
}

mysqli_close($con);
?> 
</div>        
    

<?php
	else:
		echo "<p style='color:red;margin-top:200px;font-size:140%;text-align:center'>". "Acesso restrito ao(s) professor(es) do Senai, faça o <a href=\"..\index.php\" style='color: rgb(59, 89, 152); text-decoration:none'>login</a> para acessar". "</p>";
	endif;
?>     
  </body>
</html>
