<?php
// Recebe o nome do produto do método POST
$nomeProduto = $_POST['nomeProduto'];

// Configurações de conexão com o banco de dados
$host = "localhost:3306";
$usuario = 'root';
$senha = '';
$banco = 'advanced';

// Estabelece a conexão com o banco de dados
$con = mysqli_connect($host, $usuario, $senha, $banco);

// Consulta SQL para localizar o ID do produto pelo nome
$query = "SELECT id FROM produtos WHERE nome = '$nomeProduto'";

$resultado = mysqli_query($con, $query);
$resposta = '';
// Verifica se a consulta foi bem-sucedida e se exatamente uma linha foi encontrada
if ( $resultado && mysqli_num_rows($resultado) === 1) {
    // Obtém o ID do produto
    $row = mysqli_fetch_assoc($resultado);
    $idProduto = $row['id'];
    
    // Consulta SQL para excluir o produto pelo ID
    $deleteQuery = "DELETE FROM produtos WHERE id = $idProduto";

    // Executa a consulta SQL para excluir o produto
    mysqli_query($con, $deleteQuery);

    $resposta= "Produto excluido com sucesso!";
    //array_push($resposta, $mensagem);
} else{
    $resposta= "Produto nao encontrado no banco de dados ou multiplos produtos com o mesmo nome.";
}

    //array_push($resposta, $mensagem);


// Fecha a conexão com o banco de dados
$json = json_encode($resposta);
echo $json;
mysqli_close($con);
?>