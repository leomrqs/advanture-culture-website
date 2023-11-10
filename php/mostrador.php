<?php
// Configurações de conexão com o banco de dados
$host = "localhost:3306"; // Altere para o seu host
$usuario = "root"; // Altere para o seu usuário
$senha = ""; // Altere para a sua senha
$banco = "advanced"; // Altere para o seu banco de dados

// Estabelece a conexão com o banco de dados
$con = mysqli_connect($host, $usuario, $senha, $banco);

if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Consulta SQL para buscar o nome do usuário online
$query = "SELECT nome FROM usuario WHERE stats = 'online'";
$resultado = mysqli_query($con, $query);

if ($resultado) {
    $dados = mysqli_fetch_assoc($resultado);

    if ($dados) {
        // Usuário online encontrado, retorna o nome
        echo $dados['nome'];
    } else {
        // Nenhum usuário online encontrado, pode retornar uma mensagem
        echo "Nenhum usuário online no momento.";
    }
} else {
    // Erro na consulta
    echo "Erro na consulta: " . mysqli_error($con);
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>