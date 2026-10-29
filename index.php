<?php
    $mensagem = "";
    $robo = "";
    $modelo = "";
    $operador = "";

    $caminho = __DIR__ . "robos.json";

    $json = json_encode($caminho);



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $robo = $_POST['robo'] ?? "";
        $modelo = $_POST['modelo'] ?? "";
        $operador = $post['operador'] ?? "";

        if ($robo != "" && $modelo != "" && $operador != "") {
            $mensagem = "Cadastro realizado com sucesso!";

            if ($modelo == "explorador") {
                $energiaInicial = 100;
                $potencia = 20;
            } else if ($modelo == "engenheiro") {
                $energiaInicial = 120;
                $potencia = 15;
            } else if ($modelo == "defensor") {
                $energiaInicial = 150;
                $potencia = 30;
            }



        } else {
            $mensagem = "Cadastro inválido, faltam dados!";
        }
    }

    // abstract class Robo {
    //      public function exibirStatus() {
    //          public $robo;

    //      }
    // }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central de Robôs | PHP</title>
</head>
<body>
    <h2>Cadastro de Robôs</h2>
    <form action="POST">
        <label for="robo">Nome do Robô: </label>
        <input type="text" name="robo" required><br><br>

        <label for="modelo">Modelo do Robô: </label>
        <select name="modelo" id="idmodelo">
            <option value="explorador">Explorador</option>
            <option value="engenheiro">Engenheiro</option>
            <option value="defensor">Defensor</option>
        </select><br><br>

        <label for="operador">Nome do operador: </label>
        <input type="text" name="operador" required><br><br>

        <button type="submit">Cadastrar</button><br>
    </form>

    <?php if ($mensagem != "") { ?>
        <p><?=$mensagem ?> </p>

        <div>
            <h2>Robôs cadastrados</h2>
            <p><strong>Nome do robô:</strong> <?= $robo ?></p>
            <p><strong>Modelo do robô:</strong> <?= $modelo ?></p>
            <p><strong>Nome do operador:</strong> <?= $operador ?></p>
        </div>

    <?php } ?>
</body>
</html>