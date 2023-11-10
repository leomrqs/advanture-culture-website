<?php
// Recebe o ID do produto do método POST
$idProduto = $_POST['idProduto'];

// Configurações de conexão com o banco de dados
$host = "localhost:3306";
$usuario = "root";
$senha = "";
$banco = "advanced";

// Estabelece a conexão com o banco de dados
$con = mysqli_connect($host, $usuario, $senha, $banco);

// Monta a consulta SQL para excluir o produto pelo ID
$sql = "DELETE FROM carrinho WHERE id = $idProduto";

if (mysqli_query($con, $sql)) {
    echo "Produto excluído do carrinho com sucesso!";
} else {
    echo "Erro ao excluir o produto do carrinho: " . mysqli_error($conexao);
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
