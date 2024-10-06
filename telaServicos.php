<?php
include_once("class/servicos.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telaS.css">
    <title>Cadastro de Serviços</title>
</head>
<body>

<div id="main-container">
    <h1>Cadastro de Serviços</h1>
    <form method="POST">
        <label>Pneus:</label>
        <input type="text" name="pneus" required placeholder="Serviço de pneus">

        <label>Freios:</label>
        <input type="text" name="freios" required placeholder="Serviço de freios">

        <label>Óleo do Motor:</label>
        <input type="text" name="oleo_motor" required placeholder="Serviço de óleo">

        <label>Corrente:</label>
        <input type="text" name="corrente" required placeholder="Serviço de corrente">

        <label>Bateria:</label>
        <input type="text" name="bateria" required placeholder="Serviço de bateria">

        <label>Filtros:</label>
        <input type="text" name="filtros" required placeholder="Serviço de filtros">

        <label>Valor:</label>
        <input type="number" name="valor" step="0.01" required placeholder="Valor do serviço">


        <div id="button-container">
            <button type="submit" name="inserir">Cadastrar</button>
            <a href="index.php" class="back-button">Voltar</a>
        </div>
    </form>

    <?php
    if (isset($_REQUEST["inserir"])) {
        $servico = new servicos();
        $servico->create($_REQUEST["pneus"], $_REQUEST["freios"], $_REQUEST["oleo_motor"], $_REQUEST["corrente"], $_REQUEST["bateria"], $_REQUEST["filtros"], $_REQUEST["valor"]);

        echo $servico->inserirServicos() ?
            "<p>Serviço cadastrado com sucesso.</p>" :
            "<p>Ocorreu um erro ao cadastrar o serviço!</p>";
    }
    ?>
</div>

</body>
</html>
