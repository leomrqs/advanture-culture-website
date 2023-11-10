<?php
// Recebe as informações do método POST
$nomeProduto = $_POST['nomeProduto'];
$precoProduto = $_POST['precoProduto'];
$categoriaProduto = $_POST['categoriaProduto'];

// Recebe o arquivo da imagem enviado pelo JavaScript
$arquivo = $_FILES["arquivo"];
$novo_arquivo = "img/" . $arquivo["name"];

// Move o arquivo da pasta temporária para a pasta de destino
move_uploaded_file($arquivo["tmp_name"], $novo_arquivo);

// Configurações de conexão com o banco de dados
$host = "localhost:3306";
$usuario = 'root';
$senha = '';
$banco = 'advanced';

// Estabelece a conexão com o banco de dados
$con = mysqli_connect($host, $usuario, $senha, $banco);

// Monta a consulta SQL com os valores diretamente na string
$sql = "INSERT INTO produtos (nome, preco, imagem, categoria) VALUES ('$nomeProduto', $precoProduto, '$novo_arquivo','$categoriaProduto')";

// Executa a consulta SQL
mysqli_query($con, $sql);

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>