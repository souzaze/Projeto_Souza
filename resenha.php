<?php
$servername = "localhost";
$username = "root";
$password = "ifsp";
$dbname = "sousas_literary";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Deletar resenha
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $conn->query("DELETE FROM resenhas WHERE id = $delete_id");
}

// Obter resenhas
$sql = "SELECT * FROM resenhas ORDER BY data_criacao DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sousa's Literary</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a href="index.html"><img src="img/logo.png" alt="Logo do site" class="logo"></a>
        <h1>Sousa's Literary</h1>
        <nav>
            <a href="index.html" class="menu-btn">Inicio</a>
            <a href="sobre.html" class="menu-btn">Sobre</a>
            <a href="ofertas.html" class="menu-btn">Ofertas</a>
            <a href="login.html" class="menu-btn">Login</a>
        </nav>
    </header>

    <div class="container">
        <section class="reviews">
            <h2>Resenhas de Leitores:</h2>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="review">
                    <h3><?= htmlspecialchars($row['titulo_livro']) ?> - <?= htmlspecialchars($row['nome_resenhista']) ?></h3>
                    <p><?= htmlspecialchars($row['texto_resenha']) ?></p>
                    <form class="form_resenha" method="POST" style="display: inline;">
                        <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                        <button type="submit">Deletar</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </section>

        <section>
            <h2>Adicione Nova Resenha:</h2>
            <form action="processa_resenha.php" method="POST">
                <label for="bookTitle">Título do Livro:</label>
                <input type="text" id="bookTitle" name="bookTitle" required>
                <label for="reviewerName">Seu Nome:</label>
                <input type="text" id="reviewerName" name="reviewerName" required>
                <label for="reviewText">Sua Resenha:</label>
                <textarea id="reviewText" name="reviewText" rows="5" required></textarea>
                <input type="submit" value="Enviar Resenha">
            </form>
        </section>
    </div>
</body>

</html>