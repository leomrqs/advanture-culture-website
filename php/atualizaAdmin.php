<?php
// Conexão com o banco de dados
$host = "localhost:3306";
$user = "root";
$senha = "";
$banco = "advanced";

$con =  mysqli_connect($host, $user, $senha, $banco);

// Recuperando username do POST

$username = $_POST['username'];
$query = "SELECT id FROM usuario WHERE nome = '$username'";
$resultado = mysqli_query($con, $query);
if ($resultado && mysqli_num_rows($resultado) === 1) {
    
    $row = mysqli_fetch_assoc($resultado);
    $idUsuario = $row['id'];

    $updateQuery = "UPDATE usuario SET permissao='admin' WHERE id = $idUsuario";

    mysqli_query($con, $updateQuery);

    echo "Usuario atualizado com sucesso!";

} else{

    echo "Usuario nao encontrado no banco de dados.";
}

// Fechando a conexão
mysqli_close($con);
?>