<?php
	//recebemos nosso parâmetro vindo do form
	$parametro = isset($_POST['area_atuacao']) ? $_POST['area_atuacao'] : null;
	$msg = "";
	//começamos a concatenar nossa tabela
	$msg .="<table class='table-bordered' width='100%'>";
	$msg .="	<thead>";
	$msg .="		<tr>";
	$msg .="			<th>Nome</th>";
    $msg .="			<th>Celular</th>";
	$msg .="			<th>E-mail</th>";
	$msg .="			<th>Selecionar</th>";
	$msg .="		</tr>";
	$msg .="	</thead>";
	$msg .="	<tbody>";
				
				// estabelece a conexão
				require_once('../classes/conect.class.php');
					try {
						$pdo = new Conexao(); 
						$resultado = $pdo->select("SELECT * FROM professor WHERE area_atuacao LIKE '$parametro%'");
						$pdo->desconectar();
								
						}catch (PDOException $e){
							echo $e->getMessage();
						}	
						//resgata os dados na tabela
						if(count($resultado)){
							foreach ($resultado as $res) {

	$msg .="				<tr>";
	$msg .= mb_strtoupper("<td>".$res['nome_professor']."</td>");
	$msg .="					<td>".$res['celular_professor']."</td>";
	$msg .= mb_strtoupper("<td>".$res['email_professor']."</td>");
	$msg .="					<td style='text-align:center;vertical-align:middle'>"."<input type='checkbox' name='contato_selecionado'>"."</td>";
	$msg .="				</tr>";
							}	
						}else{
							$msg = "";
							$msg .= "<p class='alert'>"."Nenhum Professor Cadastrado..."."</p>";
							$msg .= "<p>"."Para cadastrar um novo Professor,  ". "<a href='CadastroProfessor.php'>". "clique aqui". "</a>"."</p>";
						}
	$msg .="	</tbody>";
	$msg .="</table>";
	//retorna a msg concatenada
	echo $msg;
?>