<?php
// Conexão
include "conexao.php";

// Excluir registro
if (isset($_GET["excluir"])) {
    $id = intval($_GET["excluir"]);
    $conexao->query("DELETE FROM agendamentos WHERE id = $id");
    header("Location: listar.php");
    exit;
}

// Selecionar todos agendamentos
$sql = "SELECT * FROM agendamentos ORDER BY data ASC, hora ASC";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Agendamentos</title>
    <link rel="stylesheet" href="listar.css">
</head>
<body>

<div class="tabela-container">

    <h1>Listagem de Agendamentos</h1>

    <?php if ($result->num_rows > 0): ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Barbeiro</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Serviço</th>
                <th>Observação</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td data-label="ID"><?= $row["id"] ?></td>

                <td data-label="Barbeiro">
                    <?= $row["barbeiro"] ?>
                </td>

                <td data-label="Nome"><?= $row["nome"] ?></td>

                <td data-label="Email"><?= $row["gmail"] ?></td>

                <td data-label="Data">
                    <?= date("d/m/Y", strtotime($row["data"])) ?>
                </td>

                <td data-label="Hora"><?= $row["hora"] ?></td>

                <td data-label="Serviço"><?= $row["servico"] ?></td>

                <td data-label="Observação"><?= $row["observacao"] ?></td>

                <td data-label="Ação">
                    <a class="btn-excluir" 
                       href="listar.php?excluir=<?= $row['id'] ?>"
                       onclick="return confirm('Realmente deseja excluir?');">
                       Excluir
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php else: ?>
        <p style="text-align:center; font-size:18px; color:black;">
            Nenhum agendamento encontrado.
        </p>
    <?php endif; ?>

</div>

</body>
</html>
