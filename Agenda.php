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

    <!--Data Table-->
    <link  rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link  rel="stylesheet" type="text/css" href="../css/rowReorder.dataTables.min.css">
    <link  rel="stylesheet" type="text/css" href="../css/responsive.dataTables.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.responsive.min.js"></script>
    <script>


    
<script src="../js/jquery-2.1.0.js"></script>
<script>
	$(document).ready(function(){

    //Aqui a ativa a imagem de load
    function loading_show(){
		$('#loading').html("<img src='../img/loading.gif'/>").fadeIn('fast');
    }
    
    //Aqui desativa a imagem de loading
    function loading_hide(){
        $('#loading').fadeOut('fast');
    }       
    
    
    // função ajax que busca os dados e exibe na DIV
    function load_dados(valores, page, div)
    {
        $.ajax
            ({
                type: 'POST',
                dataType: 'html',
                url: page,
                beforeSend: function(){//Chama o loading antes do carregamento
		              loading_show();
				},
                data: valores,
                success: function(msg)
                {
                    loading_hide();
                    var data = msg;
			        $(div).html(data).fadeIn();				
                }
            });
    }
    
     
    //Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
    $('#cnpj').keyup(function(){
        var valores = $('#form_pesquisa').serialize()//o serialize retorna uma string pronta para ser enviada
        //pegando o valor do campo #listarContato
        var $parametro = $(this).val();
        if($parametro.length >= 1)
        {
            load_dados(valores, 'listarContato.php', '#MostraPesq');
        }else
        {
            load_dados(null, 'listarContato.php', '#MostraPesq');
        }
    });

	});
	</script>	  

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


  <!-- AJAX -->

<!-- Buscar Dados da Empresa -->
  <script>
  $(document).ready(function(){
    $("input[name='cnpj']").blur(function(){
      var $idempresa = $("input[name='idempresa']");
      var $razao_social = $("input[name='razao_social']");
      var $endereco = $("input[name='endereco']");
      var $bairro = $("input[name='bairro']");
      var $cidade = $("input[name='cidade']");
      $razao_social.val('Carregando...');
        $.getJSON(
          'listarEmpresa.php',
          { cnpj: $( this ).val() },
          function( json )
          {
            $idempresa.val( json.idempresa );
            $razao_social.val( json.razao_social );
            $endereco.val( json.endereco );
            $bairro.val( json.bairro );
            $cidade.val( json.cidade );
          }
        );
    });
  });
  </script>



<div class="left">

<div class="header"><i class="fas fa-list"></i> Dados da Proposta</div>
      <form name="form_pesquisa" id="form_pesquisa" action="" method="post">
         <input type="text" class="dados_empresa align_left" name="num_proposta" placeholder="Digite o Nº da Proposta...">
         <input type="hidden" name="idEmpresa">
         <fieldset>
						<div class="input-prepend">
							<span class="add-on"><i class="fas fa-search"></i></span>
							<input type="text" name="cnpj" id="cnpj" value="" tabindex="1" placeholder="Digite o CNPJ..." data-mask="00.000.000/0000-00">
						</div>
				</fieldset>
         <input type="text" class="dados_empresa align_left" name="razao_social" placeholder="Razão Social...">
         <input type="text" class="dados_empresa align_right" name="endereco" placeholder="Endereço...">
         <input type="text" class="dados_empresa align_left" name="bairro" placeholder="Bairro...">
         <input type="text" class="dados_empresa align_right" name="cidade" placeholder="Cidade...">

<!-- Selecionar Contato -->
 
			<div id="contentLoading">
				<div id="loading"></div>
			</div>

			<section class="jumbotron">
				<div id="MostraPesq"></div>
      </section>

<div class="header"> Selecionar Professor(es)</div>

<script>
        $(document).ready(function() {
            var table = $('#professor').DataTable( {
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            } );
        } );
       </script>

<table id="professor" class="table-bordered" style="width:100%">
  <thead>
    <tr>
	    <th>NIF</th>
	    <th>NOME</th>
	    <th>E-MAIL</th>
	    <th>ÁREA DE ATUAÇÃO</th>
	    <th>SELECIONAR</th>
	  </tr>
	 </thead>
   <tbody>

<?php

# Estabelece a conexão
$mysqli = new mysqli("localhost","root","","agenda");
# $mysqli = new mysqli("localhost","equi1650_aapm","Equip3Sen@!","equi1650_Agenda");

# checa a conexão 
if (mysqli_connect_errno()) {
  printf("Falha na conexão com o banco de dados: %s\n", mysqli_connect_error());
  exit();
}

# Realiza a consulta
if ($result = $mysqli->query("SELECT * FROM colaborador WHERE tipo_contrato LIKE 'professor%'")) {

  $row = $result->num_rows;
  # Se retornar algum resultado, exibe os dados
  if($row >= 1) { 
  #Monta o Relatório
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>". $row["nif"]. "</td>";
    echo mb_strtoupper ("<td>". $row["nome_colaborador"]. "</td>");
    echo mb_strtoupper ("<td>". $row["email_colaborador"]. "</td>");
    echo mb_strtoupper ("<td>". $row["area_atuacao"]. "</td>");
    echo "<td>". "<input type='checkbox' name='colaborador_selecionado'>". "</td>";
  }		
  }else {
    echo "<td colspan='8' align='center'>"."<span style='color:red;font-weight:600'>". "Nenhum Professor cadastrado até o momento!". "</span>"."</td>";
    echo "</tr>";
  }
  }
  ?>
  </tbody>
  </table>



<div class="header">Selecionar Especialista(s) </div>
<script>
        $(document).ready(function() {
            var table = $('#especialista').DataTable( {
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            } );
        } );
       </script>
<table id="especialista" class="table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NIF</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>ÁREA DE ATUAÇÃO</th>
                <th>SELECIONAR</th>
            </tr>
        </thead>
        <tbody>
        <?php

# Estabelece a conexão
$mysqli = new mysqli("localhost","root","","agenda");
# $mysqli = new mysqli("localhost","equi1650_aapm","Equip3Sen@!","equi1650_Agenda");

# checa a conexão 
if (mysqli_connect_errno()) {
  printf("Falha na conexão com o banco de dados: %s\n", mysqli_connect_error());
  exit();
}

# Realiza a consulta
if ($result = $mysqli->query("SELECT * FROM colaborador WHERE tipo_contrato LIKE 'especialista%'")) {

  $row = $result->num_rows;
  # Se retornar algum resultado, exibe os dados
  if($row >= 1) { 
  #Monta o Relatório
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>". $row["nif"]. "</td>";
    echo mb_strtoupper ("<td>". $row["nome_colaborador"]. "</td>");
    echo mb_strtoupper ("<td>". $row["email_colaborador"]. "</td>");
    echo mb_strtoupper ("<td>". $row["area_atuacao"]. "</td>");
    echo "<td>". "<input type='checkbox' name='colaborador_selecionado'>". "</td>";
  }		
  }else {
    echo "<td colspan='8' align='center'>"."<span style='color:red;font-weight:600'>". "Nenhum Especialista cadastrado até o momento!". "</span>"."</td>";
    echo "</tr>";
  }
  }
  ?>
  </tbody>
  </table>


</div> 

<div class="right">
<div class="header"><i class="fas fa-list"></i> Informações do Treinamento</div>
         <input type="text" class="dados_empresa align_left" name="tipo_treinamento" placeholder="Tipo de Treinamento...">
         <input type="text" class="dados_empresa align_right" name="nome_curso" placeholder="Nome do Curso...">
         <input type="number" class="dados_empresa align_left" name="num_participantes" placeholder="Número de Participantes...">
         <input type="number" class="dados_empresa align_right" name="carga_horaria" placeholder="Carga Horária...">
<div class="header bottom"> Selecione o Período</div>      
         <input type="date" class="dados_empresa align_left" name="data_inicio">
         <input type="date" class="dados_empresa align_left" name="data_fim">
 
</div>
  
      <?php
        else:
          echo "<p style='color:red;margin-top:200px;font-size:140%;text-align:center'>". "Acesso restrito ao(s) profissionais do Senai, faça o <a href=\"..\index.php\" style='color: rgb(59, 89, 152); text-decoration:none'>login</a> para acessar". "</p>";
        endif;
      ?>  
 


        <script type="text/javascript" src="../js/jquery-menu.js"></script>
        <script type="text/javascript" src="../js/jquery.mask.min.js"></script>
  </body>
</html>
