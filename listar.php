<?php
include "conexao.php";

// EXCLUIR
if(isset($_GET["excluir"])){
    echo "<script>
        if(confirm('Realmente deseja excluir?')){
            window.location = 'listar.php?confirmar=".$_GET["excluir"]."';
        }
    </script>";
}

if(isset($_GET["confirmar"])){
    $id = $_GET["confirmar"];
    $conexao->query("DELETE FROM agendamentos WHERE id = $id");
}

/* ============================
   BUSCAR LISTAS POR BARBEIRO
   ============================ */

$junior = $conexao->query("SELECT * FROM agendamentos WHERE barbeiro = 'Junior Barbeiro'");
$cesar  = $conexao->query("SELECT * FROM agendamentos WHERE barbeiro = 'Cesar Barbeiro'");
$roberto = $conexao->query("SELECT * FROM agendamentos WHERE barbeiro = 'Roberto Barbeiro'");
?>

<h1>Listagem de Agendamentos</h1>

<style>
table{
    border-collapse: collapse;
    width: 90%;
    margin-bottom: 40px;
}
th, td{
    border: 1px solid black;
    padding: 8px;
}
h2{
    margin-top: 40px;
}
</style>

<!-- JUNIOR -->
<h2>Lista de agendamento do Junior</h2>

<?php if($junior->num_rows > 0): ?>
<table>
<tr>
<th>ID</th><th>Nome</th><th>Email</th><th>Data</th><th>Hora</th><th>Serviço</th><th>Obs</th><th>Ação</th>
</tr>
<?php while($row = $junior->fetch_assoc()): ?>
<tr>
<td><?= $row["id"] ?></td>
<td><?= $row["nome"] ?></td>
<td><?= $row["gmail"] ?></td>
<td><?= $row["data"] ?></td>
<td><?= $row["hora"] ?></td>
<td><?= $row["servico"] ?></td>
<td><?= $row["observacao"] ?></td>
<td><a href="listar.php?excluir=<?= $row['id'] ?>">Excluir</a></td>
</tr>
<?php endwhile; ?>
</table>
<?php else: ?>
<p>Nenhum agendamento encontrado.</p>
<?php endif; ?>


<!-- CESAR -->
<h2>Lista de agendamento do Cesar</h2>

<?php if($cesar->num_rows > 0): ?>
<table>
<tr>
<th>ID</th><th>Nome</th><th>Email</th><th>Data</th><th>Hora</th><th>Serviço</th><th>Obs</th><th>Ação</th>
</tr>
<?php while($row = $cesar->fetch_assoc()): ?>
<tr>
<td><?= $row["id"] ?></td>
<td><?= $row["nome"] ?></td>
<td><?= $row["gmail"] ?></td>
<td><?= $row["data"] ?></td>
<td><?= $row["hora"] ?></td>
<td><?= $row["servico"] ?></td>
<td><?= $row["observacao"] ?></td>
<td><a href="listar.php?excluir=<?= $row['id'] ?>">Excluir</a></td>
</tr>
<?php endwhile; ?>
</table>
<?php else: ?>
<p>Nenhum agendamento encontrado.</p>
<?php endif; ?>


<!-- ROBERTO -->
<h2>Lista de agendamento do Roberto</h2>

<?php if($roberto->num_rows > 0): ?>
<table>
<tr>
<th>ID</th><th>Nome</th><th>Email</th><th>Data</th><th>Hora</th><th>Serviço</th><th>Obs</th><th>Ação</th>
</tr>
<?php while($row = $roberto->fetch_assoc()): ?>
<tr>
<td><?= $row["id"] ?></td>
<td><?= $row["nome"] ?></td>
<td><?= $row["gmail"] ?></td>
<td><?= $row["data"] ?></td>
<td><?= $row["hora"] ?></td>
<td><?= $row["servico"] ?></td>
<td><?= $row["observacao"] ?></td>
<td><a href="listar.php?excluir=<?= $row['id'] ?>">Excluir</a></td>
</tr>
<?php endwhile; ?>
</table>
<?php else: ?>
<p>Nenhum agendamento encontrado.</p>
<?php endif; ?>
