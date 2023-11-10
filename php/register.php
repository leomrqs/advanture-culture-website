<?php
// Recebe as informações do método POST
$nome = $_POST['nome'];
$senha = $_POST['senha'];

// Configurações de conexão com o banco de dados
$host = "localhost:3306";
$usuario = 'root';
$senha1 = '';
$banco = 'advanced';

// Estabelece a conexão com o banco de dados
$con = mysqli_connect($host, $usuario, $senha1, $banco);

// Monta a consulta SQL com os valores diretamente na string
$sql = "INSERT INTO usuario (nome, senha, permissao) VALUES ('$nome', '$senha','user')";

// Executa a consulta SQL
if (mysqli_query($con, $sql)) {
    // Inserção bem-sucedida, retorna 1
    echo "1";
} else {
    // Falha na inserção, retorna 0
    echo "0";
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>