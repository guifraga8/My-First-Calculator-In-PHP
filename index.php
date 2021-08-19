<?php
//Calculadora
if (!isset($_POST["value1"]) || !isset($_POST["value2"]) || !isset($_POST["operacao"])) {
    $result = "";
    $operacao = "";
} else {
    $d = $_POST["value1"];
    $e = $_POST["value2"];
    $op = $_POST["operacao"];

    if ($op == "addition") {
        $result = $d + $e;
    } elseif ($op == "subtraction") {
        $result = $d - $e;
    } elseif ($op == "multiplication") {
        $result = $d * $e;
    } elseif ($op == "division") {
        $result = $d / $e;
    } elseif ($op == "raiz") {
        $result = sqrt($d);
    } elseif ($op == "porcentagem") {
        $result = $d / 100;
    } elseif ($op == "elevado") {
        $result = pow($d, $e);
    } else {
        $op == "Operação";
        $result = "Preencha os valores E a operação!";
    }
}
//Calculando a Bhaskara
if (!isset($_POST["coefa"]) || !isset($_POST["coefb"]) || !isset($_POST["coefc"])) {
    $comentario = "";
    $resultx1 = "";
    $resultx2 = "";
} else {
    $a = $_POST["coefa"];
    $b = $_POST["coefb"];
    $c = $_POST["coefc"];

    if ($a == 0) {
        $comentario = "Em uma equação quadrática, \"a\" não pode ser igual a zero.";
    } else {
        $delta = pow($b, 2) - ((4 * $a) * $c);
        if ($delta === 0) {
            $raiz = - ($b) / (2 * $a);
            $comentario = "Quando Delta é igual a zero, a equação tem 1 raiz: " . $raiz;
        } elseif ($delta > 0) {
            $resultx1 = (-$b + sqrt($delta)) / (2 * $a);
            $resultx2 = (-$b - sqrt($delta)) / (2 * $a);
            $comentario = "Quando Delta é maior que zero, a equação tem 2 raizes: $resultx1 e $resultx2";
        } else {
            $comentario = "No caso de Delta menor que zero (negativo): resolve-se apenas com números imaginários.";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Projeto Calculadora</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<body>
    <div class="p">
        <img src="https://aulalivre.net/uploads/disciplines/icons/matematica.png" width="100" height="100">
        <h1 class="h1"><strong>CALCULADORA</strong></h1>
    </div>
    <div class="forms">
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Operações simples e básicas!</legend>
                <br><input type="number" step="0.01" name="value1" placeholder="1º Valor" required>
                <select name="operacao">
                    <option value="Operação">Operação</option>
                    <option value="addition">+</option>
                    <option value="subtraction">-</option>
                    <option value="multiplication">x</option>
                    <option value="division">÷</option>
                    <option value="raiz">√</option>
                    <option value="porcentagem">%</option>
                    <option value="elevado">^</option>
                </select>
                <input type="number" step="0.01" name="value2" placeholder="2º Valor">
                <br><br><input type="submit" name="calculate" value="Bora calcular!">
                <br><br><?php echo "<textarea style='resize: none' disabled rows=1 cols=38 placeholder='Resultado'>$result</textarea>"; ?>
                <br><br>OBS: Para os cálculos de "porcentagem" e "raíz quadrada" preencha somente o 1º valor!
            </fieldset>
        </form>
        <form action="index.php" method="POST">
            <br>
            <fieldset>
                <legend>E que tal facilitarmos para você, calcular a famosa "Bhaskara"?</legend>
                <br>ax²+bx+c=0
                <br><br>Insira o valor de a: <input type="number" step="0.01" name="coefa" required>
                <br><br>Insira o valor de b: <input type="number" step="0.01" name="coefb" required>
                <br><br>Insira o valor de c: <input type="number" step="0.01" name="coefc" required>
                <br><br><input type="submit" name="bhask" value="Bora calcular!">
                <br><br>Resultado:
                <br><?php echo "<textarea style='resize: none' disabled rows=3 cols=38>$comentario</textarea>"; ?>
            </fieldset>
        </form>
    </div>
</body>

</html>