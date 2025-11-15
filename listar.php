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

$result = $conexao->query("SELECT * FROM agendamentos");
?>
<h1>Listagem de Agendamentos</h1>

<table border="1" cellpadding="8">
<tr>
<th>ID</th><th>Nome</th><th>Email</th><th>Data</th><th>Hora</th><th>Serviço</th><th>Obs</th><th>Ação</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
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
