<?php
// Definindo as variáveis de conexão
$server = "localhost";
$user = "root";
$pass = "";
$bd = "aula";

// Criando a conexão
$conn = new mysqli($server, $user, $pass, $bd);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT id_usuario, usuario, password FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Atualizar usuario</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_usuario'] . "</td>";
        echo "<td>" . $row['usuario'] . "</td>";
        echo "<td>
                <form action='atualizarusuario.php' method='post'>
                    <input type='int' name='id_usuario' value='" . $row['id_usuario'] . "'>
                    <input type='text' name='novousuario' placeholder='novousuario'>
                    <input type='submit' value='Atualizar'>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado";
}

$conn->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_usua = $_POST['id_usuario'];
    $novo = $_POST['novousuario'];

    $sql = "UPDATE user SET usuario = ? WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $novo, $id_usua);

    if ($stmt->execute()) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
