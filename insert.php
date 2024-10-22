<?php
// insert.php

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "energia_db";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Array com dispositivos e seus consumos
$dispositivos = [
    ["Lampada", 0.1],         // Nome do dispositivo, Consumo em kWh
    ["Geladeira", 1.2],
    ["Televisao", 0.3],
    ["Ar Condicionado", 2.5],
    ["Computador", 0.6],
    ["Microondas", 1.0]
];

// Loop para inserir múltiplos dispositivos
foreach ($dispositivos as $dispositivo) {
    $nome_dispositivo = $dispositivo[0]; // Nome do dispositivo
    $consumo = $dispositivo[1];          // Consumo em kWh

    // Prepara e executa a inserção
    $stmt = $conn->prepare("INSERT INTO consumo (dispositivo, consumo) VALUES (?, ?)");
    $stmt->bind_param("sd", $nome_dispositivo, $consumo);

    if ($stmt->execute()) {
        echo "Novo registro para $nome_dispositivo criado com sucesso!<br>";
    } else {
        echo "Erro ao inserir $nome_dispositivo: " . $stmt->error . "<br>";
    }
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
