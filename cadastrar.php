<?php
include "conexao.php";

$nome   = trim($_POST["nome"] ?? "");
$gmail  = trim($_POST["gmail"] ?? "");
$data   = trim($_POST["data"] ?? "");
$hora   = trim($_POST["hora"] ?? "");
$serv   = trim($_POST["servico"] ?? "");
$obs    = trim($_POST["obs"] ?? "");

// Inserir
$conexao->query("INSERT INTO agendamentos 
(nome, gmail, data, hora, servico, observacao)
VALUES 
('$nome', '$gmail', '$data', '$hora', '$serv', '$obs')");

header("Location: listar.php");
?>
