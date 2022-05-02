<?php

echo "<div class='header bottom'> Selecionar Contato(s) </div>";



	//recebemos nosso parâmetro vindo do form
	$parametro = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
	$msg = "";
	//começamos a concatenar nossa tabela
	$msg .="<table class='nowrap table-bordered' width='100%'>";
	$msg .="	<thead>";
	$msg .="		<tr>";
	$msg .="			<th>Nome</th>";
	$msg .="			<th>Celular</th>";
	$msg .="			<th>Telefone</th>";
	$msg .="			<th>E-mail</th>";
	$msg .="			<th>Tipo de Contato</th>";
	$msg .="			<th>Selecionar</th>";
	$msg .="		</tr>";
	$msg .="	</thead>";
	$msg .="	<tbody>";
				
				// estabelece a conexão
				require_once('../classes/conect.class.php');
					try {
						$pdo = new Conexao(); 
						$resultado = $pdo->select("SELECT * FROM contato WHERE empresa_cnpj LIKE '$parametro%' limit 4");
						$pdo->desconectar();
								
						}catch (PDOException $e){
							echo $e->getMessage();
						}	
						//resgata os dados na tabela
						if(count($resultado)){
							foreach ($resultado as $res) {

	$msg .="				<tr>";
	$msg .= mb_strtoupper("<td>".$res['nome_contato']."</td>");
	$msg .="					<td>".$res['celular_contato']."</td>";
	$msg .="					<td>".$res['telefone_contato']."</td>";
	$msg .= mb_strtoupper("<td>".$res['email_contato']."</td>");
	$msg .= mb_strtoupper("<td>".$res['tipo_contato']."</td>");
	$msg .="					<td style='text-align:center;vertical-align:middle'>"."<input type='checkbox' name='contato_selecionado'>"."</td>";
	$msg .="				</tr>";
							}	
						}else{
							$msg = "";
							$msg .= "<p class='alert'>"."Nenhum contato encontrado para o CNPJ informado!"."</p>";
							$msg .= "<p>"."Para cadastrar uma empresa ou um novo contato,  ". "<a href='CadastroEmpresa.php'>". "clique aqui". "</a>"."</p>";
						}
	$msg .="	</tbody>";
	$msg .="</table>";
	//retorna a msg concatenada
	echo $msg;
?>