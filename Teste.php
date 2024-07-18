<?php
// Definindo as variáveis de conexão
$server = "localhost";
$user = "root";
$pass = "";
$bd = "user";

// Criando a conexão
$conn = new mysqli($server, $user, $pass, $bd);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$conn = connectDatabase();

$sql = "SELECT id_usuario, usuario FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Lista de Usuários</h1>";
    echo "<table border='1'><tr><th>ID</th><th>Nome</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_usuario"]. "</td><td>" . $row["usuario"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();


?>