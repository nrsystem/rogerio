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
$cnpj                              = $_POST['cnpj'];
$razao_social                      = $_POST['razao_social'];
$endereco                          = $_POST['endereco'];
$bairro                            = $_POST['bairro'];
$cep                               = $_POST['cep'];
$cidade                            = $_POST['cidade'];
$porte                             = $_POST['porte'];
$cnae                              = $_POST['cnae'];
$descricao_cnae                    = $_POST['descricao_cnae'];
$segmento                          = $_POST['segmento'];
$unidade_cfp                       = $_POST['unidade_cfp'];
$situacao                          = $_POST['situacao'];
$contribuinte                      = $_POST['contribuinte'];
$matriz_filial                     = $_POST['matriz_filial'];



//$con = mysqli_connect("localhost","equi1650_Agenda","Equip3Sen@!","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
$con->set_charset("utf8");
if (mysqli_connect_errno()){
  echo "Falha ao conectar ao banco de dados!";
  }

$sql = "INSERT INTO empresa (cnpj,unidade_cfp,razao_social,endereco,bairro,cep,cidade,porte,segmento,cnae,descricao_cnae,contribuinte,situacao,matriz_filial) 
VALUES ('$cnpj','$unidade_cfp','$razao_social','$endereco','$bairro','$cep','$cidade','$porte','$segmento','$cnae','$descricao_cnae','$contribuinte','$situacao','$matriz_filial')";

if (mysqli_query($con, $sql)) {
    echo "<span style='color:yellow;font-weight:600'>"."&nbsp;&nbsp;Empresa cadastrada com sucesso!"."<span>";
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
