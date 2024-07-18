<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$msg = $_POST['mensagem'];

$sql = "INSERT INTO contacts (nome, email, mensagem) VALUES ('$nome', $email, $msg);"
?>