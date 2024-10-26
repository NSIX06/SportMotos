<<<<<<< HEAD
<?php
include_once("class/servicos.php");
$servico = new servicos(); // Instância da classe servicos

// Coletar o filtro do formulário (se houver) e listar os serviços de acordo com ele
$filtro = $_GET['filtro'] ?? ''; // Coleta o valor do filtro do campo de texto, se existir
$servicosCadastrados = $servico->listarServicos($filtro); // Chama a função para listar serviços com filtro
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/relatorioS.css">
    <title>Relatório de Serviços Cadastrados</title>
</head>
<body>

<div id="main-container">
    <h1>Relatório de Serviços Cadastrados</h1>

    <!-- Formulário para os filtros -->
    <form method="GET" action="relatorioServicos.php" style="margin-bottom: 20px; border-radius: 10px;">
        <label for="filtro">Filtrar por Serviços:</label>
        <input type="text" id="filtro" name="filtro" value="<?php echo htmlspecialchars($filtro); ?>"  style="border-radius: 5px;">
        <button type="submit"  class="btn btn-primary"; style= "background-color:#00ced1;">Filtrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Serviços</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
if (!empty($servicosCadastrados)) {
    foreach ($servicosCadastrados as $servicoItem) {
        echo "<tr>";
        echo "<td>" . (isset($servicoItem['tipo_servico']) ? $servicoItem['tipo_servico'] : 'N/A') . "</td>";
        echo "<td>" . (isset($servicoItem['valor']) ? number_format($servicoItem['valor'], 2, ',', '.') : 'N/A') . "</td>";
        echo "<td>
                <a href='editarServico.php?id=" . $servicoItem['id_servicos'] . "' class='btn btn-edit'>Editar</a>
                <a href='excluirServico.php?id=" . $servicoItem['id_servicos'] . "' class='btn btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhum serviço cadastrado.</td></tr>";
}
?>

        </tbody>
    </table>
    <a href="index.php" id="back-button">Voltar</a>
</div>

</body>
</html>
=======
    <?php
    include_once("class/servicos.php");
    $servico = new servicos(); //*Instância da classe servicos
    $servicosCadastrados = $servico->listarServicos(); //*Chama a função para listar serviços
    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/relatorioS.css">
        
        <title>Relatório de Serviços Cadastrados</title>
    </head>
    <body>

    <div id="main-container">
        <h1>Relatório de Serviços Cadastrados</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pneus</th>
                    <th>Freios</th>
                    <th>Óleo do Motor</th>
                    <th>Corrente</th>
                    <th>Bateria</th>
                    <th>Filtros</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
        if (!empty($servicosCadastrados)) {
            foreach ($servicosCadastrados as $servico) {
                echo "<tr>";
                echo "<td>" . (isset($servico['id_servicos']) ? $servico['id_servicos'] : 'N/A') . "</td>";
                echo "<td>" . (isset($servico['pneus']) ? $servico['pneus'] : 'N/A') . "</td>";
                echo "<td>" . (isset($servico['freios']) ? $servico['freios'] : 'N/A') . "</td>";
                echo "<td>" . (isset($servico['oleo_motor']) ? $servico['oleo_motor'] : 'N/A') . "</td>";
                echo "<td>" . (isset($servico['corrente']) ? $servico['corrente'] : 'N/A') . "</td>";
                echo "<td>" . (isset($servico['bateria']) ? $servico['bateria'] : 'N/A') . "</td>";
                echo "<td>" . (isset($servico['filtros']) ? $servico['filtros'] : 'N/A') . "</td>";
                echo "<td>" . (isset($servico['valor']) ? number_format($servico['valor'], 2, ',', '.') : 'N/A') . "</td>";
                echo "<td>
                        <a href='editarServico.php?id=" . $servico['id_servicos'] . "' class='btn btn-edit'>Editar</a>
                        <a href='excluirServico.php?id=" . $servico['id_servicos'] . "' class='btn btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Nenhum serviço cadastrado.</td></tr>";
        }
    ?>
            </tbody>
        </table>
        <a href="index.php" id="back-button">Voltar</a>
    </div>

    </body>
    </html>
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671
