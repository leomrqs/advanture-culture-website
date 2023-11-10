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

    // Em seguida, selecione as compras relacionadas a esse usuário
    $nomeUsuarioOnline = $usuarioOnline['nome'];
    $comprasQuery = "SELECT preco FROM compras WHERE nomeComprador = '$nomeUsuarioOnline'";
    $comprasResult = mysqli_query($con, $comprasQuery);

    $totalPago = 0;

    while ($compra = mysqli_fetch_assoc($comprasResult)) {
        $totalPago += $compra['preco'];
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