<?php
include_once("class/servicos.php");

$servico = new servicos();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $servico->buscarServicos($id);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servico->create($_POST["pneus"], $_POST["freios"], $_POST["oleo_motor"], $_POST["corrente"], $_POST["bateria"], $_POST["filtros"], $_POST["valor"]);

    if ($servico->atualizarServicos($id)) {
        echo "<script>alert('Serviço atualizado com sucesso!'); window.location.href='relatorioServicos.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o serviço!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/editarS.css">
    <title>Editar Serviço</title>
</head>
<body>

<div id="main-container">
    <h1>Editar Serviço</h1>
    <form method="POST">
        <label>Pneus:</label>
        <input type="text" name="pneus" value="<?php echo $servico->getPneus(); ?>" required>

        <label>Freios:</label>
        <input type="text" name="freios" value="<?php echo $servico->getFreios(); ?>" required>

        <label>Óleo do Motor:</label>
        <input type="text" name="oleo_motor" value="<?php echo $servico->getOleo_motor(); ?>" required>

        <label>Corrente:</label>
        <input type="text" name="corrente" value="<?php echo $servico->getCorrente(); ?>" required>

        <label>Bateria:</label>
        <input type="text" name="bateria" value="<?php echo $servico->getBateria(); ?>" required>

        <label>Filtros:</label>
        <input type="text" name="filtros" value="<?php echo $servico->getFiltros(); ?>" required>

        <label>Valor:</label>
        <input type="number" name="valor" value="<?php echo $servico->getValor(); ?>" step="0.01" required>

        <div id="button-container">
            <button type="submit">Atualizar</button>
            <a href="relatorioServicos.php" class="back-button">Voltar</a>
        </div>
    </form>
</div>

</body>
</html>
