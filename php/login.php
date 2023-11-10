<?php
// Conexão com o banco de dados (substitua pelos seus dados)
$host = "localhost:3306";
$user = "root";
$senha1 = "";
$banco = "advanced";

$con =  mysqli_connect($host, $user, $senha1, $banco);

$nome = $_POST['nome'];
$senha = $_POST['senha'];

// Inicia uma transação
mysqli_begin_transaction($con);

// Primeiro, atualize todos os registros para "offline"
mysqli_query($con, "UPDATE usuario SET stats = 'offline'");

// Em seguida, execute a consulta para verificar os valores nome e senha e atualize o registro encontrado para "online"
$resultado = mysqli_query($con, "SELECT id, permissao FROM usuario WHERE nome = '$nome' AND senha = '$senha'");

$dados = array();

if ($registro = mysqli_fetch_assoc($resultado)) {
    $id = $registro['id'];
    $permissao = $registro['permissao'];

    // Crie um array associativo com os dados
    $response = array('id' => $id, 'permissao' => $permissao);
    array_push($dados, $response);

    // Atualize o registro encontrado para "online"
    mysqli_query($con, "UPDATE usuario SET stats = 'online' WHERE id = $id");
}

// Comita a transação
mysqli_commit($con);

// Crie uma variável JSON com os dados
$json = json_encode($dados);

// Fecha a conexão com o banco de dados
mysqli_close($con);

// Saída do JSON
echo $json;
?>