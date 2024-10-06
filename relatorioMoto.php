<?php
include_once("class/motos.php");
error_reporting(0);
$moto = new moto(); // Instância da classe moto
$motosCadastradas = $moto->listarMoto(); // Chama a função para listar motos
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/relatorioM.css">
    
    <title>Relatório de Motos Cadastradas</title>
</head>
<body>


<div id="main-container">
    <h1>Relatório de Motos Cadastradas</h1>
    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Ano do Modelo</th>
                <th>Ano de Fabricação</th>
                <th>Cor Primária</th>
                <th>Cor Secundária</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($motosCadastradas)) {
                foreach ($motosCadastradas as $moto) {
                    echo "<tr>";
                    echo "<td>" . $moto['modelo'] . "</td>";
                    echo "<td>" . $moto['ano_modelo'] . "</td>";
                    echo "<td>" . $moto['ano_fabricacao'] . "</td>";
                    echo "<td>" . $moto['cor_primaria'] . "</td>";
                    echo "<td>" . $moto['cor_secundaria'] . "</td>";
                    echo "<td>" . number_format($moto['valor'], 2, ',', '.') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nenhuma moto cadastrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php" id="back-button">Voltar</a>
</div>

</body>
</html>
