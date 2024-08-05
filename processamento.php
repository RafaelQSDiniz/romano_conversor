<?php
include "classes.php";
$converter = new Conversao();

// RECUPERAR DADOS
    $entrada = $_POST['Entrada'];
    $funcao = $_POST['funcao'];

if ($funcao == "romano"){
    $resposta = $converter->ParaRomano(intval($entrada));
}   else{
    $resposta = $converter->ParaArabico($entrada);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conversor</title>
</head>
<body>
    <div style="text-align: center;">
        <h3>Resultado:</h3>
        <h1><?php echo $resposta;?></h1><br>
        <h4>Valor de entrada: <?php echo $entrada;?></h4>
        <button style="margin-top:120px; max-width: 400px;" class="botao_envio" onclick="Voltar()" type="submit"> Voltar</button>
        <script>
            function Voltar() {
                window.history.back();
            }
        </script>
    </div>
    <h5>TESTE PRÁTICO DEMANDER</h5>
</body>
</html>