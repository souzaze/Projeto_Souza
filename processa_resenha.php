<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sousas_literary";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$titulo_livro = $_POST['bookTitle'];
$nome_resenhista = $_POST['reviewerName'];
$texto_resenha = $_POST['reviewText'];

$sql = "INSERT INTO resenhas (titulo_livro, nome_resenhista, texto_resenha) 
        VALUES ('$titulo_livro', '$nome_resenhista', '$texto_resenha')";

if ($conn->query($sql) === TRUE) {
    echo "Resenha cadastrada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: resenha.php");
exit;
?>

<!-- CREATE DATABASE sousas_literary;
USE sousas_literary;

CREATE TABLE resenhas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo_livro VARCHAR(255) NOT NULL,
    nome_resenhista VARCHAR(255) NOT NULL,
    texto_resenha TEXT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); -->
