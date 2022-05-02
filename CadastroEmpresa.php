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
    <link rel="stylesheet" type="text/css" href="../css/styleAgenda.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/modalEmpresa.css">
    <link rel="stylesheet" type="text/css" href="../css/styleEmpresa.css">

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
      <form method="post" action="CadastrarEmpresa.php">
<div class="left top">
<div class="header"><i class="fas fa-list"></i> Cadastrar Empresa</div>
       <!-- Coluna esquerda -->
         <input type="text" class="dados_empresa align_left" name="cnpj" placeholder="Informe o CNPJ" data-mask="00.000.000/0000-00" required>
         <input type="text" class="dados_empresa align_right" name="razao_social" placeholder="Razão Social" required>
         <input type="text" class="dados_empresa align_left" name="endereco" placeholder="Endereço: Logradouro + número" required>
         <input type="text" class="dados_empresa align_right" name="bairro" placeholder="Bairro" required>
         <input type="text" class="dados_empresa align_left" name="cep" placeholder="CEP" data-mask="00000-000" required>         
         
      <!-- Coluna direita -->
         <input type="text" class="dados_empresa align_right" name="cidade" placeholder="Cidade" required>
         <input type="text" class="dados_empresa align_left" name="porte" placeholder="Porte da Empresa" required>
         <input type="text" class="dados_empresa align_right" name="cnae" placeholder="CNAE" data-mask="0000-0/00" required>
         <input type="text" class="dados_empresa align_left" name="descricao_cnae" placeholder="Descrição CNAE" required>
         <input type="text" class="dados_empresa align_right" name="segmento" placeholder="Segmento" required>

         <br><br><br><br><br>

</div>

 <div class="right top">
 <div class="header"><i class="fas fa-list"></i> Dados Complementares</div>
  <h5>Selecione a Unidade</h5>
          <div class="unidade">
             <select name="unidade_cfp">
                 <option value="4.02">4.02 - GASPAR RICARDO JÚNIOR</option>
                 <option value="4.04">4.04 - LUIZ PAGLIATO</option>
              </select>
          </div>
<p class="divisao"></p>

  <h5>Situação da Empresa</h5>
      <div class="repartA">
      <label class="dados_complementares">ATIVA
        <input type="radio" name="situacao" value="ATIVA">
        <span class="selecionarTipo"></span>
       </label>
     </div>
     <div class="repartB">
      <label class="dados_complementares">MASSA FALIDA
        <input type="radio" name="situacao" value="MASSA FALIDA">
        <span class="selecionarTipo"></span>
       </label>
     </div>

<p class="divisao"></p>

   <h5>Empresa Contribuinte?</h5>
      <div class="repartA">
       <label class="dados_complementares">SIM
        <input type="radio" name="contribuinte" value="SIM">
        <span class="selecionarTipo"></span>
       </label>
      </div>
      <div class="repartB">
       <label class="dados_complementares">NÃO
        <input type="radio" name="contribuinte" value="NÃO">
        <span class="selecionarTipo"></span>
       </label>
      </div>
      
<p class="divisao"></p>

  <h5>Estabelecimento</h5>
       <div class="repartA">
       <label class="dados_complementares">MATRIX
        <input type="radio" name="matriz_filial" value="MATRIZ">
        <span class="selecionarTipo"></span>
       </label>
      </div>
      <div class="repartB">
      <label class="dados_complementares">FILIAL
        <input type="radio" name="matriz_filial" value="FILIAL">
        <span class="selecionarTipo"></span>
       </label>
      </div>

  <input class="nova_empresa" type="submit" value="CADASTRAR" onclick="return confirm('DESEJA CONCLUIR O CADASTRO?')">
  </form>
  <div class="header bottom"><i class="fas fa-list"></i> Última Empresa Cadastrada</div>
  <?php 
# Estabelece a conexão
//$con = mysqli_connect("localhost","equi1650_Agenda","Equip3Sen@!","equi1650_Agenda");
$mysqli = new mysqli("localhost","root","","agenda");
# checa a conexão 
if (mysqli_connect_errno()) {
    printf("Falha na conexão com o banco de dados: %s\n", mysqli_connect_error());
    exit();
}
# Realiza a consulta
if ($result = $mysqli->query("SELECT * FROM empresa ORDER BY idempresa DESC LIMIT 1")) {
$row = $result->num_rows;
# Se retornar algum resultado, exibe os dados
if($row == !'') { 
#Monta o Relatório
while ($row = mysqli_fetch_array($result)) {

// exibir conteúdo HTML dento do PHP
echo "<div id='modal_empresa' class='modal'>".
  "<div class='modal__content'>".
    "<p><i class='fas fa-user-plus'></i> Para cadastrar um contato de uma empresa específica, <strong>informe um novo CNPJ</strong>; ou <br>
    <p><i class='fas fa-user-plus'></i> Se o contato for para a última empresa cadastrada, basta manter o CNPJ exibido.</p>".
    "<form action='CadastrarContatoEmpresaModal.php' method='post'>".
    "<input type='hidden' name='empresa_idempresa' value='".$row['idempresa']."'>"."<br>".
     "<input class='modalInput' name='empresa_cnpj' data-mask='00.000.000/0000-00' placeholder='CNPJ...' value='".$row['cnpj']."'>"."<br>"."<br>".
    "<strong>Selecione o tipo de contato</strong>"."<br>"."<br>".

 "<label class='contato'>"."GERAL".
  "<input type='radio' name='tipo_contato' value='GERAL'>".
  "<span class='selecionarContato'>"."</span>".
"</label>".

"<label class='contato'>"."RH".
  "<input type='radio' name='tipo_contato' value='RH'>".
  "<span class='selecionarContato'>"."</span>".
"</label>".

"<label class='contato'>"."SEGURANÇA".
  "<input type='radio' name='tipo_contato' value='SEGURANÇA'>".
  "<span class='selecionarContato'>"."</span>".
"</label>".

"<label class='contato'>"."INDUSTRIAL".
  "<input type='radio' name='tipo_contato'  value='INDUSTRIAL'>".
  "<span class='selecionarContato'>"."</span>".
"</label>".

"<label class='contato'>"."PROPRIETÁRIO/DIRETORIA".
  "<input type='radio' name='tipo_contato'  value='PROPRIETÁRIO/DIRETORIA'>".
  "<span class='selecionarContato'>"."</span>".
"</label>".

"<br>"."<br>".
     "<input class='modalInput' name='nome_contato' placeholder='Nome do Contato...' required>"."<br>".
     "<input class='modalInput' name='celular_contato' placeholder='Celular...' data-mask='(00) 00000-0000'>"."<br>".
     "<input class='modalInput' name='telefone_contato' placeholder='Telefone Fixo...' data-mask='(00) 0000-0000'>"."<br>".
     "<input class='modalInput' name='email_contato' placeholder='E-mail...'>"."<br>".
     "<input class='novo_contato' type='submit' value='ADICIONAR' onClick='return confirm(\"DESEJA CONFIRMAR A INCLUSÃO DO CONTATO?\")'>".
     "</form>".
     "<a href='#' class='modal__close'>"."<i class='fas fa-window-close'>"."</i>"."</a>".
 "</div>"."</div>".

 "<table class='table-bordered' cellspacing='0' cellpadding='2' style='width:100%'>".
   "<thead>".
     "<tr>".
       "<th>"."<b>"."CNPJ"."</b>"."</th>".
       "<th>"."<b>"."Empresa"."</b>"."</th>".
       "<th>"."<b>"."Cidade"."</b>"."</th>".
       "<th rowspan='2' style='background:#fff;border:none'>"."<a href='#modal_empresa' class='novo_contato'>"."ADICIONAR CONTATO"."</a>"."</th>".
     "</tr>".
     "</thead>".
    "<tbody>";

echo "<tr>";
echo "<td>". $row["cnpj"]. "</td>";
echo mb_strtoupper ("<td>". $row["razao_social"]. "</td>"); // mb_strtoupper converte caracteres acentuados de Lowercase para Uppercase (minúsculo para maiúsculo)
echo mb_strtoupper ("<td>". $row["cidade"]. "</td>"); 
echo "<td style='background:#fff;border:none'>". "</td>";
echo "</tr>"."</tbody>"."</table>";


}
}else {
	echo "<span style='color:red;font-weight:600;margin-left:10px'> Nenhuma empresa cadastrada no momento!</span><br>
  <span style='color:red;font-weight:600;margin-left:10px'> Ao cadastrar uma empresa, a função adicionar contato será habilitada </span>";
  
}
}
?>
  
  </div>

 





    
    
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
   </div>
  </body>
</html>
