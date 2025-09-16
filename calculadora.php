<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Calculadora</h1>
    <form action="calculadora.php" method="post">
        <label for="">Numero 1</label>
        <input type="number" name="num1" placeholder="Número 1" required>
        <label for="">Numero 2</label>
        <input type="number" name="num2" placeholder="Número 2" required>
        <label for="">Operador</label>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operator'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        $result = 0;

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    echo "<p>Error: División por cero no permitida.</p>";
                    exit;
                }
                break;
            default:
                echo "<p>Error: Operador no válido.</p>";
                exit;
        }

        echo "<h2>Resultado: $result</h2>";
    }
    ?>
</body>

</html>