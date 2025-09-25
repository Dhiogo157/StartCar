<?php
include '../conexao/conexao.php';

// Inserir novo veículo
if (isset($_POST['inserir'])) {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO veiculos (marca, modelo, placa, status, categoria) 
            VALUES ('$marca', '$modelo', '$placa', '$status', '$categoria')";
    mysqli_query($conn, $sql);
    header("Location: admin.php");
}

// Atualizar veículo
if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE veiculos SET 
            marca='$marca', 
            modelo='$modelo', 
            placa='$placa', 
            status='$status',
            categoria='$categoria' 
            WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: admin.php");
}

// Deletar veículo
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $sql = "DELETE FROM veiculos WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: admin.php");
}

// Buscar veículo para edição
$editar = false;
$veiculo_editar = null;
if (isset($_GET['editar'])) {
    $editar = true;
    $id = $_GET['editar'];
    $sql = "SELECT * FROM veiculos WHERE id=$id";
    $resultado = mysqli_query($conn, $sql);
    $veiculo_editar = mysqli_fetch_assoc($resultado);
}

// Listar todos os veículos
$veiculos = mysqli_query($conn, "SELECT * FROM veiculos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Administração - Veículos</title>
</head>
<body>
    <h1>Painel do Administrador - Veículos</h1>

    <h2><?= $editar ? 'Editar Veículo' : 'Cadastrar Novo Veículo' ?></h2>
    <form method="post">
        <?php if ($editar): ?>
            <input type="hidden" name="id" value="<?= $veiculo_editar['id'] ?>">
        <?php endif; ?>
        
        <label>Marca:</label>
        <input type="text" name="marca" required value="<?= $editar ? $veiculo_editar['marca'] : '' ?>"><br>

        <label>Modelo:</label>
        <input type="text" name="modelo" required value="<?= $editar ? $veiculo_editar['modelo'] : '' ?>"><br>

        <label>Placa:</label>
        <input type="text" name="placa" required value="<?= $editar ? $veiculo_editar['placa'] : '' ?>"><br>

        <label>Status:</label>
        <select name="status" required>
            <option value="Disponível" <?= ($editar && $veiculo_editar['status'] == 'Disponível') ? 'selected' : '' ?>>Disponível</option>
            <option value="Indisponível" <?= ($editar && $veiculo_editar['status'] == 'Indisponível') ? 'selected' : '' ?>>Indisponível</option>
        </select><br>

        <label>Categoria:</label>
        <select name="categoria" required>
            <option value="">Selecione</option>
            <option value="Compacto" <?= ($editar && $veiculo_editar['categoria'] == 'Compacto') ? 'selected' : '' ?>>Compacto</option>
            <option value="Sedan" <?= ($editar && $veiculo_editar['categoria'] == 'Sedan') ? 'selected' : '' ?>>Sedan</option>
            <option value="SUV" <?= ($editar && $veiculo_editar['categoria'] == 'SUV') ? 'selected' : '' ?>>SUV</option>
        </select><br><br>

        <button type="submit" name="<?= $editar ? 'atualizar' : 'inserir' ?>">
            <?= $editar ? 'Atualizar' : 'Cadastrar' ?>
        </button>
    </form>

    <h2>Lista de Veículos</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Status</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
        <?php while ($v = mysqli_fetch_assoc($veiculos)) { ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= htmlspecialchars($v['marca']) ?></td>
                <td><?= htmlspecialchars($v['modelo']) ?></td>
                <td><?= htmlspecialchars($v['placa']) ?></td>
                <td><?= $v['status'] ?></td>
                <td><?= $v['categoria'] ?></td>
                <td>
                    <a href="admin.php?editar=<?= $v['id'] ?>">Editar</a> |
                    <a href="admin.php?deletar=<?= $v['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
