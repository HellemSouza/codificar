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
<h1>Cadastro de orçamento</h1>
<?php
//conexão ao banco de dados mySQL
$server = "localhost";
$user = "root";
$password = "";

$connect = mysqli_connect($server, $user, $password, 'orcamento2_0') or die(mysqli_error());

//testa se foi feita a conexão com o banco de dados
/*if (mysqli_connect_errno($connect)) {
    echo "Não conectado";
} else {
    echo "Conectado</br>";
}*/

//inserção de dados ao banco atraves de html
$Cliente = isset($_POST ["client"]) ? $_POST ["client"] : "Não informado";
$Data = isset($_POST ["date"]) ? $_POST ["date"] : "Não informado";
$Hora = isset($_POST ["time"]) ? $_POST ["time"] : "Não informado";
$Vendedor = isset($_POST ["salesman"]) ? $_POST ["salesman"] : "Não informado";
$Descricao = isset($_POST ["description"]) ? $_POST ["description"] : "Não informado";
$Valor = isset($_POST ["value"]) ? $_POST ["value"] : "Não informado";
$query ="INSERT INTO cadastro (cliente, dia, hora, vendedor, descricao, valor) VALUES('$Cliente', '$Data', '$Hora', '$Vendedor', '$Descricao', '$Valor')";
$cadast = mysqli_query($connect, $query);

//confirma se o orçamento foi cadastrado ou não
if(mysqli_insert_id($connect)){
   echo "Orçamento cadastrado!</br>";
 } else{
   echo "Orçamento não cadastrado!</br>";
    echo "Verifique se todos os campos estão preenchidos e tente novamente.</br>";
}
?>
<a href="Oficina2.0.html">Voltar</a>
</body>
</html>

