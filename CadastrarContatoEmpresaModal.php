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
    <meta http-equiv="refresh" content="5; URL='CadastroEmpresa.php'">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/styleEmpresa.css">

<!--Tabela-->
<script type="text/javascript" src="../js/jquery-latest.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

<style>

.table{
width:90%;
margin: 20px auto;
}
.alignment{
 text-align: center; vertical-align:middle !important;
}
.first{
background:#F0F8FF;
}
.second{
background:#F8F8FF;
}
</style>

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


<div class="center">


<?php
# Recebe os dados da empresa
$empresa_idempresa                 = $_POST['empresa_idempresa'];
$empresa_cnpj                      = $_POST['empresa_cnpj'];
$nome_contato                      = $_POST['nome_contato'];
$celular_contato                   = $_POST['celular_contato'];
$telefone_contato                  = $_POST['telefone_contato'];
$email_contato                     = $_POST['email_contato'];
$tipo_contato                      = $_POST['tipo_contato'];

//$con = mysqli_connect("localhost","equi1650_Agenda","Equip3Sen@!","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
$con->set_charset("utf8");
if (mysqli_connect_errno()){
  echo "Falha ao conectar ao banco de dados!";
  }

$sql = "INSERT INTO contato (empresa_idempresa,empresa_cnpj,nome_contato,celular_contato,telefone_contato,email_contato,tipo_contato) 
VALUES ('$empresa_idempresa','$empresa_cnpj','$nome_contato','$celular_contato','$telefone_contato','$email_contato','$tipo_contato')";

if (mysqli_query($con, $sql)) {
    echo "<span style='color:yellow;font-weight:600'>"."&nbsp;&nbsp;Contato cadastrado com sucesso!"."<span>";
} else {
    echo "<span style='color:yellow;font-weight:600'>"."&nbsp;&nbsp;Falha ao gravar os dados: " ."<span>". mysqli_error($con);
}

mysqli_close($con);
?> 
</div>        
    

<?php
	else:
		echo "<p style='color:red;margin-top:200px;font-size:140%;text-align:center'>". "Acesso restrito à secretaria do Senai, faça o <a href=\"..\index.php\" style='color: rgb(59, 89, 152); text-decoration:none'>login</a> para acessar". "</p>";
	endif;
?>     
  </body>
</html>
