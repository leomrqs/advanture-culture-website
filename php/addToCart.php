<?php
$host = "localhost:3306";
$user = "root";
$senha = "";
$banco = "advanced";

$con = mysqli_connect($host, $user, $senha, $banco);

// Passo 1: Verificar qual usuário está online
$usuarioOnlineQuery = "SELECT nome FROM usuario WHERE stats = 'online'";
$usuarioOnlineResult = mysqli_query($con, $usuarioOnlineQuery);

if (mysqli_num_rows($usuarioOnlineResult) > 0) {
    // Passo 2: Pegar o nome do usuário online
    $rowUsuario = mysqli_fetch_assoc($usuarioOnlineResult);
    $nomeUsuarioOnline = $rowUsuario["nome"];

    // Passo 3: Inserir o produto na tabela carrinho com o nome do usuário online
    $idProduto = $_POST['idProduto'];

    $sql = "SELECT * FROM produtos WHERE id = $idProduto";
    $result = mysqli_query($con, $sql);

    $mensagem = array();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $nomeProduto = $row["nome"];
        $precoProduto = $row["preco"];
        $imagemProduto = $row["imagem"];
        $categoriaProduto = $row["categoria"];

        $sqlCarrinho = "INSERT INTO carrinho (nome, preco, imagem, categoria, nomeAdicionador)
                VALUES ('$nomeProduto', $precoProduto, '$imagemProduto', '$categoriaProduto', '$nomeUsuarioOnline')";

        if (mysqli_query($con, $sqlCarrinho)) {
            $resposta = "Produto adicionado ao carrinho com sucesso.";
            array_push($mensagem, $resposta);
        } else {
            $resposta = "Erro ao adicionar o produto ao carrinho.";
            array_push($mensagem, $resposta);
        }
    } else {
        $resposta = "Produto não encontrado.";
        array_push($mensagem, $resposta);
    }
} else {
    $resposta = "Nenhum usuário online encontrado.";
    array_push($mensagem, $resposta);
}

$json = json_encode($mensagem);
echo $json;

mysqli_close($con);
?>