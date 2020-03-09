<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Orçamento</title>
    <style>
        h1{
            color: #23a076;
            text-shadow: 1px 1px 1px #072e38;
        }
    </style>
</head>
<body>
<h1>Pesquisar orçamento</h1>
<?php
// cria uma tabela para exibir os resultados da busca
echo "<table border=1>";
echo "<tr>";
echo '<th>"DATA"</th>th>';
echo '<th>"CLIENTE"</th>th>';
echo '<th>"VENDEDOR"</th>th>';
echo "</tr>";
// conexão com o banco
$server = "localhost";
$user = "root";
$password = "";

$connect = mysqli_connect($server, $user, $password, 'orcamento2_0') or die(mysqli_error());

// consulta de oreçamento
$SendPesqOrc = filter_input(INPUT_POST, 'SendPesqOrc', FILTER_SANITIZE_STRING);
if ($SendPesqOrc) {
    $data = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $consulta = "SELECT * FROM cadastro WHERE dia LIKE '$data' ORDER BY dia DESC";
    $resultado = mysqli_query($connect, $consulta) or die ("Erro ao pesquisar orçamento.");
    while ($registro = mysqli_fetch_array($resultado))
    {
        $data = $registro['dia'];
        $cliente = $registro['cliente'];
        $vendedor = $registro['vendedor'];
        echo "<tr>";
        echo "<td>" .$data. "</td>";
        echo "<td>" .$cliente. "</td>";
        echo "<td>" .$vendedor. "</td>";
        echo "</tr>";
    }
}
mysqli_close($connect);
echo "</table>";
?>
<a href="PesquisaOrcamento.html">Voltar</a>
