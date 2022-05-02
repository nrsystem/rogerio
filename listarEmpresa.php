<?php
  /**
   * função que devolve em formato JSON os dados da empresa
   */
  function retorna( $cnpj, $db )
  {
    $sql = "SELECT * FROM empresa WHERE empresa.cnpj = '{$cnpj}' ";

    $query = $db->query( $sql );

    $arr = Array();
    if( $query->num_rows )
    {
      while( $dados = $query->fetch_object() )
      {
        $arr['idempresa'] = $dados->idempresa;
        $arr['razao_social'] = $dados->razao_social;
        $arr['endereco'] = $dados->endereco;
        $arr['bairro'] = $dados->bairro;
        $arr['cidade'] = $dados->cidade;
      }
    }
    else
    $arr['razao_social'] = 'Empresa não cadastrada';
    return json_encode( $arr );
  }
/* só se for enviado o parâmetro, que devolve os dados */
if( isset($_GET['cnpj']) )
{
  $db = new mysqli('localhost', 'root', '', 'agenda');
  echo retorna( filter ( $_GET['cnpj'] ), $db );
}

function filter( $var ){
    return $var;
  }

?>