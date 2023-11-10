<?php
// Conexão com o banco de dados (substitua pelos seus dados)
$host = "localhost:3306";
$user = "root";
$senha1 = "";
$banco = "advanced";

$con = mysqli_connect($host, $user, $senha1, $banco);

// Passo 1: Encontre o usuário online
$usuarioOnlineQuery = "SELECT nome FROM usuario WHERE stats = 'online'";
$usuarioOnlineResult = mysqli_query($con, $usuarioOnlineQuery);

if ($registroUsuario = mysqli_fetch_assoc($usuarioOnlineResult)) {
    $usuarioOnline = $registroUsuario['nome'];

    // Passo 2: Encontre os produtos do carrinho para esse usuário
    $carrinhoQuery = "SELECT nome, preco FROM carrinho WHERE nomeAdicionador = '$usuarioOnline'";
    $carrinhoResult = mysqli_query($con, $carrinhoQuery);

    // Passo 3: Inicialize um array para armazenar os produtos
    $produtos = array();

    while ($registroCarrinho = mysqli_fetch_assoc($carrinhoResult)) {
        $nomeProduto = $registroCarrinho['nome'];
        $precoProduto = $registroCarrinho['preco'];

        // Passo 4: Insira os produtos na tabela compras
        mysqli_query($con, "INSERT INTO compras (nome, preco, nomeComprador) VALUES ('$nomeProduto', $precoProduto, '$usuarioOnline')");

        // Adicione os produtos ao array
        $produtos[] = array('nome' => $nomeProduto, 'preco' => $precoProduto);
    }

    // Passo 5: Delete os produtos do carrinho após todos terem sido inseridos na tabela compras
    mysqli_query($con, "DELETE FROM carrinho WHERE nomeAdicionador = '$usuarioOnline'");
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>