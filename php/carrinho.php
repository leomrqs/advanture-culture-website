<?php
$con = mysqli_connect("localhost:3306", "root", "", "advanced");

// Pega o nome do usuário online (assumindo que sempre haverá um)
$usuarioOnlineQuery = "SELECT nome FROM usuario WHERE stats = 'online'";
$usuarioOnlineResult = mysqli_query($con, $usuarioOnlineQuery);

if (mysqli_num_rows($usuarioOnlineResult) > 0) {
    $rowUsuario = mysqli_fetch_assoc($usuarioOnlineResult);
    $nomeUsuarioOnline = $rowUsuario["nome"];

    // Busca os itens do carrinho com o nome do usuário online
    $itensCarrinhoQuery = "SELECT * FROM carrinho WHERE nomeAdicionador = '$nomeUsuarioOnline'";
    $itensCarrinhoResult = mysqli_query($con, $itensCarrinhoQuery);

    $dados = array();

    while ($registro = mysqli_fetch_assoc($itensCarrinhoResult)) {
        array_push($dados, $registro);
    }

    // Retorna os itens no formato JSON
    $json = json_encode($dados);
    echo $json;
} else {
    echo "Nenhum usuário online encontrado.";
}

mysqli_close($con);
?>