<?php
include "conexao.php";

$nome     = trim($_POST["nome"] ?? "");
$gmail    = trim($_POST["gmail"] ?? "");
$data     = trim($_POST["data"] ?? "");
$hora     = trim($_POST["hora"] ?? "");
$serv     = trim($_POST["servico"] ?? "");
$obs      = trim($_POST["obs"] ?? "");
$barbeiro = trim($_POST["barbeiro"] ?? "");

// Verificar horário ocupado
$check = $conexao->query("
    SELECT * FROM agendamentos 
    WHERE barbeiro = '$barbeiro' 
    AND data = '$data' 
    AND hora = '$hora'
");

if($check->num_rows > 0){
    echo "<script>
        alert('Este horário já está ocupado para este barbeiro!');
        window.location = 'index.html';
    </script>";
    exit;
}

// Inserir agendamento
$conexao->query("INSERT INTO agendamentos 
(barbeiro, nome, gmail, data, hora, servico, observacao)
VALUES 
('$barbeiro', '$nome', '$gmail', '$data', '$hora', '$serv', '$obs')");

header("Location: listar.php");
?>
