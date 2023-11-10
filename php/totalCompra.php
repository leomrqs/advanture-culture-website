<?php
$con = mysqli_connect("localhost:3306", "root", "", "advanced");

if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Primeiro, encontre o usuário online
$usuarioOnlineQuery = "SELECT nome FROM usuario WHERE stats = 'online'";
$usuarioOnlineResult = mysqli_query($con, $usuarioOnlineQuery);

if ($usuarioOnlineResult) {
    $usuarioOnline = mysqli_fetch_assoc($usuarioOnlineResult);

    // Em seguida, selecione os produtos relacionados a esse usuário no carrinho
    $nomeUsuarioOnline = $usuarioOnline['nome'];
    $produtosQuery = "SELECT preco FROM carrinho WHERE nomeAdicionador = '$nomeUsuarioOnline'";
    $produtosResult = mysqli_query($con, $produtosQuery);

    $totalPago = 0;

    while ($produto = mysqli_fetch_assoc($produtosResult)) {
        $totalPago += $produto['preco'];
    }

    // Feche a conexão com o banco de dados
    mysqli_close($con);

    // Agora você tem o valor total pago pelo usuário online
    // Saída como JSON
    $json = json_encode(array('totalPago' => $totalPago));
    echo $json;
} else {
    echo "Erro ao buscar o usuário online.";
}
?>