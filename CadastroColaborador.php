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
    <link rel="stylesheet" type="text/css" href="../css/styleColaborador.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
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
    <div class="header"><i class="fas fa-list"></i> Dados do Colaborador</div>
        <form method="post" name="colaborador" action="CadastrarColaborador.php">
            <input class="dados_colaborador align_left" type="number" name="nif" placeholder="SN - Somente números" required>
            <input class="dados_colaborador align_right" type="text" name="nome_colaborador" placeholder="Nome do Colaborador" required>
            <input class="dados_colaborador align_left" type="email" name="email_colaborador" placeholder="Digite o E-mail ...." required>
            <input class="dados_colaborador align_right" type="tel" name="celular_colaborador" placeholder="Digite o Celular ...." data-mask="(00) 00000-0000" required>
            <input class="dados_colaborador align_left" type="text" name="cpf_colaborador" placeholder="Digite o CPF...." data-mask="000.000.000-00" required>
            <input class="dados_colaborador align_right" type="text" name="rg_colaborador" placeholder="Digite o RG ...." data-mask="00.000.000-0" required>

            <p class="combo"></p>

            <div class="header"><i class="fas fa-list"></i> Dados Complementares</div>
          <div class="unidade">
             <select name="unidade_colaborador">
                 <option value="">SELECIONE A UNIDADE</option>
                 <option value="4.02 - Gaspar Ricardo Júnior">4.02 - GASPAR RICARDO JÚNIOR</option>
                 <option value="4.04 - Luiz Pagliato">4.04 - LUIZ PAGLIATO</option>
              </select>
          </div>

          <p class="combo_mini"></p>

          <div class="contrato">
             <select name="tipo_contrato">
                 <option value="">SELECIONE O TIPO DE CONTRATO</option>
                 <option value="Professor Mensalista">PROFESSOR MENSALISTA</option>
                 <option value="Professor Horista">PROFESSOR HORISTA</option>
                 <option value="Especialista">ESPECIALISTA</option>
              </select>
          </div>

          <p class="combo_mini"></p>

          <div class="atuacao">
             <select name="area_atuacao">
                 <option value="">SELECIONE A ÁREA DE ATUAÇÃO</option>
                 <option value="automação">AUTOMAÇÃO</option>
                 <option value="construção civil">CONSTRUÇÃO CIVIL</option>
                 <option value="eletroeletrônica">ELETROELETRÔNICA</option>
                 <option value="gestão">GESTÃO</option>
                 <option value="manutenção automotiva">MANUTENÇÃO AUTOMOTIVA</option>
                 <option value="manutenção industrial">MANUTENÇÃO INDUSTRIAL</option>
                 <option value="metalmecânica">METALMECÂNICA</option>
                 <option value="segurança do trabalho">SEGURANÇA NO TRABALHO</option>
                 <option value="tecnologia da informação">TECNOLOGIA DA INFORMAÇÃO</option>
              </select>
          </div>

          <input class="novo_colaborador" type="submit" value="CADASTRAR" onclick="return confirm('DESEJA CONCLUIR O CADASTRO?')">
         
           
    </div>
    <div class="div_right">
      <div class="imageContainer">
        <img src="../img/undraw_profile_pic_ic5t.png" alt="Selecione uma imagem" id="imgPhoto">
      </div>
      <input type="file" id="flImage" name="foto_perfil" accept="image/*">
    </div>
    </form>
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
