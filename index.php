<?php
    $mensagem = "";
    $robo = "";
    $modelo = "";
    $operador = "";
    $funcao = "";
    $energiaAtualizada = 0;
    $energiaInicial = 0;
    $energia = 0;
    $msgEnergia = "";

    $caminho = __DIR__ . "/robos.json";

    $json = json_encode($caminho, true);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $robo = $_POST['robo'] ?? "";
        $modelo = $_POST['modelo'] ?? "";
        $operador = $_POST['operador'] ?? "";
        $enegia = $_POST['energia'] ?? "";

        $novoRobo = [
            $robo => 'robo',
            $modelo => 'modelo',
            $funcao => 'funcao',
            $operador => 'operador'
        ];

        if ($robo != "" && $modelo != "" && $operador != "") {
            $mensagem = "Cadastro realizado com sucesso!";

            if ($modelo == "explorador") {
                $energiaInicial = 100;
                $potencia = 20;
                $funcao = "Investigar planetas";
            } else if ($modelo == "engenheiro") {
                $energiaInicial = 120;
                $potencia = 15;
                $funcao = "Reparar equipamentos";
            } else if ($modelo == "defensor") {
                $energiaInicial = 150;
                $potencia = 30;
                $funcao = "Proteger a estação";
            }

            if ($energia > 200) {
                $msgEnergia = "Erro! Engergia está no limite!";
            } else {
                $msgEnergia = "Energia Atualizada!";
                $EnergiaAtualizada = $energiaInicial + $energia;
            }

        } else {
            $mensagem = "Cadastro inválido, faltam dados!";
        }
    }

    // abstract class Robo {
    //     public function _construct() {

    //     }

    //     public function exibirStatus() {
            
    //     }

    //     public function recarregar() {
    //         $energia = $energiaInicial + 10;
    //     }
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
    <div class="card-cadastro">
        <h2>Cadastro de Robôs</h2>
        <form method="POST">
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
    </div>

    <?php if ($mensagem != "") { ?>
        <div class="card-resultado">
            <p> <?= $mensagem ?> </p>
            <div>
                <h2>Robôs cadastrados</h2>
                <p><strong>Nome do robô:</strong> <?= $robo ?></p>
                <p><strong>Modelo do robô:</strong> <?= $modelo ?></p>
                <p><strong>Funcão do robô: </strong> <?= $funcao ?></p>
                <p><strong>Energia do robô: </strong> <?= $enegia?></p>
                <p><strong>Nome do operador:</strong> <?= $operador ?></p>
            </div>
        </div>

        <form method="POST">
            <label for="adicionar-energia"></label>   
            <input type="number" name="energia">

            <button type="submit">Atualizar energia</button>
        </form>
    <?php } else  if ($msgEnergia != "") { ?>
        <div class="card-resultado">
            <p> <?= $mensagem ?> </p>
            <div>
                <h2>Robôs cadastrados</h2>
                <p><strong>Nome do robô:</strong> <?= $robo ?></p>
                <p><strong>Modelo do robô:</strong> <?= $modelo ?></p>
                <p><strong>Funcão do robô: </strong> <?= $funcao ?></p>
                <p><strong>Energia do robô: </strong> <?= $enegia?></p>
                <p><strong>Nome do operador:</strong> <?= $operador ?></p>
            </div>
        </div>

        <form method="POST">
            <label for="adicionar-energia"></label>   
            <input type="number" name="energia">

            <button type="submit">Atualizar energia</button>
        </form>
    <?php } ?>
</body>
</html>