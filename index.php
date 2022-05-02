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
    <link rel="stylesheet" type="text/css" href="../css/styleIndex.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
  </head>
  <body>
    <img class="wave" src="../img/img1.png">
   
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



<div class="dasboard">

 <div class="cardA">
 <div class="icons"><i class="fas fa-building"></i></div>
       <div class="right-display">
         <span class="dash-title">Empresas Cadastradas</span>
<?php 
# Estabelece a conexão
//$con = mysqli_connect("localhost","equi1650_aapm","","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
    // SQL query
    $sql = "SELECT * from empresa";
    if ($result = mysqli_query($con, $sql)) {
    // Retuna o numero de empresas cadastradas no sistema
    $rowcount = mysqli_num_rows( $result );
    // Exibe resultado
    echo "<span class='amount'>". $rowcount. "</span>";
}
  
// Fecha a conexão com o banco de dados
mysqli_close($con);
  
?>
 </div>
 </div>

 <div class="cardB">
     <div class="icons"><i class="fas fa-city"></i></div>
       <div class="right-display">
         <span class="dash-title">Cidades Atendidas</span>
         <?php 
# Estabelece a conexão
//$con = mysqli_connect("localhost","equi1650_aapm","","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
    // SQL query
    $sql = "SELECT DISTINCT cidade FROM empresa";
    if ($result = mysqli_query($con, $sql)) {
    // Retuna o numero de empresas cadastradas no sistema
    $rowcount = mysqli_num_rows( $result );
    // Exibe resultado
    echo "<span class='amount'>". $rowcount. "</span>";
}
  
// Fecha a conexão com o banco de dados
mysqli_close($con);
  
?>
 </div>
 </div>


 <div class="cardC">
 <div class="icons"><i class="fas fa-user-tag"></i></div>
       <div class="right-display">
         <span class="dash-title">Usuários Habilitados</span>
<?php 
# Estabelece a conexão
//$con = mysqli_connect("localhost","equi1650_aapm","","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
    // SQL query
    $sql = "SELECT * from usuario";
    if ($result = mysqli_query($con, $sql)) {
    // Retuna o numero de empresas cadastradas no sistema
    $rowcount = mysqli_num_rows( $result );
    // Exibe resultado
    echo "<span class='amount'>". $rowcount. "</span>";
}
  
// Fecha a conexão com o banco de dados
mysqli_close($con);
  
?>
 </div>
 </div>



 <div class="dasboard">

<div class="cardA">
<div class="icons"><i class="fas fa-chalkboard-teacher"></i></div>
      <div class="right-display">
        <span class="dash-title">Colaboradores Cadastrados</span>
<?php 
# Estabelece a conexão
//$con = mysqli_connect("localhost","equi1650_aapm","","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
   // SQL query
   $sql = "SELECT * from colaborador";
   if ($result = mysqli_query($con, $sql)) {
   // Retuna o numero de empresas cadastradas no sistema
   $rowcount = mysqli_num_rows( $result );
   // Exibe resultado
   echo "<span class='amount'>". $rowcount. "</span>";
}
 
// Fecha a conexão com o banco de dados
mysqli_close($con);
 
?>
</div>
</div>

<div class="cardB">
    <div class="icons"><i class="fas fa-school"></i></div>
      <div class="right-display">
        <span class="dash-title">Unidades Atendidas</span>
        <?php 
# Estabelece a conexão
//$con = mysqli_connect("localhost","equi1650_aapm","","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
   // SQL query
   $sql = "SELECT DISTINCT unidade_cfp FROM empresa";
   if ($result = mysqli_query($con, $sql)) {
   // Retuna o numero de empresas cadastradas no sistema
   $rowcount = mysqli_num_rows( $result );
   // Exibe resultado
   echo "<span class='amount'>". $rowcount. "</span>";
}
 
// Fecha a conexão com o banco de dados
mysqli_close($con);
 
?>
</div>
</div>


<div class="cardC">
<div class="icons"><i class="fas fa-calendar-alt"></i></div>
      <div class="right-display">
        <span class="dash-title">Agendamentos Realizados</span>
<?php 
# Estabelece a conexão
//$con = mysqli_connect("localhost","equi1650_aapm","","equi1650_Agenda");
$con = mysqli_connect("localhost","root","","agenda");
   // SQL query
   $sql = "SELECT * from agendamento";
   if ($result = mysqli_query($con, $sql)) {
   // Retuna o numero de empresas cadastradas no sistema
   $rowcount = mysqli_num_rows( $result );
   // Exibe resultado
   echo "<span class='amount'>". $rowcount. "</span>";
}
 
// Fecha a conexão com o banco de dados
mysqli_close($con);
 
?>
</div>
</div>

 
 

</div>

<?php
	else:
		echo "<p style='color:red;margin-top:200px;font-size:140%;text-align:center'>". "Acesso restrito ao(s) professor(es) do Senai, faça o <a href=\"..\index.php\" style='color: rgb(59, 89, 152); text-decoration:none'>login</a> para acessar". "</p>";
	endif;
?> 
  </body>
</html>
