<?php
// Conexão com o banco de dados
$con = mysqli_connect("localhost:3306", "root", "", "advanced");

// Verifique a conexão
if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Primeiro, encontre o usuário online
$usuarioOnlineQuery = "SELECT nome FROM usuario WHERE stats = 'online'";
$usuarioOnlineResult = mysqli_query($con, $usuarioOnlineQuery);

if ($usuarioOnlineResult) {
    $usuarioOnline = mysqli_fetch_assoc($usuarioOnlineResult);

    // Em seguida, selecione os itens de compras relacionados a esse usuário
    $nomeUsuarioOnline = $usuarioOnline['nome'];
    $comprasQuery = "SELECT nome, preco FROM compras WHERE nomeComprador = '$nomeUsuarioOnline'";
    $comprasResult = mysqli_query($con, $comprasQuery);

    $compras = array();

    while ($compra = mysqli_fetch_assoc($comprasResult)) {
        array_push($compras, $compra);
    }

    // Feche a conexão com o banco de dados
    mysqli_close($con);

    // Agora você tem os itens de compras relacionados ao usuário online
    // Saída como JSON
    $json = json_encode($compras);
    echo $json;
} else {
    echo "Erro ao buscar o usuário online.";
}
?>